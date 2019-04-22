
<div class="col-md-5  content">
	<div class="panel-body">
		<h1 class="display-5 text-center pt-5">Aandoening toevoegen</h1>
		<hr class="bg-secondary">
		<form action="" method="post">
			<table class="table">
				<tbody>
				<tr>
					<td><label for="condition_name">Aandoening naam</label></td>
					<td><input type="text" name="condition_name" id="condition_name" placeholder="Aandoening"  autocomplete="off"></td>
				</tr>
				<tr>
					<td><label for="condition_description">Aandoening beschrijving</label></td>
					<td><input type="text" name="condition_description" id="condition_description" placeholder="Aandoening beschrijving"  autocomplete="off"></td>
				</tr>
				</tbody>
			</table>

			<?php echo "<br>".Input::get('condition_name') ?>
			<?php echo "<br>".Input::get('condition_description') ?>
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (Input::get('condition_name')) {
					$validate = new Validate();
					$validation = $validate->check($_POST,[
						'condition_name' => array( 'required' => true, 'unique' =>'client_conditions' ),
						'condition_description' => array( 'required' => true, 'unique' =>'client_conditions' )
					]);
					if ($validation->passed()) {
						Database::getInstance()->insert(
							'client_conditions',
							[
								'condition_name'            => Input::get('condition_name'),
								'condition_description'     => Input::get('condition_description')
							]
						);
					}
				}
			}
			?>
	</div>
	<input type="submit" value="Voeg toe">
	</form>
</div>

<?php
$conditions = Database::getInstance()->get(
	'client_conditions',
	[
		'id', '>=', 1
	]);
?>
<div class="col-md-7">
	<h1 class="display-5 text-center pt-5">Aandoeningen</h1>
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
		foreach ($conditions->results() as $condition) {
			?>
			<tr>
				<td><?php echo $condition->condition_name; ?></td>
				<td><?php echo $condition->condition_description; ?></td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>
</div>
</div>