<?php
namespace Getnet\Api;

/**
 * Class Device
 * @author Wagner Corrêa
 * @package Getnet\Api
 */
class Device implements \JsonSerializable
{
    use Traits\TraitEntity;

    private $device_id;
    private $ip_address;

    /**
     * @param string|null $device_id
     */
    public function __construct($device_id = null)
    {
        $this->device_id = $device_id;
    }

    /**
     * @return mixed
     */
    public function getDeviceId()
    {
        return $this->device_id;
    }

    /**
     * @param mixed $device_id
     */
    public function setDeviceId($device_id)
    {
        $this->device_id = (string) $device_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param mixed $ip_address
     */
    public function setIpAddress($ip_address)
    {
        $this->ip_address = (string) $ip_address;
        return $this;
    }
}