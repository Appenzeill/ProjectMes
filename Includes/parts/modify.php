<?php
$errors = '';
$id = Session::get(Config::get('session/session_name'));
$nope = "";

$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $id
	]);
foreach ($user->results() as $user) {
}
if (Input::get('username') || Input::get('password') || Input::get('first_name') || Input::get('last_name') || Input::get('email') || Input::get('password')) {
	$username_filler    = Input::get('username');
	$firstname_filler   = Input::get('first_name');
	$lastname_filler    = Input::get('last_name');
	$email_filler       = Input::get('email');
} else {
	$username_filler    = $user->username;
	$firstname_filler   = $user->first_name;
	$lastname_filler    = $user->last_name;
	$email_filler       = $user->email;
}

$id = Session::get(Config::get('session/session_name'));
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);

			Database::getInstance()->update(
			'users',$id,
			[
				'username'      =>  Input::get('username'),
				'first_name'    =>  Input::get('first_name'),
				'last_name'     =>  Input::get('last_name'),
				'email'         =>  Input::get('email'),
				'hash'          =>  $hashed_password
			]);
	} else {
			$nope = "nope";
}



?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB;     color: white;">
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
		<input type="password" name="password" id="password" value="" placeholder="Nieuw wachtwoord">
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
	<input type="submit" value="Pas aan">
</form>

            <br>
        </div>
    </div>
</div>
<script>
    onsubmit="setTimeout(function () { window.location.reload(); }, 1)"
</script>