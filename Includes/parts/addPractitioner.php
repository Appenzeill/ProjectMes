<?php
$errors = '';
$status = "";


?>

<?php
if (Input::exists()) {
	$validate = new Validate();
	$validation = $validate->check($_POST,[
		'username' => array( 'required' => true), //,'unique' =>'users'
		'first_name' => array( 'required' => true),
		'last_name' => array( 'required' => true),
		'email' => array( 'required' => true), //, 'unique' =>'email'

	]);
	$hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);

	if ($validation->passed()) {
		Database::getInstance()->insert(
			'users',
			[
				'username'  => Input::get('username'),
				'first_name'  =>  Input::get('first_name'),
				'last_name'  =>  Input::get('last_name'),
				'email'  =>  Input::get('email'),
				'role' => "practitioner",
				'hash'      =>  $hashed_password,
			]);

		$userIds =Database::getInstance()->query(
			"SELECT id FROM users ORDER BY id DESC LIMIT 1;"
		);
		foreach ($userIds->results() as $userid){
			Database::getInstance()->create(
				'practitioner',
				[
					'user_id' => $userid->id,
					'owner'  => Input::get('eigenaar'),
					'city'  =>  Input::get('woonplaats'),
					'phone_number' => Input::get('telefoon'),
					'practitioner' => Input::get('clinic'),
				]);

		}

		$status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Nieuwe huisarts toegevoegd!!
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                          <span aria-hidden=\"true\">&times;</span>
                       </button>
                      </div>
                      ";
	} else {
//	$status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Niet alles is ingevuld...
//                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
//                          <span aria-hidden=\"true\">&times;</span>
//                       </button>
//                      </div>";
		$errors = print_r($validation->errors());
	}
}
?>

<?php echo $status; ?>
<div class="jumbotron bg-dark text-white m-4 p-5">
	<h1 class="display-3 text-center">Registreer huisarts</h1>
	<hr class="bg-secondary w-50">
	<form class="mx-auto" style="width: 500px;" action="" method="post">

		<div class="form-group">
			<label for="username">Gebruikersnaam</label>
			<input type="text" class="form-control" name="username" id="username" placeholder="Gebruikersnaam" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="password">Wachtwoord</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Wachtwoord" required>
		</div>
		<div class="form-group">
			<label for="first_name">Voornaam</label>
			<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Voornaam" required>
		</div>
		<div class="form-group">
			<label for="first_name">Achternaam</label>
			<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Achternaam" required>
		</div>
		<div class="form-group">
			<label for="first_name">Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="voorbeeld@gmail.com" required>
		</div>




		<h1 class="display-3 text-center pt-5">Gegevens huisarts</h1>
		<hr class="bg-secondary">
		<div class="form-group">
			<label for="password">Eigenaar</label>
			<input type="text" class="form-control" name="eigenaar" id="eigenaar" placeholder="Eigenaar" required>
		</div>
		<div class="form-group">
			<label for="password">Woonplaats</label>
			<input type="text" class="form-control" name="woonplaats" id="woonplaats" placeholder="Woonplaats" required>
		</div>
		<div class="form-group">
			<label for="first_name">Telefoon</label>
			<input type="text" class="form-control" name="telefoon" id="telefoon" placeholder="Telefoon" required>
		</div>
		<div class="form-group">
			<label for="first_name">Naam clinic</label>
			<input type="text" class="form-control" name="clinic" id="clinic" placeholder="Naam clinic" required>
		</div>
		<input class="btn btn-brand btn-block " type="submit" value="Register">
	</form>
</div>
