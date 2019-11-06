<?php

// src/Entity/Session.php
namespace App\Model;

class SessionResponse
{

    public $session;


    public $trips;

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @param mixed $session
     * @return SessionResponse
     */
    public function setSession($session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrips()
    {
        return $this->trips;
    }

    /**
     * @param mixed $trips
     * @return SessionResponse
     */
    public function setTrips($trips)
    {
        $this->trips = $trips;
        return $this;
    }



}


