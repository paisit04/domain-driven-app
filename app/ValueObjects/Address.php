<?php

namespace App\ValueObjects;

class Address implements \JsonSerializable
{
    private $value;
    
    public function __construct($address)
    {
        $this->value = $address;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function __toString()
    {
        return (string)$this->value;
    }
    
    public function jsonSerialize()
    {
        return $this->__toString();
    }
    
    public function fromNative($value)
    {
        return new static($value);
    }

    public function getNativeValue()
    {
        return $this->value;
    }
}
