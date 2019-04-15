<?php
/**
 * Created by PhpStorm.
 * User: thega
 * Date: 3-4-2019
 * Time: 10:58
 */

$id = Session::get(Config::get('session/session_name'));

$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $id
	]);

foreach ($user->results() as $user) {
//	Zocht dat je met $user-> dingen kan ophalen
}
$error = "";
?>


<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Account gegevens
        </div>
        <div class="panel-body">


<form action="" method="post">
	<div class="field">
		<label for="username">Gebruikersnaam</label>
		<input type="text" name="username" id="username" value="<?php echo $user->username?>" autocomplete="off">
	</div>
	<div class="field">
		<label for="password">Nieuw wachtwoord</label>
		<input type="password" name="password" id="password" placeholder="Nieuw wachtwoord">
	</div>
	<div class="field">
		<label for="password">Herhaal nieuw wachtwoord</label>
		<input type="password" name="password_check" id="password_check" placeholder="Nieuw wachtwoord">
	</div>
    <div class="field">
        <label for="first_name">Voornaam</label>
        <input type="text" name="first_name" id="first_name" value="<?php echo $user->first_name?>">
    </div>
    <div class="field">
        <label for="first_name">Achternaam</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $user->last_name?>">
    </div>
    <div class="field">
        <label for="first_name">Email</label>
	    <?php
	    echo $user->email;
	    ?>
    </div>



    <input type="hidden" name="token" value="<?php echo token::generate();?>">
	<input type="submit" value="Update">

</form>
	        <?php
	        if (Input::exists()) {
		        $validate = new Validate();
		        $validation = $validate->check($_POST,[
			        'username' => array( 'required' => true, 'min' => 2 ),
			        'first_name' => array( 'required' => true, 'min' => 2 ),
			        'last_name' => array( 'required' => true, 'min' => 2 ),
			        'password' => array( 'required' => true, 'min' => 1 ),
			        'password_check' => array( 'required' => true, 'min' => 1 ),
		        ]);
		        if (Input::get("password") != Input::get("password_check")){
			        echo $error = "De wachtwoorden komen niet overeen!!";
		        } else {
			        $hashed_password = password_hash( Input::get( 'password' ), PASSWORD_DEFAULT );
			        if ( $validation->passed() ) {
				        Database::getInstance()->update(
					        'users', $id,
					        [
						        'username'   => Input::get( 'username' ),
						        'first_name' => Input::get( 'first_name' ),
						        'last_name'  => Input::get( 'last_name' ),
						        'hash'       => $hashed_password,
					        ] );
				        echo "Update geslaagd!!";
			        } else {
				        $errors = print_r( $validation->errors() );
			        }
		        }
	        }
	        ?>
            <br>
        </div>
    </div>
</div>
</div>