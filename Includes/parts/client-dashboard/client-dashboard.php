<?php

$users = Database::getInstance()->get(
	'users',
	[
		'id', '=', Session::get(Config::get('session/session_name')),
	]);
foreach ($users->results() as $user) {

	    $users = Database::getInstance()->get(
		    'clients',
		    [
			    'huisarts', '=', $user->id
		    ]);

}
$user_role_id = "";
?>
<div class="col-md-4">
        <h1 class="display-5 text-center pt-5">Basis gegevens</h1>
        <hr class="bg-secondary">
    <a href="?client_new=" class="btn btn-primary">Cliënt aanmaken</a>
</div>
<div class="col-md-8">
    <h1 class="display-5 text-center pt-5">Basis gegevens</h1>
    <hr class="bg-secondary">
    <div class="table-responsive">
    <table class="table">
            <thead>
            <tr>
                <th>Aanpassen:</th>
                <th>Voornaam:</th>
                <th>Tussenvoegsel:</th>
                <th>Achternaam:</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
            <br>
            <input id="myInput" type="text" placeholder="Search..">
            <br><br>
		    <?php
		    foreach ($users->results() as $user) {
			    ?>
                <tr>
                    <td>
                        <form action = "" method = "GET">
                            <input type="hidden" name="client_edit" value="<?php echo $user->id; ?>">
                            <input class="brn btn-primary" type="submit" value="Edit"/>
                        </form>
                    </td>
                    <td><?php echo $user->first_name; ?></td>
                    <td><?php echo $user->infix; ?></td>
                    <td><?php echo $user->last_name; ?></td>
                </tr>
			    <?php
		    }
		    ?>
            </tbody>
        </table>
    </div>
</div>