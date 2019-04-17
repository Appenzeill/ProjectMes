<div class="col-md-3 content"  >
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #3498DB; color: white;">
			Item dashboard /
		</div>
		<div class="panel-body">
			<form method="get">
				<input type="hidden" name="item_add">
				<input type="submit" value="Item toevoegen aan gebruiker" class="standard-input">
			</form>
			<form method="get">
				<input type="hidden" name="item_create">
				<input type="submit" value="Item aanmaken" class="standard-input">
			</form>
			<form method="get">
				<input type="hidden" name="item_edit">
				<input type="submit" value="Item aanpassen" class="standard-input">
			</form>
		</div>
	</div>
</div>
<?php
$items = Database::getInstance()->get(
	'items',
	[
		'id', '>=', 1
	]);
?>
<div class="col-md-7 content"  >
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #3498DB; color: white;">
			Items:
		</div>
		<table class="table">
			<thead>
			<tr>
				<th>Voorwerp:</th>
				<th>Beschrijving:</th>
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
			foreach ($items->results() as $item) {
				?>
				<tr>
					<td><?php echo $item->item_name; ?></td>
					<td><?php echo $item->item_description; ?></td>
				</tr>
				<?php
			}
		?>
			</tbody>
		</table>

		</div>
	</div>
</div>