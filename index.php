<?php
include_once("Core/init.php");
include_once("Includes/parts/top-navbar.php");
//include_once("Includes/parts/side-navbar.php");

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

function get_users(){
}

if(isset($_GET['get_users']))
{
	include_once("Includes/parts/dashboard.php");
}

function add_client(){
}
if(isset($_GET['add_client']))
{
	include_once( "Includes/parts/addClient.php" );
}

function add_practitioner(){
}
if(isset($_GET['add_practitioner']))
{
	include_once( "Includes/parts/addPractitioner.php" );
}


//function register_user(){
//}
//if(isset($_GET['register_user']))
//{
//	include_once( "Includes/parts/addClient.php" );
//}

function account_user(){
}
if(isset($_GET['account_user']))
{
	include_once("Includes/parts/account.php");
}

function permission_dashboard(){
}
if(isset($_GET['permission_dashboard']))
{
	include_once("Includes/parts/permission-dashboard.php");
}

function role_dashboard(){
}
if(isset($_GET['role_dashboard']))
{
	include_once( "Includes/parts/roleToevoegen.php" );
}

function rolename_expand(){
}
if(isset($_GET['rolename_expand']))
{
	include_once( "Includes/parts/roleEdit.php" );
}
?>



