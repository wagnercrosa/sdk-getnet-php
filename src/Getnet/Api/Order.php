<?php
	
	namespace Source\Api;
	
	use Source\Api\Traits\TraitEntity;
	
	/**
	 * Class Order
	 *
	 * @package Source\Api
	 *
	 * @author Wagner Corrêa
	 */
	class Order implements \JsonSerializable
	{
		use TraitEntity;
		
		const PRODUCT_TYPE_CASH_CARRY = "cash_carry";
		const PRODUCT_TYPE_DIGITAL_CONTENT = "digital_content";
		const PRODUCT_TYPE_DIGITAL_GOODS = "digital_goods";
		const PRODUCT_TYPE_DIGITAL_PHYSICAL = "digital_physical";
		const PRODUCT_TYPE_GIFT_CARD = "gift_card";
		const PRODUCT_TYPE_PHISICAL_GOODS = "physical_goods";
		const PRODUCT_TYPE_RENEW_SUBS = "renew_subs";
		const PRODUCT_TYPE_SHAREWARE = "shareware";
		const PRODUCT_TYPE_SERVICE = "service";
		
		private $order_id;
		private $product_type;
		private $sales_tax = 0;
		
		/**
		 *
		 * @param string|null $order_id
		 */
		public function __construct(string $order_id = null)
		{
			$this->order_id = $order_id;
		}
		
		/**
		 *
		 * @return string|null
		 */
		public function getOrderId(): ?string
		{
			return $this->order_id;
		}
		
		/**
		 *
		 * @param mixed $order_id
		 */
		public function setOrderId($order_id): string
		{
			return $this->order_id = (string) $order_id;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getProductType()
		{
			return $this->product_type;
		}
		
		/**
		 *
		 * @param mixed $product_type
		 */
		public function setProductType($product_type): string
		{
			return $this->product_type = (string) $product_type;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getSalesTax()
		{
			return $this->sales_tax;
		}
		
		/**
		 *
		 * @param mixed $sales_tax
		 */
		public function setSalesTax($sales_tax): int
		{
			return $this->sales_tax = (int) ($sales_tax * 100);
		}
	}