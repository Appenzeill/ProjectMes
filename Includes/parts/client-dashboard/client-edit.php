<?php
$errors = '';
$nope = "";
foreach ($user->results() as $user) {
}
   if( $_GET["client_edit"] || $_GET["age"] ) {
      $user_id = $_GET['client_edit'];
   }
$clients = Database::getInstance()->get(
	'clients',
	[
		'id', '=', $user_id
	]);
foreach ($clients->results() as $client) {
	$firstname_filler       =   $client->first_name;
	$infix_filer            =   $client->infix;
	$lastname_filler        =   $client->last_name;
	$email_filler           =   $client->email;
	$adress_filler          =   $client->adress;
	$city_filler            =   $client->city;
	$postal_code_filler     =   $client->postal_code;
	$gender_filler          =   $client->biological_gender;
	$bloodtype_filler       =   $client->bloodtype;
	$bsn_filler             =   $client->bsn_number;
	$polis_number_filler    =   $client->polis_number;
	$birth_day_filler       =   $client->date_of_birth;
	$phone_filler           =   $client->mobile_number;
	$insurance_filler       =   $client->insurance;
	$huisarts_filler        =   $client->huisarts;
}

if (Input::exists()) {
	$firstname_filler       =   Input::get('first_name');
	$infix_filer            =   Input::get('infix');
	$lastname_filler        =   Input::get('last_name');
	$email_filler           =   Input::get('email');
	$adress_filler          =   Input::get('adress');
	$city_filler            =   Input::get('city');
	$postal_code_filler     =   Input::get('postal_code');
	$gender_filler          =   Input::get('gender');
	$bloodtype_filler       =   Input::get('bloodtype');
	$bsn_filler             =   Input::get('bsn_number');
	$polis_number_filler    =   Input::get('polis_number');
	$birth_day_filler       =   Input::get('date_of_birth');
	$phone_filler           =   Input::get('mobile_number');
	$insurance_filler       =   Input::get('insurance');
	$huisarts_filler        =   Input::get('huisarts');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (Input::exists()) {
		$validate = new Validate();
		$validation = $validate->check($_POST,[
			'first_name' => array( 'required' => true, 'min' =>'1' ),
			'last_name' => array( 'required' => true, 'min' =>'1' ),
			'adress' => array( 'required' => true, 'min' =>'1' ),
			'city' => array( 'required' => true, 'min' =>'1' ),
			'postal_code' => array( 'required' => true, 'min' =>'1' ),
			'mobile_number' => array( 'required' => true, 'min' =>'1' ),
			'bsn_number' => array( 'required' => true, 'min' =>'1' ),
			'polis_number' => array( 'required' => true, 'min' =>'1' ),
		]);
		if ($validation->passed()) {
			$hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);
			print_r(Database::getInstance()->update(
				'clients',$user_id,
				[
					'first_name'        =>  Input::get('first_name'),
					'infix'             =>  Input::get('infix'),
					'last_name'         =>  Input::get('last_name'),
					'email'             =>  Input::get('email'),
					'hash'              =>  $hashed_password,
					'biological_gender' =>  Input::get('gender'),
					'date_of_birth'     =>  Input::get('date_of_birth'),
					'adress'            =>  Input::get('adress'),
					'city'              =>  Input::get('city'),
					'postal_code'       =>  Input::get('postal_code'),
					'mobile_number'     =>  Input::get('mobile_number'),
					'bloodtype'         =>  Input::get('bloodtype'),
					'bsn_number'        =>  Input::get('bsn_number'),
					'polis_number'      =>  Input::get('polis_number'),
					'insurance'         =>  Input::get('insurance')
				]));
		} else


		{
			foreach ($validation->errors() as $error) {
				$errors .= "<br>{$error}";

			}
		}
	}
}
?>

<div class="col-md-4">
	<form action="" method="post">
		<h1 class="display-5 text-center pt-5">Basis gegevens</h1>
		<hr class="bg-secondary">

		<div class="form-group">
			<label for="first_name">Voornaam</label>
			<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Voornaam" required="required" value="<?php echo $firstname_filler?>">
		</div>
		<div class="form-group">
			<label for="first_name">Tussenvoegsel</label>
			<input type="text" class="form-control" name="infix" id="infix"placeholder="Tussenvoegsel" value="<?php echo $infix_filer?>">
		</div>
		<div class="form-group">
			<label for="first_name">Achternaam</label>
			<input type="text" class="form-control"name="last_name" id="last_name" placeholder="Achternaam" required="required" value="<?php echo $lastname_filler?>">
		</div>
		<div class="form-group">
			<label for="password">Wachtwoord</label>
			<input type="password" class="form-control" name="password" id="password" value="" required="required" placeholder="Wachtwoord">
		</div>
		<?php echo $errors?>
		<br>
		<?php
		/*echo "<br>".Input::get('first_name');
		echo "<br>".Input::get('infix');
		echo "<br>".Input::get('last_name');
		echo "<br>".Input::get('email');
		echo "<br>".Input::get('adress');
		echo "<br>".Input::get('city');
		echo "<br>".Input::get('postal_code');
		echo "<br>".Input::get('gender');
		echo "<br>".Input::get('bloodtype');
		echo "<br>".Input::get('bsn_number');
		echo "<br>".Input::get('polis_number');
		echo "<br>".Input::get('date_of_birth');
		echo "<br>".Input::get('mobile_number');
		echo "<br>".Input::get('insurance');
		echo "<br>".Input::get('huisarts');*/
		?>
</div>
<div class="col-md-4" >
	<h1 class="display-5 text-center pt-5">Contact gegevens</h1>
	<hr class="bg-secondary">
	<div class="form-group">
		<label for="first_name">Email</label>
		<input type="email" class="form-control" name="email" id="email" placeholder="voorbeeld@email.com" required="required" value="<?php echo $email_filler?>">
	</div>
	<div class="form-group">
		<label for="adress">Adres</label>
		<input type="text" class="form-control" name="adress" id="adress" placeholder="Adres" value="<?php echo $adress_filler?>" required>
	</div>
	<div class="form-group">
		<label for="first_name">Woonplaats</label>
		<input type="text" class="form-control" name="city" id="city" placeholder="Woonplaats" value="<?php echo $city_filler?>" required>
	</div>
	<div class="form-group">
		<label for="first_name">Postcode</label>
		<input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postcode" pattern="[1-9][0-9]{3}\s?[a-zA-Z]{2}" value="<?php echo $postal_code_filler?>" required>
	</div>
</div>

<div class="col-md-4">
	<h1 class="display-5 text-center pt-5">Overige gegevens</h1>
	<hr class="bg-secondary">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<label class="input-group-text" for="gender">Geslacht</label>
		</div>
		<select class="custom-select" id="gender" name="gender">
			<option value="Man" <?php if ($gender_filler == "Man") {echo "selected";}?>> Man</option>
			<option value="Vrouw" <?php if ($gender_filler == "Vrouw") {echo "selected";}?> >Vrouw</option>
			<option value="Overig" <?php if ($gender_filler == "Overig") {echo "selected";}?>>Overig</option>
		</select>
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<label class="input-group-text" for="bloedgroep">Bloedgroep</label>
		</div>
		<select class="custom-select" name="bloodtype" id="bloodtype">
			<option value="A+"   <?php if ($bloodtype_filler == "A+") {echo "selected";}?> >A+</option>
			<option value="A-"   <?php if ($bloodtype_filler == "A-") {echo "selected";}?> >A-</option>
			<option value="B+"   <?php if ($bloodtype_filler == "B+") {echo "selected";}?> >B+</option>
			<option value="B-"   <?php if ($bloodtype_filler == "B-") {echo "selected";}?> >B-</option>
			<option  value="AB+" <?php if ($bloodtype_filler == "AB+") {echo "selected";}?>>AB+</option>
			<option  value="AB-" <?php if ($bloodtype_filler == "AB-") {echo "selected";}?>>AB-</option>
			<option value="O+"   <?php if ($bloodtype_filler == "O+") {echo "selected";}?> >O+</option>
			<option value="O-"   <?php if ($bloodtype_filler == "O-") {echo "selected";}?> >O-</option>
		</select>
	</div>

	<div class="form-group">
		<label for="bsn_number">BSN</label>
		<input type="text" class="form-control" name="bsn_number" id="bsn_number" placeholder="BSN"  value="<?php echo $bsn_filler?>" required>
	</div>
	<div class="form-group">
		<label for="polis_number">Polis nummer</label>
		<input type="text" class="form-control" name="polis_number" id="polis_number" placeholder="Polis nummer" value="<?php echo $polis_number_filler?>" required>
	</div>
	<div class="form-group">
		<label for="password">Geboortedatum</label>
		<input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="<?php echo $birth_day_filler?>" required>
	</div>
	<div class="form-group">
		<label for="first_name">Telefoon</label>
		<input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Telefoon"  value="<?php echo $phone_filler?>" required>
	</div>

	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<label class="input-group-text" for="insurance">Zorgverzekering</label>
		</div>
		<select name="insurance" class="custom-select" id="insurance">
			<option selected>Kies...</option>
			<?php
			$insurance = Database::getInstance()->query(
				"SELECT DISTINCT insurance FROM insurance");
			foreach ($insurance->results() as $i) {
				echo "<option value='$i->insurance' ";
				echo "> " . $i->insurance . "</option>";
			}
			?>
		</select>
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<label class="input-group-text" for="huisarts">Huisarts</label>
		</div>
		<select name="huisarts" class="custom-select" id="huisarts">
			<option selected>Kies...</option>
			<?php
			$practitioner = Database::getInstance()->query(
				"SELECT DISTINCT practitioner FROM practitioner");
			foreach ($practitioner->results() as $p) {
				echo "<option value='$p->practitioner' ";
				echo "> " . $p->practitioner . "</option>";
			}
			?>
		</select>
	</div>
</div>
<div class="col-md-12">
	<input type="submit" class="btn btn-primary" value="Voeg toe">
	</form>
</div>

<div class="col-md-6" >
	<h1 class="display-5 text-center pt-5">Allergiëen</h1>
	<hr class="bg-secondary">
	<form action="" method="post">
	<div class="form-group">
		<label for="first_name">Adres</label>
		<input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" required>
	</div>
		<input type="submit" class="btn btn-primary" value="Voeg toe">
	</form>
</div>
<div class="col-md-6" >
	<h1 class="display-5 text-center pt-5">Aandoeningen</h1>
	<hr class="bg-secondary">
	<form action="" method="post">
		<div class="form-group">
			<label for="first_name">Adres</label>
			<input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" required>
		</div>
		<input type="submit" class="btn btn-primary" value="Voeg toe">
	</form>
</div>
<div class="col-md-12" >
	<h1 class="display-5 text-center pt-5">Opmerkingen</h1>
	<hr class="bg-secondary">
	<div class="form-group">
		<label for="first_name">Adres</label>
		<input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" required>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
</div>
