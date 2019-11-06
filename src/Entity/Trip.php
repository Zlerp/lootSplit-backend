<?php

// src/Entity/Product.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

///**
// * @ORM\Entity(repositoryClass="App\Repository\TripRepository")
// */

/**
 *
 * @ORM\Entity
 */
class Trip
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $userName;

    /**
     * @ORM\Column(type="integer")
     */
    public $sessionId;

    /**
     * @ORM\Column(type="integer")
     */
    public $lootValue;




    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param mixed $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @return mixed
     */
    public function getLootValue()
    {
        return $this->lootValue;
    }

    /**
     * @param mixed $lootValue
     */
    public function setLootValue($lootValue)
    {
        $this->lootValue = $lootValue;
    }

    // ... getter and setter methods


}


