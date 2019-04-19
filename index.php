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

function add_disease(){
}
if(isset($_GET['add_disease']))
{
	include_once( "Includes/parts/addDisease.php" );
}

function add_insurance(){
}
if(isset($_GET['add_insurance']))
{
	include_once( "Includes/parts/addInsurance.php" );
}

function add_pharmacy(){
}
if(isset($_GET['add_pharmacy']))
{
	include_once( "Includes/parts/addPharmacy.php" );
}


function show_clients_insurance(){
}
if(isset($_GET['show_clients_insurance']))
{
	include_once( "Includes/parts/showClientsInsurance.php" );
}

function show_clients_practitioner(){
}
if(isset($_GET['show_clients_practitioner']))
{
	include_once( "Includes/parts/showClientsPractitioner.php" );
}

function add_medication(){
}
if(isset($_GET['add_medication']))
{
	include_once( "Includes/parts/addMedication.php" );
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

function add_therapy_client(){
}
if(isset($_GET['add_therapy_client']))
{
	include_once( "Includes/parts/addTherapyClient.php" );
}

function add_disease_client(){
}
if(isset($_GET['add_disease_client']))
{
	include_once( "Includes/parts/addDiseaseClient.php" );
}

function add_description_client(){
}
if(isset($_GET['add_description_client']))
{
	include_once( "Includes/parts/addDescriptionClient.php" );
}



?>



