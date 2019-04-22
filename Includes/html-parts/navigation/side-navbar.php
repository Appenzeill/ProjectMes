<?php
$id = Session::get(Config::get('session/session_name'));
$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $id
	]);
$permissions = Database::getInstance()->query(
	"
SELECT DISTINCT * FROM user_roles INNER JOIN user_permission_lists ON user_roles.id=user_permission_lists.user_permission_list_id INNER JOIN users ON users.role_id=user_permission_lists.user_permission_list_id WHERE users.id = '$id';
");
if (!$user->count()) {
	echo "
<script>
    window.location.replace(\"login.php\");
</script>
";
} else {
	foreach ( $user->results() as $user ) {
		$data1 = "Welkom " . $user->first_name . " " . $user->last_name . " op uw dashboard.<br>";
	}
}
?>
<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <h1 class="display-7 text-center pt-1">Dashboard</h1>
    <div class="list-group list-group-flush">
	    <?php
	    foreach ($permissions->results() as $permission) {
		    if ($permission->user_permission_id == 2) {
			    echo "<a href=\"?client_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Cliënten Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 5) {
			    echo "<a href=\"?user_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Gebruikers Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 8) {
			    echo "<a href=\"?item_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Voorwerpen Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 11) {
			    echo "<a href=\"?establishment_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Establishment Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 14) {
			    echo "<a href=\"?medication_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Medicatie Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 17) {
			    echo "<a href=\"?treatment_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Behandelingen Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 20) {
			    echo "<a href=\"?appointment_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Bezoeken Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 23) {
			    echo "<a href=\"?room_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Kamer Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 26) {
			    echo "<a href=\"?bed_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Bedden Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 29) {
			    echo "<a href=\"?department_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Afdeling Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 32) {
			    echo "<a href=\"?permission_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Permissies Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 35) {
			    echo "<a href=\"?role_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Rollen Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 38) {
			    echo "<a href=\"?condition_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Aandoeningen Dashboard</a>";
		    }
	    }
	    ?>
    </div>
</div>
<!-- Page Content -->
<div id="page-content-wrapper">
<!-- /#sidebar-wrapper -->