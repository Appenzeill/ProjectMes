<?php
$errors = '';
$status = "";
?>
<?php
if (Input::exists()) {
	$validate = new Validate();
	$validation = $validate->check($_POST,[
//		'disease' => array( 'required' => true,'unique' =>'disease'), //,'unique' =>'users'
	]);

	if ($validation->passed()) {
		Database::getInstance()->create(
			'disease',
			[
				'disease' => Input::get('naam'),
				'remark' => Input::get('omschrijving'),
			]);
		$status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Nieuwe aandoening toegevoegd!!
	                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                          <span aria-hidden='true'>&times;</span>
	                       </button>
	                      </div>
	                      ";
	} else {
	$status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Niet alles is ingevuld...
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                          <span aria-hidden=\"true\">&times;</span>
                       </button>
                      </div>";
//		$errors = print_r($validation->errors());
	}
}
?>

<?php echo $status; ?>
<div class="jumbotron bg-dark text-white m-4 p-5">
	<h1 class="display-3 text-center">Aandoening toevoegen</h1>
	<hr class="bg-secondary w-50">
	<form class="mx-auto" style="width: 500px;" action="" method="post">

		<div class="form-group">
			<label for="username">Naam</label>
			<input type="text" class="form-control" name="naam" id="naam" placeholder="Naam aandoeling" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="password">Omschrijving</label>
			<input type="text" class="form-control" name="omschrijving" id="omschrijving" placeholder="Omschrijving">
		</div>
		<input class="btn btn-brand btn-block " type="submit" value="Register">
	</form>
</div>
