<nav class="navbar navbar-expand-lg navbar-light " id="blue-bar">
    <button class="btn btn-light" id="menu-toggle">Toggle Menu</button>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">

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