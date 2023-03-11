<?php
	
	use Getnet\API\Getnet;
	use Getnet\API\Transaction;
	use Getnet\API\Environment;
	use Getnet\API\Token;
	use Getnet\API\Credit;
	use Getnet\API\Customer;
	use Getnet\API\Card;
	use Getnet\API\Order;
	use Getnet\API\Boleto;
	
	require __DIR__ . '/vendor/autoload.php';
	
	$client_id      = "df1c27a0-4aea-439f-b43a-35a107d157d4";
	$seller_id      = "16a3b31b-246d-4caf-ba5b-84faa2cdf1cc";
	$client_secret  = "e47ba631-e6b4-4945-b9bf-9a7e2723a8d1";
	
	putenv("GETNET_CLIENT_ID=$client_id");
	putenv("GETNET_SELLER_ID=$seller_id");
	putenv("GETNET_CLIENT_SECRET=$client_secret");
	
	$environment    = Environment::sandbox();

//Opicional, passar chave se você quiser guardar o token do auth na sessão para não precisar buscar a cada trasação, só quando expira
	$keySession = null;

//Autenticação da API
	$getnet = new Getnet($environment);

// Inicia uma transação
	$transaction = new Transaction();

// Dados do pedido - Transação
	$transaction->setSellerId($seller_id);
	$transaction->setCurrency("BRL");
	$transaction->setAmount(195.90);

// Detalhes do Pedido
	$transaction->order("123456")
		->setProductType(Order::PRODUCT_TYPE_SERVICE)
		->setSalesTax(0);

// Gera token do cartão - Obrigatório
	$tokenCard = new Token("5155901222280001", "customer_210818263", $getnet);

// Dados do método de pagamento do comprador
	$transaction->credit()
		->setAuthenticated(false)
		->setDynamicMcc("1799")
		->setSoftDescriptor("LOJA*TESTE*COMPRA-123")
		->setDelayed(false)
		->setPreAuthorization(false)
		->setNumberInstallments(2)
		->setSaveCardData(false)
		->setTransactionType(Credit::TRANSACTION_TYPE_INSTALL_NO_INTEREST)
		->card($tokenCard)
		->setBrand(Card::BRAND_MASTERCARD)
		->setExpirationMonth("12")
		->setExpirationYear("30")
		->setCardholderName("Jax Teller")
		->setSecurityCode("123");

// Dados pessoais do comprador
	$transaction->customer("customer_210818263")
		->setDocumentType(Customer::DOCUMENT_TYPE_CPF)
		->setEmail("customer@email.com.br")
		->setFirstName("Jax")
		->setLastName("Teller")
		->setName("Jax Teller")
		->setPhoneNumber("5551999887766")
		->setDocumentNumber("12345678912")
		->billingAddress()
		->setCity("São Paulo")
		->setComplement("Sons of Anarchy")
		->setCountry("Brasil")
		->setDistrict("Centro")
		->setNumber("1000")
		->setPostalCode("90230060")
		->setState("SP")
		->setStreet("Av. Brasil");

// Dados de entrega do pedido
	$transaction->shipping()
		->setFirstName("Jax")
		->setEmail("customer@email.com.br")
		->setName("Jax Teller")
		->setPhoneNumber("5551999887766")
		->setShippingAmount(0)
		->address()
		->setCity("Porto Alegre")
		->setComplement("Sons of Anarchy")
		->setCountry("Brasil")
		->setDistrict("São Geraldo")
		->setNumber("1000")
		->setPostalCode("90230060")
		->setState("RS")
		->setStreet("Av. Brasil");

//Ou pode adicionar entrega com os mesmos dados do customer
//$transaction->addShippingByCustomer($transaction->getCustomer())->setShippingAmount(0);

// FingerPrint - Antifraude
	$transaction->device("device_id")->setIpAddress("127.0.0.1");

// Processa a Transação
	$response = $getnet->authorize($transaction);

// Resultado da transação - Consultar tabela abaixo
	echo $response->getStatus();
	
	var_dump($response);
	
	
