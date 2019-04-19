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
<!--<script src="JS/javascript.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">-->

