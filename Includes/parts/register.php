<?php
$errors = '';
$nope = "";
foreach ($user->results() as $user) {
}
$username_filler    = "";
$firstname_filler   = "";
$lastname_filler    = "";
$email_filler       = "";
if (Input::exists()) {
	$username_filler    = Input::get('username');
	$password_filler    = Input::get('password');
	$firstname_filler   = Input::get('first_name');
	$lastname_filler    = Input::get('last_name');
	$email_filler       = Input::get('email');
}

?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB; color: white;">
            Registreer gebruiker
        </div>
        <div class="panel-body">

            <form action="" method="post">

                <div class="field">
                    <label for="password">Nieuw wachtwoord:</label>
                    <input type="password" name="password" id="password" value="" placeholder="Wachtwoord">
                </div>
                <div class="field">
                    <label for="first_name">Voornaam</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $firstname_filler?>">
                </div>
                <div class="field">
                    <label for="first_name">Achternaam</label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $lastname_filler?>">
                </div>
                <div class="field">
                    <label for="first_name">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $email_filler?>">
                </div>

				<?php echo $nope?>

                <input type="submit" value="Voeg toe">
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if (Input::exists()) {
						$validate = new Validate();
						$validation = $validate->check($_POST,[
							'email' => array( 'required' => true, 'unique' =>'users' ),
						]);
						if ($validation->passed()) {
							$hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);

							Database::getInstance()->insert(
								'users',
								[
									'first_name'  =>  Input::get('first_name'),
									'last_name'  =>  Input::get('last_name'),
									'email'  =>  Input::get('email'),
									'hash'      =>  $hashed_password,
								]);
						} else {
							$errors = print_r($validation->errors());
						}
					}
				}
				?>
            </form>

            <br>
        </div>
    </div>
</div>