<?php
require_once 'Core/init.php';

$email = Input::get('email');
$password = Input::get('password');
$error = "";
$hash = "";
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
					if ($user) {
                    echo "
		            <script>
		            window.location.replace(\"index.php?get_users=\");
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
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <img class="mx-auto d-block mb-4" style="height: 100px;" src="images/trusted-p.svg" alt="">
          <h1 class="text-center font-weight-bold">Trusted</h1>
          <hr class="my-4">
          <form class="form-signin" action="" method="post">
            <div class="form-label-group">
              <input type="email" class="form-control" name="email" data-validate="required email" id="login-name" placeholder="user@example.com" value="<?php echo Input::get('email')?>" />
              <label for="login-name">Email address</label>
            </div>

              <div class="form-label-group">
                <input type="password" class="form-control" data-validate="required" name="password" placeholder="wachtwoord" id="login-pass"/>
                <label for="login-pass">Password</label>
              </div>
            <hr class="my-4">
            <?php echo $error;?>
            <input type="hidden" name="token" value="<?php echo Token::generate()?>">
            <input style="background-color: #4c0e57" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Login">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>