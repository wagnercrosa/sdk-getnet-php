<?php
	
	namespace Source\Api;
	
	use Exception;
	use Source\Api\Environment;
	use Source\Api\Response;
	use Source\Api\Transaction;
	use Source\Api\Exception\GetnetException;
	
	/**
	 *
	 * Class Getnet
	 *
	 * @package Getnet\Api
	 *
	 * @author Wagner Corrêa
	 *
	 */
	class Getnet
	{
		private $client_id;
		private $client_secret;
		private $seller_id;
		private $environment;
		private $authorization;
		
		// TODO add monolog
		private $debug = false;
		
		/**
		 *
		 * @param Environment|null $environment
		 */
		public function __construct(Environment $environment = null)
		{
			if (! $environment) {
				$environment = Environment::production();
			}
			
			$this->setClientId(getenv('GETNET_CLIENT_ID'));
			$this->setClientSecret(getenv('GETNET_CLIENT_SECRET'));
			$this->setEnvironment($environment);
			
			$request = new Request($this);
			
			var_dump($request->auth($this));
			die();
			
			$request->auth($this);
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getClientId()
		{
			return $this->client_id;
		}
		
		/**
		 *
		 * @param $client_id
		 * @return mixed
		 */
		public function setClientId($client_id)
		{
			$this->client_id = $client_id;
			return $this;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getClientSecret()
		{
			return $this->client_secret;
		}
		
		/**
		 *
		 * @param $client_secret
		 * @return mixed
		 */
		public function setClientSecret($client_secret)
		{
			$this->client_secret = $client_secret;
			return $this;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getSellerId()
		{
			return $this->seller_id;
		}
		
		/**
		 *
		 * @param $seller_id
		 * @return mixed
		 */
		public function setSellerId($seller_id)
		{
			$this->seller_id = $seller_id;
			return $this;
		}
		
		/**
		 *
		 * @return Environment
		 */
		public function getEnvironment(): Environment
		{
			return $this->environment;
		}
		
		/**
		 * @param Environment $environment
		 */
		public function setEnvironment(Environment $environment): Getnet
		{
			$this->environment = $environment;
			return $this;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getAuthorization()
		{
			return $this->authorization;
		}
		
		/**
		 *
		 * @param $authorization
		 * @return mixed
		 */
		public function setAuthorization($authorization)
		{
			return $this->authorization = $authorization;
		}
		
		/**
		 *
		 * @return bool
		 */
		public function getDebug(): bool
		{
			return $this->debug = true;
		}
		
		/**
		 *
		 * @param bool $debug
		 * @return bool
		 */
		public function setDebug(bool $debug = false): bool
		{
			return $this->debug = $debug;
		}
		
		/**
		 *
		 * @param Transaction $transaction
		 * @return Authorize|void
		 * @throws Exception
		 */
		public function authorize(Transaction $transaction)
		{
			try {
				if($this->debug){
					print $transaction->toJSON();
				}
				$request = new Request($this);
				
				$response = null;
				if($transaction->getCredit()){
					$response = $request->post($this, '/v1/payments/credit', $transaction->toJSON());
				}else{
					throw new GetnetException('Error: Transaction type not found');
				}
				
				$authResponse = new Authorize();
				$authResponse->mapperJson($response);
				
				return $authResponse;
			} catch (GetnetException $e) {
				echo $e->getMessage();
			}
		}
		
		/**
		 *
		 * @param $payment_id
		 * @param $amount
		 * @return Response|Authorize|void
		 */
		public function autorizeConfirm($payment_id, $amount)
		{
			$bodyParams = array(
				'amount' => $amount
			);
			
			try {
				if($this->debug){
					print json_encode($bodyParams);
				}
				
				$request = new Request($this);
				$response = $request->post($this, '/v1/payments/credit/'.$payment_id.'/confirm', json_encode($bodyParams));
				
				$authResponse = new Authorize();
				$authResponse->mapperJson($response);
				
				return $authResponse;
			}catch (Exception $e) {
				return $this->generateErrorResponse($e);
			}
		}
		
		/**
		 *
		 * @param $payment_id
		 * @param $amount
		 * @return Response|Authorize|void
		 */
		public function authorizeCancel($payment_id, $amount)
		{
			$bodyParams = array(
				'amount' => $amount
			);
			
			try {
				if($this->debug){
					print json_encode($bodyParams);
				}
				
				$request = new Request($this);
				$response = $request->post($this, '/v1/payments/credit/'.$payment_id.'/cancel', json_encode($bodyParams));
				
				$authResponse = new Authorize();
				$authResponse->mapperJson($response);
				
				return $authResponse;
			}catch (Exception $e) {
				return $this->generateErrorResponse($e);
			}
		}
		
		public function cancelTransaction($payment_id, $cancel_amount, $cancel_custom_key)
		{
			$bodyParams = array(
				'payment_id' => $payment_id,
				'cancel_amount' => $cancel_amount,
				'cancel_custom_key' => $$cancel_custom_key
			);
			
			try {
				if($this->debug){
					print json_encode($bodyParams);
				}
				
				$request = new Request($this);
				$response = $request->post($this, '/v1/payments/cancel/request', json_encode($bodyParams));
				
				$authResponse = new Authorize();
				$authResponse->mapperJson($response);
				
				return $authResponse;
			}catch (Exception $e) {
				return $this->generateErrorResponse($e);
			}
		}
		
		/**
		 *
		 * @param Exception $e
		 * @return Response
		 */
		private function generateErrorResponse(Exception $e): Response
		{
			$error = new Response();
			$error->mapperJson(json_decode($e->getMessage(), true));
			
			if (empty($error->getStatus())) {
				$error->setStatus(Transaction::STATUS_ERROR);
			}
			
			return $error;
		}
		
	}