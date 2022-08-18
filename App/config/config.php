<?php

// $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $url = explode("/", $url);

// $folder = '/mvcpeta';
$db_name = 'db_sipeta';

// $baseurl = 'http://' . $url[2] . '' . $folder;

define('BASEURL', 'http://localhost/mvcpeta');

// DATABASE
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', $db_name);

// ROOT
define('ROOT', 'C:/xampp/htdocs/mvcpeta/App');
