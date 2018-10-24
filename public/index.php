<?php

require_once "back/vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$logger = new Logger("testLogger");
$logger->pushHandler(new StreamHandler("php://stdout", Logger::DEBUG));


$logger->info("TEST info");

