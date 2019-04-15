<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-dark" id="sidebar-wrapper">
    <div class="sidebar-heading text-white">
      <a href="#"><h1 class="navbar-brand text-white">Trusted</h1></a>
    </div>
    <div class="list-group list-group-flush">
      <form method="get">
        <input type="hidden" name="get_users">
        <input class="list-group-item list-group-item-action brand-item" type="submit" value="Dashboard">
      </form>
      <form method="get">
        <input type="hidden" name="register_user">
        <input class="list-group-item list-group-item-action brand-item" type="submit" value="Registreer gebruiker">
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
              Username
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