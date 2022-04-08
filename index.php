<?php

/*
 * Author: Kylee Dicken
 * Date: 3/31/2022
 * Name: index.php
 * Description: home index page
 */

//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();