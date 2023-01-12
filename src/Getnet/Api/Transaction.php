<?php
	
	namespace Source\Api;
	
	use Source\Api\Credit;
	use Source\Api\Customer;
	use Source\Api\Device;
	use Source\Api\Order;
	use Source\Api\Traits\TraitEntity;
	
	/**
	 *
	 * Class Transaction
	 *
	 * @package Getnet\Api
	 *
	 * @author Wagner Corrêa
	 */
	class Transaction implements \JsonSerializable
	{
		use TraitEntity;
		
		const STATUS_AUTHORIZED = "AUTHORIZED";
		const STATUS_CONFIRMED = "CONFIRMED";
		const STATUS_PENDING = "PENDING";
		const STATUS_WAITING = "WAITING";
		const STATUS_APPROVED = "APPROVED";
		const STATUS_CANCELED = "CANCELED";
		const STATUS_DENIED = "DENIED";
		const STATUS_ERROR = "ERROR";
		
		private $seller_id;
		private $amount;
		private $currency = "BRL";
		private $order;
		private $customer;
		private $device;
		private $credit;

		
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
		public function setSellerId($seller_id): string
		{
			return $this->seller_id = (string) $seller_id;
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
		public function setAmount($amount): int
		{
			return $this->amount = (int) ($amount * 100);
		}
		
		/**
		 *
		 * @return string
		 */
		public function getCurrency(): string
		{
			return $this->currency;
		}
		
		/**
		 *
		 * @param string $currency
		 */
		public function setCurrency(string $currency): string
		{
			return $this->currency = (string) $currency;
		}
		
		/**
		 *
		 * @param string|null $order_id
		 * @return Order
		 */
		public function order(string $order_id = null): Order
		{
			$order = new Order($order_id);
			$this->setOrder($order);
			
			return $order;
		}
		
		/**
		 *
		 * @return Order
		 */
		public function getOrder(): Order
		{
			return $this->order;
		}
		
		/**
		 *
		 * @param Order $order
		 */
		public function setOrder(Order $order): Order
		{
			return $this->order = $order;
		}
		
		/**
		 *
		 * @param mixed $id
		 * @return Customer
		 */
		public function customer($id = null): Customer
		{
			$customer = new Customer($id);
			
			$this->setCustomer($customer);
			
			return $customer;
		}
		
		/**
		 *
		 * @return Customer
		 */
		public function getCustomer(): Customer
		{
			return $this->customer;
		}
		
		/**
		 *
		 * @param Customer $customer
		 * @return Customer
		 */
		public function setCustomer(Customer $customer)
		{
			return $this->customer = $customer;
		}
		
		/**
		 *
		 * @param mixed $device_id
		 * @return Device
		 */
		public function device($device_id): Device
		{
			$device = new Device($device_id);
			
			$this->device = $device;
			
			return $device;
		}
		
		/**
		 *
		 * @return Device
		 */
		public function getDevice(): Device
		{
			return $this->device;
		}
		
		/**
		 *
		 * @param Device $device
		 * @return Device
		 */
		public function setDevice(Device $device): Device
		{
			return $this->device = $device;
		}

		/**
		 *
		 * @return Credit
		 */
		public function credit(): Credit
		{
			$credit = new Credit();
			$this->setCredit($credit);
			
			return $credit;
		}
		
		/**
		 *
		 * @return Credit|null
		 */
		public function getCredit(): ?Credit
		{
			return $this->credit;
		}
		
		/**
		 *
		 * @param Credit $credit
		 * @return Credit
		 */
		public function setCredit(Credit $credit): Credit
		{
			return $this->credit = $credit;
		}
	}