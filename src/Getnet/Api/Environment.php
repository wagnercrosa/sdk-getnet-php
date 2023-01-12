<?php
	
	namespace Source\Api;
	
	/**
	 *
	 * Class Environment
	 *
	 * @package Source\Api\Environment
	 *
	 *
	 * @author Wagner Corrêa
	 *
	 */
	class Environment
	{
		private $api;
		
		/**
		 *
		 * @param string $api
		 *
		 */
		public function __construct(string $api)
		{
			$this->api = $api;
		}
		
		/**
		 *
		 * @return Environment
		 */
		public static function sandbox(): Environment
		{
			return new Environment('https://api-sandbox.getnet.com.br');
		}
		
		/**
		 *
		 * @return Environment
		 */
		public static function homologation(): Environment
		{
			return new Environment('https://api-homologacao.getnet.com.br');
		}
		
		/**
		 *
		 * @return Environment
		 */
		public static function production(): Environment
		{
			return new Environment('https://api.getnet.com.br');
		}
		
		/**
		 * Gets the environment's Api URL
		 * @return mixed
		 */
		public function getUrlApi()
		{
			return $this->api;
		}
	}