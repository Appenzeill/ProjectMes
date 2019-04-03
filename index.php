<?php
include_once("Core/init.php");
include_once("Includes/parts/top-navbar.php");
include_once("Includes/parts/side-navbar.php");
function get_users(){
}
if(isset($_GET['get_users']))
{
	include_once("Includes/parts/dashboard.php");
}

function register_user(){
}
if(isset($_GET['register_user']))
{
	include_once("Includes/parts/register.php");
}

function account_user(){
}
if(isset($_GET['account_user']))
{
	include_once("Includes/parts/account.php");
}

?>


