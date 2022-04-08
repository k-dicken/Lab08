<?php

/*
 * Author: Kylee Dicken
 * Date: 3/31/2022
 * Name: index.php
 * Description: home index page
 */

//include code in vendor/autoload.php file
require_once ("vendor/autoload.php");

//create an object of GuestController
$guest_controller = new GuestController();
$guest_model = new GuestModel();

echo $guest_model->getGuests();
echo $test;

//add your code below this line to complete this file
