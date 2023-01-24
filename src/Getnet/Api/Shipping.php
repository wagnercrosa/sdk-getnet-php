<?php
namespace Getnet\Api;

/**
 * Class Shipping
 * @author Wagner Corrêa
 * @package Getnet\Api
 */
class Shipping implements \JsonSerializable
{
    use Traits\TraitEntity;

    private $first_name;
    private $name;
    private $email;
    private $phone_number;
    private $shipping_amount = 0;
    private $address;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = (string) $first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = (string) $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = (string) $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = (string) $phone_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShippingAmount()
    {
        return $this->shipping_amount;
    }

    /**
     * @param mixed $shipping_amount
     */
    public function setShippingAmount($shipping_amount)
    {
        $this->shipping_amount = (int) ($shipping_amount * 100);
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return Address
     */
    public function address()
    {
        $address = new Address();

        $this->setAddress($address);

        return $address;
    }

    /**
     * @param Customer $customer
     * @return Shipping
     */
    public function populateByCustomer(Customer $customer)
    {
        $this->setFirstName($customer->getFirstName());
        $this->setName($customer->getName());
        $this->setEmail($customer->getEmail());
        $this->setPhoneNumber($customer->getPhoneNumber());
        $this->setAddress($customer->getBillingAddress());
        return $this;
    }
}