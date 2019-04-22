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
