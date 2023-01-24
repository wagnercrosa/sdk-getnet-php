<?php
namespace Getnet\Api;

/**
 * Class Token
 * @author Wagner Corrêa
 * @package Getnet\Api
 */
class Token
{
    public $number_token;
    private $card_number;
    private $customer_id;

    /**
     * Token constructor.
     *
     * @param string $card_number
     * @param string $customer_id
     * @param Getnet $credencial
     */
    public function __construct($card_number, $customer_id, Getnet $credencial)
    {
        $this->setCardNumber($card_number);
        $this->setCustomerId($customer_id);
        $this->setNumberToken($credencial);
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->number_token;
    }

    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->card_number;
    }

    /**
     * @param mixed $card_number
     * @return Token
     */
    public function setCardNumber($card_number)
    {
        $this->card_number = (string) $card_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * @param mixed $customer_id
     * @return Token
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = (string) $customer_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberToken()
    {
        return $this->number_token;
    }
	
	/**
	 * @param Getnet $credencial
	 * @return $this
	 */
	public function setNumberToken(Getnet $credencial)
    {
        $data = array(
            "card_number" => $this->card_number,
            "customer_id" => $this->customer_id
        );

        $request = new Request($credencial);
        $response = $request->post($credencial, "/v1/tokens/card", json_encode($data));
        $this->number_token = $response["number_token"];
        return $this;
    }
}