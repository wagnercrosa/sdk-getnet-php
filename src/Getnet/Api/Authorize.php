<?php
	
	namespace Source\Api;
	
	/**
	 *
	 * Class Authorize
	 *
	 * @package Getnet\Api
	 *
	 * @author Wagner Corrêa
	 *
	 */
	class Authorize extends Response
	{
		
		protected $delayed;
		protected $authorization_code;
		protected $authorized_at;
		protected $reason_code;
		protected $reason_message;
		protected $acquirer;
		protected $soft_descriptor;
		protected $brand;
		protected $terminal_nsu;
		protected $acquirer_transaction_id;
		protected $redirect_url;
		protected $issuer_payment_id;
		protected $payer_authentication_request;
		
		/**
		 *
		 * @return mixed
		 */
		public function getRedirectUrl()
		{
			return $this->redirect_url;
		}
		
		/**
		 *
		 * @param mixed $redirect_url
		 */
		public function setRedirectUrl($redirect_url)
		{
			return $this->redirect_url = $redirect_url;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getIssuerPaymentId()
		{
			return $this->issuer_payment_id;
		}
		
		/**
		 *
		 * @param mixed $issuer_payment_id
		 */
		public function setIssuerPaymentId($issuer_payment_id)
		{
			return $this->issuer_payment_id = $issuer_payment_id;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getPayerAuthenticationRequest()
		{
			return $this->payer_authentication_request;
		}
		
		/**
		 *
		 * @param mixed $payer_authentication_request
		 */
		public function setPayerAuthenticationRequest($payer_authentication_request)
		{
			return $this->payer_authentication_request = $payer_authentication_request;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getDelayed()
		{
			return $this->delayed;
		}
		
		/**
		 *
		 * @param mixed $delayed
		 * @return Authorize
		 */
		public function setDelayed($delayed): Authorize
		{
			return  $this->delayed = $delayed;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getAuthorizationCode()
		{
			return $this->authorization_code;
		}
		
		/**
		 *
		 * @param mixed $authorization_code
		 * @return Authorize
		 */
		public function setAuthorizationCode($authorization_code): Authorize
		{
			return $this->authorization_code = $authorization_code;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getAuthorizedAt()
		{
			return $this->authorized_at;
		}
		
		/**
		 *
		 * @param mixed $authorized_at
		 * @return Authorize
		 */
		public function setAuthorizedAt($authorized_at): Authorize
		{
			return $this->authorized_at = $authorized_at;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getReasonCode()
		{
			return $this->reason_code;
		}
		
		/**
		 *
		 * @param mixed $reason_code
		 * @return Authorize
		 */
		public function setReasonCode($reason_code): Authorize
		{
			return $this->reason_code = $reason_code;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getReasonMessage()
		{
			return $this->reason_message;
		}
		
		/**
		 *
		 * @param mixed $reason_message
		 * @return Authorize
		 */
		public function setReasonMessage($reason_message): Authorize
		{
			return $this->reason_message = $reason_message;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getAcquirer()
		{
			return $this->acquirer;
		}
		
		/**
		 *
		 * @param mixed $acquirer
		 * @return Authorize
		 */
		public function setAcquirer($acquirer): Authorize
		{
			return $this->acquirer = $acquirer;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getSoftDescriptor()
		{
			return $this->soft_descriptor;
		}
		
		/**
		 *
		 * @param mixed $soft_descriptor
		 * @return Authorize
		 */
		public function setSoftDescriptor($soft_descriptor): Authorize
		{
			return $this->soft_descriptor = $soft_descriptor;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getBrand()
		{
			return $this->brand;
		}
		
		/**
		 *
		 * @param mixed $brand
		 * @return Authorize
		 */
		public function setBrand($brand): Authorize
		{
			return $this->brand = $brand;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getTerminalNsu()
		{
			return $this->terminal_nsu;
		}
		
		/**
		 *
		 * @param mixed $terminal_nsu
		 * @return Authorize
		 */
		public function setTerminalNsu($terminal_nsu): Authorize
		{
			return $this->terminal_nsu = $terminal_nsu;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getAcquirerTransactionId()
		{
			return $this->acquirer_transaction_id;
		}
		
		/**
		 *
		 * @param mixed $acquirer_transaction_id
		 * @return Authorize
		 */
		public function setAcquirerTransactionId($acquirer_transaction_id): Authorize
		{
			return $this->acquirer_transaction_id = $acquirer_transaction_id;
		}
	}