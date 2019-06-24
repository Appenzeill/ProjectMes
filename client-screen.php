<?php
include_once("Core/init.php");
include_once("Includes/html-parts/html/top.php");
$client_id = $_GET["id"];

$aandoeningen = Database::getInstance()->get(
	'clients',
	[
		'id', '=', $client_id
	]);


?>

<?php
$clients = Database::getInstance()->get(
	'clients',
	[
		'id', '=', $client_id
	]);
foreach ($clients->results() as $client) {

    ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-5 text-center pt-5">HAP</h1>
            <hr class="bg-secondary">
            <?php
            $errors = '';
            $status = "";
            $id = Session::get(Config::get('session/session_name'));

            $check = Database::getInstance()->query(
                "SELECT DISTINCT client_id FROM chat where client_id = {$client_id}");
            if ( $check->results() != null ) {
//		echo "Er is een room gevonden voor de gebruiker";
                $room = Database::getInstance()->query(
                    "SELECT DISTINCT room FROM chat WHERE client_id = {$client_id}");
                foreach ($room->results() as $r){
                    $rm = $r->room;
                }
            } else {
//		echo "Er zijn geen rooms met deze gebruiker";
                $room = Database::getInstance()->query(
                    "SELECT MAX(room) AS max FROM chat ");
                foreach ($room->results() as $r){
                    $rm = $r->max + 1;
                }
            }

            if (Input::exists()) {
                $validate = new Validate();
                $validation = $validate->check($_POST,[
                    'msg' => array( 'required' => true),
                ]);
                $time = date("Y-m-d H:i:s");

                if ($validation->passed()) {
                    Database::getInstance()->create(
                        'chat',
                        [
                            'client_id' => $client_id,
                            'msg' => "Client: " .Input::get('msg'),
                            'time' => $time,
                            'room' => $rm,
                        ]);
                    }
                }
            ?>
            <div>
                <form class="mx-auto" style="width: 500px;" action="" method="post">
                    <div>

                        <iframe src="client-hap.php?id=<?php echo $client_id?>">
                            <p>Your browser does not support iframes.</p>
                        </iframe>
                    </div>
                    <div class="form-group">
                        <input type="textarea" class="form-control" name="msg" id="msg" placeholder="Bericht" autocomplete="off" required>
                    </div>
                    <input class="btn btn-brand btn-block " type="submit" value="Verstuur">
                </form>
            </div>

            <hr>
        </div>








        <div class="col-md-4">
            <h1 class="display-5 text-center pt-5">Basis gegevens</h1>
            <hr class="bg-secondary">
            <div class=\"form-group\">
                <label for=\"password\"><b>Naam:</b></label><br>
                <?php echo $client->first_name?>
                <?php echo $client->infix?>
                <?php echo $client->last_name?>
            </div>
            <hr>
            <div class=\"form-group\">
                <label for=\"password\"><b>Email:</b></label><br>
                <?php echo $client->email?>
            </div>
            <hr>
            <div class=\"form-group\">
                <label for=\"password\"><b>Geboortedatum:</b></label><br>
                <?php echo $client->date_of_birth?>
            </div>
            <hr>
            <div class=\"form-group\">
                <label for=\"password\"><b>Geslacht:</b></label><br>
                <?php echo $client->biological_gender?>
            </div>
        </div>

        <div class="col-md-4">
            <h1 class="display-5 text-center pt-5">Basis gegevens</h1>
            <hr class="bg-secondary">
            <div class=\"form-group\">
            <label for=\"password\"><b>Naam:</b></label><br>
            <?php echo $client->first_name?>
            <?php echo $client->infix?>
            <?php echo $client->last_name?>
        </div>
        <hr>
        <div class=\"form-group\">
        <label for=\"password\"><b>Email:</b></label><br>
	        <?php echo $client->email?>
    </div>
    <hr>
    <div class=\"form-group\">
    <label for=\"password\"><b>Geboortedatum:</b></label><br>
	    <?php echo $client->date_of_birth?>

    </div>
    <hr>
    <div class=\"form-group\">
    <label for=\"password\"><b>Geslacht:</b></label><br>
	    <?php echo $client->biological_gender?>
    </div>
        </div>
        <div class="col-md-4">
            <h1 class="display-5 text-center pt-5">Basis gegevens</h1>
            <hr class="bg-secondary">
            <table class="table">
                <thead>
                <tr>
                    <th>Adress</th>
                    <th>Woonplaats</th>
                    <th>Postcode</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $client->adress;?></td>
                    <td><?php echo $client->city;?></td>
                    <td><?php echo $client->postal_code;?></td>
                </tr>
                <tr>
                </tbody>
            </table>
            <div class=\"form-group\">
                <label for=\"password\"><b>Telefoon nummer:</b></label><br>
		        <?php echo $client->mobile_number?>
            </div>
            <hr>
            <div class=\"form-group\">
                <label for=\"password\"><b>Bloedwaarde:</b></label><br>
		        <?php echo $client->bloodtype?>
            </div>
            <hr>
            <div class=\"form-group\">
                <label for=\"password\"><b>Huisarts:</b></label><br>
                <?php
                 $huisarts_id = $client->huisarts;

                $huisarts = Database::getInstance()->get(
	                'users',
	                [
		                'id', '=', $huisarts_id
	                ]);
                foreach ($huisarts->results() as $huisart) {
                        echo $huisart->first_name." ".$huisart->infix." ".$huisart->last_name;
                }
                ?>
            </div>
            <div class=\"form-group\">
                <label for=\"password\"><b>Verzekering:</b></label><br>
		        <?php
		        echo $verzekerings_id = $client->insurance;
/*
		        $verzekeringen = Database::getInstance()->get(
			        'verzekering',
			        [
				        'id', '=', $huisarts_id
			        ]);*/
		      /*  foreach ($verzekeringen->results() as $verzekering) {
			        echo $verzekering->first_name;
		        }*/
		        ?>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>BSN nummer</th>
                    <th>Polis nummer</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $client->bsn_number;?></td>
                    <td><?php echo $client->polis_number;?></td>
                </tr>
                <tr>
                </tbody>
            </table>
            <hr>
        </div>

    </div>
        <div class="row">
            <div class="col-md-12">
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
INNER JOIN client_condition_list ON client_condition_list.condition_id=client_conditions.id WHERE client_id = '.$client->id);
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
    </div>
<?php
}
include_once("Includes/html-parts/html/bottom.php");
?>

