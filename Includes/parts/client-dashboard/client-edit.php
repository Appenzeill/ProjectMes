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
	$verzekering_filler     =   $client->insurance;
	$huisarts_filler        =   $client->huisarts;
	$opmerking_filler       =   $client->information;
}

if (Input::get('first_name')) {
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
	$verzekering_filler     =   Input::get('verzekering');
	$condition              =   Input::get('condition');
}

	if (Input::get('first_name')) {
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
			print_r(Database::getInstance()->update(
				'clients',$user_id,
				[
					'first_name'        =>  Input::get('first_name'),
					'infix'             =>  Input::get('infix'),
					'last_name'         =>  Input::get('last_name'),
					'email'             =>  Input::get('email'),
					'biological_gender' =>  Input::get('gender'),
					'date_of_birth'     =>  Input::get('date_of_birth'),
					'adress'            =>  Input::get('adress'),
					'city'              =>  Input::get('city'),
					'postal_code'       =>  Input::get('postal_code'),
					'mobile_number'     =>  Input::get('mobile_number'),
					'bloodtype'         =>  Input::get('bloodtype'),
					'bsn_number'        =>  Input::get('bsn_number'),
					'polis_number'      =>  Input::get('polis_number'),
					'insurance'         =>  Input::get('verzekering'),
					'huisarts'          =>  Input::get('huisarts')
				]));
		} else


		{
			foreach ($validation->errors() as $error) {
				$errors .= "<br>{$error}";

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
			<label class="input-group-text" for="verzekering">Zorgverzekering</label>
		</div>
        <select name="verzekering" class="custom-select" id="huisarts">
			<?php
			$verzekeringen = Database::getInstance()->get(
				'insurance',
				[
					'id', '>=', 1
				]);
			foreach ($verzekeringen->results() as $verzekering) {
				echo "<option value='$verzekering->id' "; if ($verzekering_filler == $verzekering->id)  {echo "selected='selected'";};
				echo ">".$verzekering->insurance_name ."</option>";
			}
			?>
        </select>
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<label class="input-group-text" for="huisarts">Huisarts</label>
		</div>
		<select name="huisarts" class="custom-select" id="huisarts">
			<?php
			$huisartsen = Database::getInstance()->get(
				'users',
				[
					'role_id', '>=', 2
				]);
			foreach ($huisartsen->results() as $huisarts) {
				echo "<option value='$huisarts->id' "; if ($huisarts_filler == $huisarts->id)  {echo "selected='selected'";};
				echo "> ".$huisarts->first_name ." ".$huisarts->infix." ".$huisarts->last_name. "</option>";
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
	<h1 class="display-5 text-center pt-5">Aandoeningen</h1>
	<hr class="bg-secondary">
	<div class="row">
		<div class="col-md-12" >
<?php
$conditions = Database::getInstance()->get(
	'client_conditions',
	[
		'id', '>=', 1
	]);
?>
            <form action="" method="post">
            <div class="form-group">
                Voeg aandoening toe:<br>
                    <select name="condition">
						<?php
						foreach ($conditions->results() as $condition) {
							echo "<option class=\"form-control\" value='$condition->id' "; echo "> ".$condition->condition_name."</option>";
						}
						?>
                    </select>
				</div>
				<input type="submit" class="btn btn-primary" value="Voeg toe">
                <?php
                if (Input::get('condition')) {
			Database::getInstance()->insert(
				'client_condition_list',
				[
					'condition_id'  =>  Input::get('condition'),
					'client_id'  =>  $user_id,
				]);
}
                ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12" >
            <table class="table">
                <thead>
                <tr>
                    <th>Aandoening naam:</th>
                    <th>Aandoening beschrijving:</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <script>
                    $(document).ready(function(){
                        $("#myInput").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
                <br>
                <input id="myInput" type="text" placeholder="Search..">
                <br><br>
				<?php
				$aandoeningen = Database::getInstance()->query(
					'SELECT client_condition_list.client_id, client_condition_list.condition_id, client_conditions.id,client_conditions.condition_name, client_conditions.condition_description
FROM client_conditions 
INNER JOIN client_condition_list ON client_condition_list.condition_id=client_conditions.id WHERE client_id = '.$user_id);
				foreach ($aandoeningen->results() as $aandoening) {
					?>
                    <tr>
                        <td><?php echo $aandoening->condition_name; ?></td>
                        <td><?php echo $aandoening->condition_description; ?></td>
                    </tr>
					<?php
				}
				?>
                </tbody>
            </table>
		</div>
	</div>
    </form>
</div>
<div class="col-md-6" >
	<h1 class="display-5 text-center pt-5">Opmerkingen / beschrijving</h1>
	<hr class="bg-secondary">
	<form action="" method="post">
		<div class="form-group">
			<label for="first_name">Opmerking</label>
			<input type="text" class="form-control" name="opmerking" id="opmerking" placeholder="Opmerking over cliënt" value="<?php echo $opmerking_filler?>" required>
		</div>
		<input type="submit" class="btn btn-primary" value="Voeg toe">
        <?php
        $opmerkingen = Database::getInstance()->get(
	        'clients',
	        [
		        'id', '=', $user_id
	        ]);
        foreach ($opmerkingen->results() as $opmerking) {
	        $opmerking_filler       =   $opmerking->information;
        }
        if (Input::get('opmerking')) {
	        $opmerking_filler = Input::get( 'opmerking' );
	        Database::getInstance()->update(
		        'clients',$user_id,
		        [
			        'information'        =>  Input::get('opmerking'),
		        ]);
        }
        ?>
	</form>
</div>
<div class="col-md-6" >
    <h1 class="display-5 text-center pt-5">Aandoeningen</h1>
    <hr class="bg-secondary">
    <div class="row">
        <div class="col-md-12" >
			<?php
			$medications = Database::getInstance()->get(
				'medicine',
				[
					'id', '>=', 1
				]);
			?>
            <form action="" method="post">
                <div class="form-group">
                    Voeg medicijn toe:<br>
                    <select name="medicine">
						<?php
						foreach ($medications->results() as $medication) {
							echo "<option class=\"form-control\" value='$medication->id' "; echo "> ".$medication->medicine_name."</option>";
						}
						?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Voeg toe">
				<?php
				if (Input::get('medicine')) {
				    echo "medicine input";
					Database::getInstance()->insert(
						'medicine_list',
						[
							'medicine_id'  =>  Input::get('medicine'),
							'medicine_user_id'  =>  $user_id
						]);
				}
				?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" >
            <table class="table">
                <thead>
                <tr>
                    <th>Medicijn opgehaald:</th>
                    <th>Medicijn naam:</th>
                    <th>Medicijn beschrijving:</th>
                </tr>
                </thead>
                <tbody id="myTable">
                <script>
                    $(document).ready(function(){
                        $("#myInput").on("keyup", function() {
                            var value = $(this).val().toLowerCase();
                            $("#myTable tr").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
                <br>
                <input id="myInput" type="text" placeholder="Search..">
                <br><br>
                </form>

                <?php
				$medicijnen = Database::getInstance()->query(
					'SELECT medicine_list.medicine_user_id, medicine_list.medicine_id,medicine.medicine_name, medicine.medicine_description FROM medicine INNER JOIN medicine_list ON medicine_list.medicine_id=medicine.id WHERE medicine_user_id = '.$user_id);
				foreach ($medicijnen->results() as $medicijn) {
					?>
                    <tr>

                        <td><form action = "medication_delete" method = "GET">
                                <input type="hidden" name="id" value="<?php echo $user_id?>">
                                <input type="hidden" name="medicine_id" value="<?php echo $medicijn->medicine_id?>">
                                <input type="submit" value="Medicijn is opgehaald">
                            </form>
                        </td>
                        <td><?php echo $medicijn->medicine_name; ?></td>
                        <td><?php echo $medicijn->medicine_description; ?></td>
                    </tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
    <?php

    ?>
</div>

