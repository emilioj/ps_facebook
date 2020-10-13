<?php

namespace PrestaShop\Module\PrestashopFacebook\DTO;

use JsonSerializable;

class Ads implements JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $createdAt;

    /**
     * Ads constructor.
     *
     * @param string $name
     * @param string $email
     * @param int $createdAt
     */
    public function __construct($name, $email, $createdAt)
    {
        $this->name = $name;
        $this->email = $email;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function jsonSerialize()
    {
        return [
          'name' => $this->getName(),
          'email' => $this->getEmail(),
          'createdAt' => $this->getCreatedAt(),
        ];
    }
}
