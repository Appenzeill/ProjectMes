
<div class="col-md-4">
    <h1 class="display-5 text-center pt-5">Rollen menu</h1>
    <hr class="bg-secondary">
    <a href="?role_add=" class="btn btn-primary">Rol toevoegen aan gebruiker</a>
    <hr>
    <a href="?role_create=" class="btn btn-primary">Rol aanpassen of aanmaken</a>
</div>


<?php
$items = Database::getInstance()->get(
	'user_roles',
	[
		'id', '>=', 1
	]);
?>
<div class="col-md-8">
    <h1 class="display-5 text-center pt-5">Rollen gegevens</h1>
    <hr class="bg-secondary">
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

        <table class="table">
            <thead>
            <tr>
                <th>Voorwerp:</th>
                <th>Beschrijving:</th>
            </tr>
            </thead>
            <tbody id="myTable">

			<?php
			foreach ($items->results() as $item) {
				?>
                <tr>
                    <td><?php echo $item->user_role_name; ?></td>
                    <td><?php echo $item->user_role_description; ?></td>
                </tr>
				<?php
			}
			?>
            </tbody>
        </table>
</div>
</div>