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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
            if(isset($_GET['start_screen']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
	            ";
            }
            if(isset($_GET['client_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Cliënten dashboard</li>

	            ";
            }
            if(isset($_GET['client_new']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"?client_dashboard\">Cliënten dashboard</a></li>
                <li class=\"breadcrumb-item active\" aria-current=\"page\">Cliënt aanmaken</li>
	            ";
            }
            if(isset($_GET['client_edit']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"?client_dashboard\">Cliënten dashboard</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Cliënt aanpassen</li>
	            ";
            }
            if(isset($_GET['user_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Gebruikers dashboard</li>
	            ";
            }
            if(isset($_GET['user_create']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
	        	        <li class=\"breadcrumb-item\"><a href=\"?user_dashboard\">Gebruikers dashboard</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Gebruikers registreren</li>
	            ";
            }
            if(isset($_GET['item_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['establishment_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['medication_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">test</a></li>
	            ";
            }
            if(isset($_GET['treatment_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"\">Library</a></li>
	            ";
            }
            if(isset($_GET['appointment_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['medication_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['room_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['medication_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['bed_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['permission_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item\"><a href=\"#\">Library</a></li>
	            ";
            }
            if(isset($_GET['role_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Rollen Dashboard</li>
	            ";
            }
            if(isset($_GET['role_add']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
	        <li class=\"breadcrumb-item\"><a href=\"?user_dashboard\">Rollen dashboard</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Gebruikers registreren</li>
	            ";
            }
            if(isset($_GET['role_create']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
	        <li class=\"breadcrumb-item\"><a href=\"?role_dashboard\">Rollen dashboard</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Rollen menu</li>
	            ";
            }
            if(isset($_GET['condition_dashboard']))
            {
	            echo "
	        <li class=\"breadcrumb-item\"><a href=\"?start_screen\">Home</a></li>
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Aandoeningen Dashboard</li>
	            ";
            }
            ?>
        </ol>
    </nav>
    <div class="list-group list-group-flush">
	    <?php
	    foreach ($permissions->results() as $permission) {
		    if ($permission->user_permission_id == 2) {
			    echo "<a href=\"?client_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Cliënten Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 5) {
			    echo "<a href=\"?user_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Gebruikers Dashboard</a>";
		    }
/*		    if ($permission->user_permission_id == 8) {
			    echo "<a href=\"?item_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Voorwerpen Dashboard</a>";
		    }*/
/*		    if ($permission->user_permission_id == 11) {
			    echo "<a href=\"?establishment_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Establishment Dashboard</a>";
		    }*/
/*		    if ($permission->user_permission_id == 14) {
			    echo "<a href=\"?medication_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Medicatie Dashboard</a>";
		    }*/
/*		    if ($permission->user_permission_id == 17) {
			    echo "<a href=\"?treatment_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Behandelingen Dashboard</a>";
		    }*/
/*		    if ($permission->user_permission_id == 20) {
			    echo "<a href=\"?appointment_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Bezoeken Dashboard</a>";
		    }*/
/*		    if ($permission->user_permission_id == 23) {
			    echo "<a href=\"?room_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Kamer Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 26) {
			    echo "<a href=\"?bed_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Bedden Dashboard</a>";
		    }*/
	/*	    if ($permission->user_permission_id == 29) {
			    echo "<a href=\"?department_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Afdeling Dashboard</a>";
		    }*/
		    if ($permission->user_permission_id == 32) {
			    echo "<a href=\"?permission_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Permissies Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 35) {
			    echo "<a href=\"?role_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Rollen Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 38) {
			    echo "<a href=\"?condition_dashboard=\" class=\"list-group-item list-group-item-action bg-light\"> Aandoeningen Dashboard</a>";
		    }
		    if ($permission->user_permission_id == 40) {
		    }
	    }
	    ?>
    </div>
</div>
<!-- Page Content -->
<div id="page-content-wrapper">
<!-- /#sidebar-wrapper -->