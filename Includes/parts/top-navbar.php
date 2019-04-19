<?php
$id = Session::get(Config::get('session/session_name'));

//$permissions = Database::getInstance()->query(
//"
//SELECT DISTINCT * FROM user_roles INNER JOIN user_permission_lists ON user_roles.id=user_permission_lists.user_permission_list_id INNER JOIN users ON users.role_id=user_permission_lists.user_permission_list_id WHERE users.id = '$id';");
//
//foreach ($permissions->results() as $permission) {
//	//echo $permission->user_permission_id."<br>";
//	if ($permission->user_permission_id == 1) {
//		echo "Permission 1 <br>";
//	}
//	if ($permission->user_permission_id == 2) {
//		echo "Permission 2<br>";
//	}
//	if ($permission->user_permission_id == 3) {
//		echo "Permission 3<br>";
//	}
//	if ($permission->user_permission_id == 4) {
//		echo "Permission 4<br>";
//	}
//	if ($permission->user_permission_id == 5) {
//		echo "Permission 5<br>";
//	}
//	if ($permission->user_permission_id == 6) {
//		echo "Permission 6<br>";
//	}
//	if ($permission->user_permission_id == 7) {
//		echo "Permission 7<br>";
//	}
//	if ($permission->user_permission_id == 8) {
//		echo "Permission 8<br>";
//	}
//	if ($permission->user_permission_id == 9) {
//		echo "Permission 9<br>";
//	}
//	if ($permission->user_permission_id == 10) {
//		echo "Permission 10<br>";
//	}
//	if ($permission->user_permission_id == 11) {
//		echo "Permission 11<br>";
//	}
//	if ($permission->user_permission_id == 12) {
//		echo "Permission 12<br>";
//	}
//	if ($permission->user_permission_id == 13) {
//		echo "Permission 13<br>";
//	}
//	if ($permission->user_permission_id == 14) {
//		echo "Permission 14<br>";
//	}
//	if ($permission->user_permission_id == 15) {
//		echo "Permission 15<br>";
//	}
//	if ($permission->user_permission_id == 16) {
//		echo "Permission 16<br>";
//	}
//	if ($permission->user_permission_id == 17) {
//		echo "Permission 17<br>";
//	}
//	if ($permission->user_permission_id == 18) {
//		echo "Permission 18<br>";
//	}
//	if ($permission->user_permission_id == 19) {
//		echo "Permission 19<br>";
//	}
//	if ($permission->user_permission_id == 20) {
//		echo "Permission 20<br>";
//	}
//	if ($permission->user_permission_id == 21) {
//		echo "Permission 21 <br>";
//	}
//	if ($permission->user_permission_id == 22) {
//		echo "Permission 22<br>";
//	}
//	if ($permission->user_permission_id == 23) {
//		echo "Permission 23<br>";
//	}
//	if ($permission->user_permission_id == 24) {
//		echo "Permission 24<br>";
//	}
//	if ($permission->user_permission_id == 25) {
//		echo "Permission 25<br>";
//	}
//	if ($permission->user_permission_id == 26) {
//		echo "Permission 26<br>";
//	}
//	if ($permission->user_permission_id == 27) {
//		echo "Permission 27<br>";
//	}
//	if ($permission->user_permission_id == 28) {
//		echo "Permission 28<br>";
//	}
//	if ($permission->user_permission_id == 29) {
//		echo "Permission 29<br>";
//	}
//	if ($permission->user_permission_id == 30) {
//		echo "Permission 30 <br>";
//	}
////	if ($permission->user_permission_id == 31) {
////		echo "Permission 31<br>";
////	}
////	if ($permission->user_permission_id == 32) {
////		echo "Permission 32<br>";
////	}
//	if ($permission->user_permission_id == 33) {
//		echo "Permission 33<br>";
//	}
//	if ($permission->user_permission_id == 34) {
//		echo "Permission 34<br>";
//	}
//}
?>


<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-dark" id="sidebar-wrapper">
    <div class="sidebar-heading text-white">
      <a class="navbar-brand text-white" href="#">
        <img src="images/trusted.svg" width="30" height="30" class="d-inline-block align-top mr-1" alt="">
        Trusted
      </a>
    </div>
    <div class="list-group list-group-flush">
      <form method="get">
        <input type="hidden" name="get_users">
        <input class="list-group-item list-group-item-action brand-item" type="submit" value="Dashboard">
      </form>
      <form method="get">
        <input type="hidden" name="add_client">
        <input class="list-group-item list-group-item-action brand-item" type="submit" value="Client toevoegen">
      </form>
      <form method="get">
          <input type="hidden" name="add_practitioner">
          <input class="list-group-item list-group-item-action brand-item" type="submit" value="Huisarts toevoegen">
      </form>
      <form method="get">
          <input type="hidden" name="add_disease">
          <input class="list-group-item list-group-item-action brand-item" type="submit" value="Aandoening toevoegen">
      </form>
      <form method="get">
          <input type="hidden" name="add_insurance">
          <input class="list-group-item list-group-item-action brand-item" type="submit" value="Zorgverzekering toevoegen">
      </form>
      <form method="get">
          <input type="hidden" name="add_pharmacy">
          <input class="list-group-item list-group-item-action brand-item" type="submit" value="Appotheek toevoegen">
      </form>
      <form method="get">
          <input type="hidden" name="add_medication">
          <input class="list-group-item list-group-item-action brand-item" type="submit" value="Medicatie toevoegen">
      </form>
      <form method="get">
          <input type="hidden" name="show_clients_insurance">
          <input class="list-group-item list-group-item-action brand-item" type="submit" value="Eigen clients zorgverzekering">
      </form>
      <form method="get">
          <input type="hidden" name="show_clients_practitioner">
          <input class="list-group-item list-group-item-action brand-item" type="submit" value="Eigen clients huisarts">
      </form>
      <form method="get">
        <input type="hidden" name="permission_dashboard">
        <input class="list-group-item list-group-item-action brand-item" type="submit" value="Permission dashboard">
      </form>
      </form>
      <form method="get">
        <input type="hidden" name="role_dashboard">
        <input class="list-group-item list-group-item-action brand-item" type="submit" value="Role toevoegen">
      </form>
      </form>
      <form method="get">
        <input type="hidden" name="rolename_expand">
        <input class="list-group-item list-group-item-action brand-item" type="submit" value="Role aanpassen">
      </form>
    </div>
  </div>

  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="btn-toggle-brand text-white" id="menu-toggle"><i class="material-icons">arrow_forward_ios</i></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <?php
                $id = Session::get(Config::get('session/session_name'));

                $user = Database::getInstance()->get(
	                'users',
	                [
		                'id', '=', $id
	                ]);
                foreach ($user->results() as $u){
                }
                echo $u->first_name. " " .$u->last_name;
                ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <form name="account_user">
                <input type="hidden" name="account_user">
                <input class="dropdown-item" type="submit" value="Profile">
              </form>
              <a class="dropdown-item" href="#">Medical history</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>

    <script>
      $(function () {
        $('.navbar-toggle-sidebar').click(function () {
          $('.navbar-nav').toggleClass('slide-in');
          $('.side-body').toggleClass('body-slide-in');
          $('#search').removeClass('in').addClass('collapse').slideUp(200);
        });

        $('#search-trigger').click(function () {
          $('.navbar-nav').removeClass('slide-in');
          $('.side-body').removeClass('body-slide-in');
          $('.search-input').focus();
        });
      });

    </script>



