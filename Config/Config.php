<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

define('BASE_URL', $_ENV['BASE_URL']);
define('DBHOST', $_ENV['DB_HOST']);
define('DBUSER', $_ENV['DB_USER']);
define('DBPASS', $_ENV['DB_PASS']);
define('DBNAME', $_ENV['DB_NAME']);
define('DBPORT', $_ENV['DB_PORT']);
define('DBCHARSET', $_ENV['DB_CHARSET']);