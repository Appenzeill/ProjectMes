<?php
$errors = '';



?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Registreer gebruiker
        </div>
        <div class="panel-body">


<form action="" method="post">
	<div class="field">
		<label for="username">Gebruikersnaam</label>
		<input type="text" name="username" id="username" value="<?php echo Input::get('username')?>" autocomplete="off">
	</div>
	<div class="field">
		<label for="password">Kies een wachtwoord</label>
		<input type="password" name="password" id="password" value="<?php echo Input::get('password')?>">
	</div>
    <div class="field">
        <label for="first_name">Voornaam</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo Input::get('first_name')?>">
    </div>
    <div class="field">
        <label for="first_name">Achternaam</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo Input::get('last_name')?>">
    </div>
    <div class="field">
        <label for="first_name">Email</label>
        <input type="email" name="email" id="email" value="<?php echo Input::get('email')?>">
    </div>


    <input type="hidden" name="token" value="<?php echo token::generate();?>">
	<input type="submit" value="Register">

</form>
	        <?php
	        if (Input::exists()) {
		        $validate = new Validate();
		        $validation = $validate->check($_POST,[
			        'email' => array( 'required' => true, 'unique' =>'users' ),
			        'username' => array( 'required' => true, 'unique' =>'users','min' => 2 ),
		        ]);
		        $hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);

		        if ($validation->passed()) {
			        Database::getInstance()->create(
				        'users',
				        [
					        'username'  => Input::get('username'),
					        'password'  =>  Input::get('password'),
					        'first_name'  =>  Input::get('first_name'),
					        'last_name'  =>  Input::get('last_name'),
					        'email'  =>  Input::get('email'),
					        'hash'      =>  $hashed_password,
				        ]);
		        } else {
			        $errors = print_r($validation->errors());
		        }
	        }
	        ?>
            <br>
        </div>
    </div>
</div>
