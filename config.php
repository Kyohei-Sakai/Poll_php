<?php

ini_set('display_errors', 1);

define('DSN', 'mysql:host=localhost;dbname=dotinstall_poll_php');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWARD', 'htmr821');

session_start();

require_once(__DIR__ . '/function.php');
