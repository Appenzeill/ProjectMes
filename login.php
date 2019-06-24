<?php
require_once 'Core/init.php';
include_once("Includes/html-parts/html/top.php");
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

<div class="wrapper">
    <form action="" method="post" class="form-signin">
        <h2 class="form-signin-heading">Login</h2>
        <input type="email" name="email" data-validate="required email" id="login-name" placeholder="user@example.com" value="<?php echo Input::get('email')?>" />

        <input type="password" data-validate="required" name="password" placeholder="wachtwoord" id="login-pass" id="login-pass"/>
	    <?php echo $error;?>
        <input type="hidden" name="token" value="<?php echo Token::generate()?>">
        <input class="btn btn-primary btn-large btn-block" type="submit" name="submit"  value="Login" />
        <a href="login-client.php">Inloggen als cliënt</a>
    </form>
</div>
</body>
<style>
    body {
        display: table;
        margin: 0 auto;
        background-color: #007bff;
    }

    .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
    }

    .form-signin {
        max-width: 380px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
        margin-bottom: 30px;
    }
    .form-signin .checkbox {
        font-weight: normal;
    }
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }


</style>


