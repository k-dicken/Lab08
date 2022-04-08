<?php
/*
 * Author: Kylee Dicken
 * Date: 3/31/2022
 * Name: guest.class.php
 * Description: home index page
 */

class Guest {
    private $firstname, $lastname, $birthdate, $email;

    public function __construct($firstname, $lastname, $birthdate, $email)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthdate = $birthdate;
        $this->email = $email;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getEmail()
    {
        return $this->email;
    }


}