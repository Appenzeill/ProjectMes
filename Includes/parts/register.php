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
            Pas persoonlijke gegevens aan.
        </div>
        <div class="panel-body">

            <form action="" method="post">
                <div class="field">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" id="username" value="<?php echo $username_filler?>" autocomplete="off">
                </div>
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

                <input type="hidden" name="token" value="<?php echo token::generate();?>">
                <input type="submit" value="Voeg toe">
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if (Input::exists()) {
						$validate = new Validate();
						$validation = $validate->check($_POST,[
							'email' => array( 'required' => true, 'unique' =>'users' ),
							'username' => array( 'required' => true, 'unique' =>'users','min' => 2 ),
						]);
						if ($validation->passed()) {
							$hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);

							Database::getInstance()->insert(
								'users',
								[
									'username'  => Input::get('username'),
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
            Pas persoonlijke gegevens aan.
        </div>
        <div class="panel-body">

            <form action="" method="post">
                <div class="field">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="username" id="username" value="<?php echo $username_filler?>" autocomplete="off">
                </div>
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

                <input type="hidden" name="token" value="<?php echo token::generate();?>">
                <input type="submit" value="Voeg toe">
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					if (Input::exists()) {
						$validate = new Validate();
						$validation = $validate->check($_POST,[
							'email' => array( 'required' => true, 'unique' =>'users' ),
							'username' => array( 'required' => true, 'unique' =>'users','min' => 2 ),
						]);
						if ($validation->passed()) {
							$hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);

							Database::getInstance()->insert(
								'users',
								[
									'username'  => Input::get('username'),
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
