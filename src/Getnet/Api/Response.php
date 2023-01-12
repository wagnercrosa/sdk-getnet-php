<?php
	
	namespace Source\Api;
	
	use Source\Api\Transaction;
	
	/**
	 *
	 * Class Response
	 *
	 * @package Getnet\Api
	 *
	 * @author Wagner Corrêa
	 *
	 */
	class Response implements \JsonSerializable
	{
		
		public $payment_id;
		
		public $seller_id;
		
		public $amount;
		
		public $currency;
		
		public $order_id;
		
		public $status;
		
		public $received_at;
		
		public $message;
		
		public $error_message;
		
		public $error_code;
		
		public $description;
		
		public $description_detail;
		
		public $status_code;
		
		public $responseJSON;
		
		public $status_label;
		
		/**
		 *
		 * @return array
		 */
		public function jsonSerialize(): array
		{
			return get_object_vars($this);
		}
		
		/**
		 *
		 * TODO refactor and mapper individual and remove public props
		 * @param array $json
		 *
		 * @return $this
		 */
		public function mapperJson(array $json): Response
		{
			if (is_array($json)) {
				array_walk_recursive($json, function ($value, $key) {
					
					if (property_exists($this, $key)) {
						$this->$key = $value;
					}
				});
			}
			
			return $this->setResponseJSON($json);
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getErrorMessage()
		{
			return $this->error_message;
		}
		
		/**
		 *
		 * @param mixed $error_message
		 * @return Response
		 */
		public function setErrorMessage($error_message): Response
		{
			return $this->error_message = $error_message;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getStatusCode()
		{
			return $this->status_code;
		}
		
		/**
		 *
		 * @param mixed $status_code
		 * @return Response
		 */
		public function setStatusCode($status_code): Response
		{
			return $this->status_code = $status_code;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getDescriptionDetail()
		{
			return $this->description_detail;
		}
		
		/**
		 *
		 * @param mixed $description_detail
		 * @return Response
		 */
		public function setDescriptionDetail($description_detail): Response
		{
			return $this->description_detail = $description_detail;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getErrorDescription()
		{
			return $this->description;
		}
		
		/**
		 *
		 * @param mixed $description
		 * @return Response
		 */
		public function setErrorDescription($description): Response
		{
			return $this->description = $description;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getPaymentId()
		{
			return $this->payment_id;
		}
		
		/**
		 *
		 * @param mixed $payment_id
		 */
		public function setPaymentId($payment_id): Response
		{
			return $this->payment_id = $payment_id;
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
		 * @param mixed $seller_id
		 */
		public function setSellerId($seller_id): Response
		{
			return $this->seller_id = $seller_id;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getAmount()
		{
			return $this->amount;
		}
		
		/**
		 *
		 * @param mixed $amount
		 */
		public function setAmount($amount): Response
		{
			return $this->amount = $amount;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getCurrency()
		{
			return $this->currency;
		}
		
		/**
		 *
		 * @param mixed $currency
		 */
		public function setCurrency($currency): Response
		{
			return $this->currency = $currency;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getOrderId()
		{
			return $this->order_id;
		}
		
		/**
		 *
		 * @param mixed $order_id
		 */
		public function setOrderId($order_id): Response
		{
			return $this->order_id = $order_id;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getStatus()
		{
			if ($this->status_code == 201) {
				$this->status = Transaction::STATUS_AUTHORIZED;
			} elseif ($this->status_code == 202) {
				$this->status = Transaction::STATUS_AUTHORIZED;
			} elseif ($this->status_code == 402) {
				$this->status = Transaction::STATUS_DENIED;
			} elseif ($this->status_code == 400) {
				$this->status = Transaction::STATUS_ERROR;
			} elseif ($this->status_code == 402) {
				$this->status = Transaction::STATUS_ERROR;
			} elseif ($this->status_code == 500) {
				$this->status = Transaction::STATUS_ERROR;
			} elseif (isset($this->redirect_url)) {
				$this->status = Transaction::STATUS_PENDING;
			} elseif (isset($this->status_label)) {
				// TODO check why return EM ABERTO in boleto
				$this->status = $this->status_label;
			}
			
			return $this->status;
		}
		
		/**
		 *
		 * @param mixed $status
		 */
		public function setStatus($status): Response
		{
			return $this->status = $status;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getReceivedAt()
		{
			return $this->received_at;
		}
		
		/**
		 *
		 * @param mixed $received_at
		 */
		public function setReceivedAt($received_at): Response
		{
			return $this->received_at = $received_at;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getResponseJSON()
		{
			return $this->responseJSON;
		}
		
		/**
		 *
		 * @param mixed $array
		 */
		public function setResponseJSON($array): Response
		{
			$this->responseJSON = json_encode($array, JSON_PRETTY_PRINT);
			
			return $this;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getMessage()
		{
			return $this->message;
		}
		
		/**
		 *
		 * @param mixed $message
		 */
		public function setMessage($message): Response
		{
			return $this->message = $message;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getError_code()
		{
			return $this->error_code;
		}
		
		/**
		 *
		 * @param mixed $error_code
		 */
		public function setError_code($error_code): Response
		{
			return $this->error_code = $error_code;
		}
	}