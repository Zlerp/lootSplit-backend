<?php

// src/Entity/Session.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

///**
// * @ORM\Entity(repositoryClass="App\Repository\SessionRepository")
// */

/**
 *
 * @ORM\Entity
 */
class Session
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
    public $sessionName;


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSessionName()
    {
        return $this->sessionName;
    }

    /**
     * @param mixed $sessionName
     */
    public function setSessionName($sessionName)
    {
        $this->sessionName = $sessionName;
    }

    // ... getter and setter methods


}


