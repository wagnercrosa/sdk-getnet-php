<?php
	
	require dirname(__DIR__, 1) . '/vendor/autoload.php';
	
	use Source\Api\Environment;
	use Source\Api\Getnet;
	use Source\Api\Transaction;
	use Source\Api\Token;
	use Source\Api\Credit;
	use Source\Api\Customer;
	use Source\Api\Card;
	use Source\Api\Order;
	
	
	$getnet = new Getnet(Environment::sandbox());
	
	var_dump($getnet);
	die();
	
	$transaction = new Transaction();
	$transaction->setSellerId($getnet->getSellerId());
	$transaction->setCurrency("BRL");
	$transaction->setAmount(55.45);
	
	$transaction->order("123456")
		->setProductType(Order::PRODUCT_TYPE_SERVICE)
		->setSalesTax(0);
	
	$tokenCard = new Token("5155901222280001", "customer_210818263", $getnet);
	
