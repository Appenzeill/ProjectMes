<?php
session_start();

$GLOBALS['config'] = [
	'mysql' => [
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'db' => 'projectmes'
	],
	'remember' => [
		'cookie_name' => 'hash',
		'cookie_expiry' => 2629800,
	],
	'session' => [
		'session_name'  =>  'user',
		'token_name'    =>  'token',
	]
];

spl_autoload_register(function ($class){
	require_once 'Classes/' . $class . '.php';
});

require_once 'Functions/sanitize.php';
?>
<!-- Externe scripten en bestanden.-->
<link rel="stylesheet" type="text/css" href="CSS/main.css">
<script src="JS/javascript.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>