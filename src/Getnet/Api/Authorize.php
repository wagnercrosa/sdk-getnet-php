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
			$this->redirect_url = $redirect_url;
			return $this;
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
			$this->issuer_payment_id = $issuer_payment_id;
			return $this;
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
			$this->payer_authentication_request = $payer_authentication_request;
			return $this;
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
		 * @param mixed $delayed
		 */
		public function setDelayed($delayed)
		{
			$this->delayed = $delayed;
			return $this;
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
		 * @param mixed $authorization_code
		 */
		public function setAuthorizationCode($authorization_code)
		{
			$this->authorization_code = $authorization_code;
			return $this;
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
		 * @param mixed $authorized_at
		 */
		public function setAuthorizedAt($authorized_at): Authorize
		{
			$this->authorized_at = $authorized_at;
			return $this;
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
		 * @param mixed $reason_code
		 */
		public function setReasonCode($reason_code)
		{
			$this->reason_code = $reason_code;
			return $this;
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
		 * @param mixed $reason_message
		 */
		public function setReasonMessage($reason_message)
		{
			$this->reason_message = $reason_message;
			return $this;
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
		 * @param mixed $acquirer
		 */
		public function setAcquirer($acquirer)
		{
			$this->acquirer = $acquirer;
			return $this;
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
		 * @param mixed $soft_descriptor
		 */
		public function setSoftDescriptor($soft_descriptor)
		{
			$this->soft_descriptor = $soft_descriptor;
			return $this;
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
		 * @param mixed $brand
		 */
		public function setBrand($brand)
		{
			$this->brand = $brand;
			return $this;
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
		 * @param mixed $terminal_nsu
		 */
		public function setTerminalNsu($terminal_nsu)
		{
			$this->terminal_nsu = $terminal_nsu;
			return $this;
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
		 * @param mixed $acquirer_transaction_id
		 */
		public function setAcquirerTransactionId($acquirer_transaction_id)
		{
			$this->acquirer_transaction_id = $acquirer_transaction_id;
			return $this;
		}
	}