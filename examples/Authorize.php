<?php
	
	require dirname(__DIR__, 1) . '/vendor/autoload.php';
	
	use Getnet\Api\Environment;
	use Getnet\Api\Getnet;
	use Getnet\Api\Transaction;
	use Getnet\Api\Token;
	use Getnet\Api\Credit;
	use Getnet\Api\Customer;
	use Getnet\Api\Card;
	use Getnet\Api\Order;
	
	
	$getnet = new Getnet(Environment::sandbox());
	
	$transaction = new Transaction();
	$transaction->setSellerId($getnet->getSellerId());
	$transaction->setCurrency("BRL");
	$transaction->setAmount(55.45);
	
	$transaction->order("123456")
		->setProductType(Order::PRODUCT_TYPE_SERVICE)
		->setSalesTax(0);
	
	$tokenCard = new Token("5155901222280001", "customer_210818263", $getnet);
	
