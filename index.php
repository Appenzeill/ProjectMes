<?php
include_once("Core/init.php");
include_once("Includes/html-parts/html/top.php");
include_once("Includes/html-parts/navigation/side-navbar.php");
include_once("Includes/html-parts/navigation/top-navbar.php");
include_once("Includes/html-parts/navigation/top-navbar.php");

echo "<script type=\"text/javascript\">
    setTimeout(function() { window.location.href = \"logout.php\"; }, 300000); // 300000 = 5 min
</script>";
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
?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
<?php
/*
 * Dashboard wanneer applicatie opstart.
 */
if(isset($_GET['start_screen']))
{
	include_once("Includes/parts/dashboard.php");
}
if(isset($_GET['permission_dashboard']))
{
	include_once("Includes/parts/permission-add.php");
}
/*
 * Cliënt registeren.
 */
if(isset($_GET['register_user']))
{
	include_once("Includes/parts/register.php");
}
if(isset($_GET['client_dashboard']))
{
	include_once("Includes/parts/client-dashboard/client-dashboard.php");
}
if(isset($_GET['client_new']))
{
	include_once("Includes/parts/client-dashboard/client-new.php");
}
if(isset($_GET['client_edit']))
{
	include_once("Includes/parts/client-dashboard/client-edit.php");
}
/*
 * Cliënt aanpassen.
 */
if(isset($_GET['modify_user']))
{
	include_once("Includes/parts/modify.php");
}
if(isset($_GET['medication_delete']))
{
	include_once("Includes/parts/medication-dashboard/medication_delete.php");
}

/*
 * Role dashboard
 */
// rol dashboard pagina
if(isset($_GET['role_dashboard']))
{
	include_once( "Includes/parts/role-dashboard/role-dashboard.php" );
}
// rol aanmaken pagina
if(isset($_GET['role_create']))
{
	include_once( "Includes/parts/role-dashboard/role-create.php" );
}
// rol toevoegen pagina.
if(isset($_GET['role_add']))
{
	include_once( "Includes/parts/role-dashboard/role-add.php" );
}
// rol aanpassen pagina.
if(isset($_GET['role_edit']))
{
	include_once( "Includes/parts/role-dashboard/role-edit.php" );
}

/*
 * Item dashboard
 */
// item dashboard pagina
if(isset($_GET['item_dashboard']))
{
	include_once( "Includes/parts/item-dashboard/item-dashboard.php" );
}
// item aanmaken pagina
if(isset($_GET['item_create']))
{
	include_once( "Includes/parts/item-dashboard/item-create.php" );
}
// item toevoegen pagina
if(isset($_GET['item_add']))
{
	include_once( "Includes/parts/item-dashboard/item-add.php" );
}
// item aanpassen pagina
if(isset($_GET['item_edit']))
{
	include_once( "Includes/parts/item-dashboard/item-edit.php" );
}

/*
 * Aandoeningen dashboard
 */
// Aandoeningen dashboard pagina
if(isset($_GET['condition_dashboard']))
{
	include_once( "Includes/parts/condition-dashboard/condition-dashboard.php" );
}
/*
 * Gebruikers dashboard
 */
// Aandoeningen dashboard pagina
if(isset($_GET['user_dashboard']))
{
	include_once( "Includes/parts/user-dashboard/user-dashboard.php");
}
if(isset($_GET['user_create']))
{
	include_once( "Includes/parts/user-dashboard/user-create.php");
}
if(isset($_GET['user_role_edit']))
{
	include_once( "Includes/parts/user-dashboard/user-create.php");
}
if(isset($_GET['calendar_dashboard']))
{
    include_once( "Includes/parts/calendar-dashboard/calendar-dashboard.php");
}
if(isset($_GET['beeldbank-dashboard']))
{
    include_once( "Includes/parts/beeldbank-dashboard/beeldbank-dashboard.php");
}
if(isset($_GET['chat_dashboard']))
{
    include_once( "Includes/parts/chat-dashboard/chat-dashboard.php");
}
if(isset($_GET['room']))
{
    include_once( "Includes/parts/chat-dashboard/chat-response.php");
}
if(isset($_GET['appointment_dashboard']))
{
    include_once( "Includes/parts/appointment-dashboard/appointment-dashboard.php");
}
?>
        </div>
    </div>
</div>
<?php



include_once("Includes/html-parts/html/bottom.php");

?>

