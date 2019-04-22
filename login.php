<?php
require_once 'Core/init.php';

$email = Input::get('email');
$password = Input::get('password');
$error = "";
$hash = "";
$user = "";
/**
 * De juiste user ophalen via email.
 */
$user = Database::getInstance()->get(
	'users',
	[
		'email', '=', $email
	]);


if (!$user->count()) {

} else {
	foreach ($user->results() as $user) {
		$hash = $user->hash;
	}
}

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {

		$validate = new Validate();
		$validation = $validate->check($_POST,[
			'email' => ['required' => true],
			'password' => ['required' => true]
		]);

		if ($validation->passed()) {
			$user = new User();
			$login = $user->login(Input::get('email'), Input::get('password'));

			$email      =   Input::get('email');
			$password   =   Input::get('password');
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			if(password_verify($password, $hash)) {
				if ($login) {
					echo "
		            <script>
		            window.location.replace(\"index.php?start_screen=\");
                    </script>
                    ";
				}
			} else {
				$error = "<p>Email of wachtwoord incorrect</p>";

			}
		}
	}
}
?>
<body>
<div class="login">
    <div class="login-screen">
        <div class="app-title">
            <h1>Login</h1>
        </div>
        <form action="" method="post">

            <div class="login-form">
                <div class="control-group">
                    <input type="email" name="email" data-validate="required email" id="login-name" placeholder="user@example.com" value="<?php echo Input::get('email')?>" />

                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    <input type="password" data-validate="required" name="password" placeholder="wachtwoord" id="login-pass" id="login-pass"/>
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>
				<?php echo $error;?>
                <input type="hidden" name="token" value="<?php echo Token::generate()?>">
                <input class="btn btn-primary btn-large btn-block" type="submit" name="submit"  value="Login" />
            </div>
    </div>
    </form>

</div>
</body>
<style>
    body {
        font-family: Arial;
        background-color: #3498DB;
    }
</style>