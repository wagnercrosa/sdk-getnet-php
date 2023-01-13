<?php
	require_once dirname(__DIR__, 1) . '/vendor/autoload.php';
	
	use Source\Api\Getnet;
	use Source\Api\Environment;

	function testService(): Getnet
	{
		$getnet = new Getnet(Environment::sandbox());
		
		$getnet->setSellerId(getenv('GETNET_SELLER_ID'));
		
		return $getnet;
	}