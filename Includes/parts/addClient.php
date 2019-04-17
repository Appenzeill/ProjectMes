<?php
$errors = '';
$status = "";


?>

<?php
if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST,[
        'username' => array( 'required' => true, 'unique' =>'users' ),
        'first_name' => array( 'required' => true),
        'last_name' => array( 'required' => true),
        'email' => array( 'required' => true, 'unique' =>'email'),

        'biological_gender' => array( 'required' => true),
        'bloodtype' => array( 'required' => true),
        'date_of_birth' => array( 'required' => true),
        'adress' => array( 'required' => true),
        'city' => array( 'required' => true),
        'postal_code' => array( 'required' => true),
        'mobile_number' => array( 'required' => true, 'unique' =>'users','min' => 6),
        'insurance' => array( 'required' => true),
        'parctitioner' => array( 'required' => true),
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
                'role' => "client",
                'hash'      =>  $hashed_password,
            ]);
	    Database::getInstance()->create(
		    'user_data',
		    [
			    'biological_gender'  => Input::get('gender'),
			    'bloodtype'  =>  Input::get('bloedgroep'),
			    'date_of_birth'  =>  Input::get('geboortedatum'),
			    'adress'  =>  Input::get('adres'),
			    'city'  =>  Input::get('woonplaats'),
			    'postal_code' => Input::get('postcode'),
			    'mobile_number' => Input::get('telefoon'),
			    'insurance' => Input::get('zorgverzekering'),
			    'practitioner' => Input::get('huisarts'),
            ]);
          $status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Nieuwe gebruiker toegevoegd!!
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                          <span aria-hidden=\"true\">&times;</span>
                       </button>
                      </div>
                      ";
    } else {
        echo "Niet alle velden zijn ingevuld";
        $errors = print_r($validation->errors());
    }
}
?>

<?php echo $status; ?>
<div class="jumbotron bg-dark text-white m-4 p-5">
  <h1 class="display-3 text-center">Registreer client</h1>
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




      <h1 class="display-3 text-center pt-5">Gegevens client</h1>
      <hr class="bg-secondary">
  <div class="form-group">
      <label for="username">Gender</label> <br>
      <select name="gender" id="">
          <option value="man">Man</option>
          <option value="vrouw">Vrouw</option>
          <option value="overig">Overig</option>
      </select>
  </div>
  <div class="form-group">
      <label for="username">Bloedgroep</label> <br>
      <select name="bloedgroep" id="">
          <option value="man">O</option>
          <option value="vrouw">O+</option>
          <option value="overig">O-</option>
      </select>
  </div>
  <div class="form-group">
      <label for="password">Geboortedatum</label>
      <input type="date" class="form-control" name="geboortedatum" id="geboortedatum" required>
  </div>
  <div class="form-group">
      <label for="first_name">Adres</label>
      <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" required>
  </div>
  <div class="form-group">
      <label for="first_name">Woonplaats</label>
      <input type="text" class="form-control" name="woonplaats" id="woonplaats" placeholder="Woonplaats" required>
  </div>
  <div class="form-group">
      <label for="first_name">Postcode</label>
      <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Postcode" required>
  </div>
  <div class="form-group">
      <label for="first_name">Telefoon</label>
      <input type="tel" class="form-control" name="telefoon" id="telefoon" placeholder="telefoon" required>
  </div>
  <div class="form-group">
      <label for="first_name">Zorgverzekering</label> <br>
      <select name="zorgverzekering" id="">
          <option value="zorgverzekering0">HIER KOMEN DE ZORGVERZEKERING</option>
          <option value="zorgverzekering1">HIER KOMEN DE ZORGVERZEKERING</option>
      </select>
  </div>
  <div class="form-group">
      <label for="first_name">Huisarts</label> <br>
      <select name="huisarts" id="">
          <option value="huisarts0">HIER KOMEN DE HUISARTSEN</option>
          <option value="huisarts1">HIER KOMEN DE HUISARTSEN</option>
      </select>
  </div>
      <input class="btn btn-brand btn-block " type="submit" value="Register">
  </form>
</div>


<!---->
<!---->
<!---->
<!---->
<!--<div class="col-md-10 content">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-heading">-->
<!--            Registreer gebruiker-->
<!--        </div>-->
<!--        <div class="panel-body">-->
<!---->
<!--<form action="" method="post">-->
<!--	<div class="field">-->
<!--		<label for="username">Gebruikersnaam</label>-->
<!--		<input type="text" name="username" id="username" placeholder="Gebruikersnaam" autocomplete="off">-->
<!--	</div>-->
<!--	<div class="field">-->
<!--		<label for="password">Wachtwoord</label>-->
<!--		<input type="password" name="password" id="password" placeholder="Wachtwoord">-->
<!--	</div>-->
<!--    <div class="field">-->
<!--        <label for="first_name">Voornaam</label>-->
<!--        <input type="text" name="first_name" id="first_name" placeholder="Voornaam">-->
<!--    </div>-->
<!--    <div class="field">-->
<!--        <label for="first_name">Achternaam</label>-->
<!--        <input type="text" name="last_name" id="last_name" placeholder="Achternaam">-->
<!--    </div>-->
<!--    <div class="field">-->
<!--        <label for="first_name">Email</label>-->
<!--        <input type="email" name="email" id="email" placeholder="voorbeeld@gmail.com">-->
<!--    </div>-->
<!---->
<!---->
<!--    <input type="hidden" name="token" value="--><?php //echo token::generate();?><!--">-->
<!--	<input type="submit" value="Register">-->
<!---->
<!--</form>-->
<!--	        -->
<!--            <br>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
