<?php
include_once("Core/init.php");
include_once("Includes/parts/top-navbar.php");
include_once("Includes/parts/side-navbar.php");
function get_users(){
}


$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', Session::get(Config::get('session/session_name'))
	]);

if (!$user->count()) {
	echo "
<script>
    window.location.replace(\"login.php\");
</script>
";
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
if(isset($_GET['modify_user']))
{
	include_once("Includes/parts/modify.php");
}

?>


