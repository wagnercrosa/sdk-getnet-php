<?php
	
	namespace Source\Api;
	
	use Source\Api\Card;
	use Source\Api\Token;
	use Source\Api\Traits\TraitEntity;
	
	/**
	 * Class Credit
	 *
	 * @package Source\Api
	 *
	 * @author Wagner Corrêa
	 */
	class Credit implements \JsonSerializable
	{
		use TraitEntity;
		
		// Pagamento completo à vista
		const TRANSACTION_TYPE_FULL = "FULL";
		// Pagamento parcelado sem juros
		const TRANSACTION_TYPE_INSTALL_NO_INTEREST = "INSTALL_NO_INTEREST";
		// Pagamento parcelado com juros
		const TRANSACTION_TYPE_INSTALL_WITH_INTEREST = "INSTALL_WITH_INTEREST";
		
		private $authenticated;
		private $delayed;
		private $dynamic_mcc;
		private $number_installments;
		private $pre_authorization = false;
		private $save_card_data;
		private $soft_descriptor;
		private $transaction_type;
		private $card;
		private $cardholder_mobile;
		
		/**
		 * @return mixed
		 */
		public function getAuthenticated()
		{
			return $this->authenticated;
		}
		
		/**
		 * @param mixed $authenticated
		 */
		public function setAuthenticated($authenticated)
		{
			$this->authenticated = $authenticated;
			return $this;
		}
		
		/**
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
		 * @return mixed
		 */
		public function getDynamicMcc()
		{
			return $this->dynamic_mcc;
		}
		
		/**
		 * @param mixed $dynamic_mcc
		 */
		public function setDynamicMcc($dynamic_mcc): int
		{
			$this->dynamic_mcc = (int) $dynamic_mcc;
			return $this;
		}
		
		/**
		 * @return mixed
		 */
		public function getNumberInstallments()
		{
			return $this->number_installments;
		}
		
		/**
		 * @param mixed $number_installments
		 */
		public function setNumberInstallments($number_installments)
		{
			$this->number_installments = (int) $number_installments;
			return $this;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getPreAuthorization()
		{
			return $this->pre_authorization;
		}
		
		/**
		 *
		 * @param mixed $pre_authorization
		 */
		public function setPreAuthorization($pre_authorization)
		{
			return $this->pre_authorization = $pre_authorization;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getSaveCardData()
		{
			return $this->save_card_data;
		}
		
		/**
		 *
		 * @param mixed $save_card_data
		 */
		public function setSaveCardData($save_card_data)
		{
			return $this->save_card_data = $save_card_data;
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
		 */
		public function setSoftDescriptor($soft_descriptor): string
		{
			return $this->soft_descriptor = (string) $soft_descriptor;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getTransactionType()
		{
			return $this->transaction_type;
		}
		
		/**
		 *
		 * @param mixed $transaction_type
		 */
		public function setTransactionType($transaction_type): string
		{
			return $this->transaction_type = (string) $transaction_type;
		}
		
		/**
		 *
		 * @param Token $token
		 * @return Card
		 */
		public function card(Token $token): Card
		{
			$card = new Card($token);
			
			$this->setCard($card);
			
			return $card;
		}
		
		/**
		 *
		 * @return Card
		 */
		public function getCard(): Card
		{
			return $this->card;
		}
		
		/**
		 *
		 * @param Card $card
		 * @return Card
		 */
		public function setCard(Card $card): Card
		{
			return $this->card = $card;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getCardholderMobile()
		{
			return $this->cardholder_mobile;
		}
		
		/**
		 *
		 * @param mixed $cardholder_mobile
		 */
		public function setCardholderMobile($cardholder_mobile): string
		{
			return $this->cardholder_mobile = (string) $cardholder_mobile;
		}
	}