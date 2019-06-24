<nav class="navbar navbar-expand-lg navbar-light " id="blue-bar">
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

            if(isset($_GET['room_dashboard']))
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
            <li class=\"breadcrumb-item active\" aria-current=\"page\">Permissies Dashboard</li>
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
	        <li class=\"breadcrumb-item\"><a href=\"?role_dashboard\">Rollen dashboard</a></li>
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

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <button class="btn btn-light" id="menu-toggle">Toggle Menu</button>

                    <a class="btn btn-light" href="logout.php" style="color: gray">Uitloggen</a>
            </li>
        </ul>
    </div>
</nav>
<!--Script om sidebar aan of uit te toggelen.-->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
