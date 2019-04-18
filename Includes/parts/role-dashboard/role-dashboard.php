<div class="col-md-3 content"  >
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #3498DB; color: white;">
			Rol dashboard /
		</div>
		<div class="panel-body">
			<form method="get">
				<input type="hidden" name="role_add">
				<input type="submit" value="Rol toevoegen aan gebruiker" class="standard-input">
			</form>
			<form method="get">
				<input type="hidden" name="role_create">
				<input type="submit" value="Rol aanmaken" class="standard-input">
			</form>
			<form method="get">
				<input type="hidden" name="role_edit">
				<input type="submit" value="Rol aanpassen" class="standard-input">
			</form>
		</div>
	</div>
</div>
<?php
$items = Database::getInstance()->get(
	'user_roles',
	[
		'id', '>=', 1
	]);
?>
<div class="col-md-7 content"  >
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB; color: white;">
            Rollen:
        </div>
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
</div>