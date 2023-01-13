<?php
	
	namespace Source\Api;
	
	use Source\Api\Traits\TraitEntity;
	
	/**
	 * Class Device
	 *
	 * @package Source\Api
	 *
	 * @author Wagner Corrêa
	 */
	class Device
	{
		
		use TraitEntity;
		
		private $device_id;
		private $ip_address;
		
		/**
		 *
		 * @param string|null $device_id
		 */
		public function __construct(string $device_id = null)
		{
			$this->device_id = $device_id;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getDeviceId()
		{
			return $this->device_id;
		}
		
		/**
		 *
		 * @param mixed $device_id
		 */
		public function setDeviceId($device_id): string
		{
			return $this->device_id = (string) $device_id;
		}
		
		/**
		 *
		 * @return mixed
		 */
		public function getIpAddress()
		{
			return $this->ip_address;
		}
		
		/**
		 *
		 * @param mixed $ip_address
		 */
		public function setIpAddress($ip_address): string
		{
			return $this->ip_address = (string) $ip_address;
		}
	}