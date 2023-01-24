<?php
	require_once dirname(__DIR__, 1) . '/vendor/autoload.php';
	
	use Getnet\Api\Getnet;
	use Getnet\Api\Environment;

	function testService()
	{
		$getnet = new Getnet(Environment::sandbox());
		
		$getnet->setSellerId(getenv('GETNET_SELLER_ID'));
		
		return $getnet;
	}
	
	testService();