<?php
$errors = '';
$status = "";
$id = Session::get(Config::get('session/session_name'));
$room = isset($_GET["room"]) ? $_GET["room"] : '';
$rm = $room;

$room_id = Database::getInstance()->query(
    "SELECT DISTINCT client_id FROM chat WHERE room = $room");
foreach ($room_id->results() as $room_id) {
    $client_id = $room_id->client_id;
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
                'client_id' => $room_id->client_id,
                'msg' => "HAP: " .Input::get('msg'),
                'time' => $time,
                'room' => $rm,
            ]);
    }
}

?>
    <div class="md-4">
        <h1 class="text-center">Room <?php echo $room ?></h1>
        <hr>
        <form class="mx-auto" style="width: 500px;" action="" method="post">
            <div>
                <iframe src="user-hap.php?room=<?php echo $room?>" width="500px">
                    <p>Your browser does not support iframes.</p>
                </iframe>
            </div>
            <div class="form-group">
                <input type="textarea" class="form-control" name="msg" id="msg" placeholder="Bericht" autocomplete="off" required>
            </div>
            <input class="btn btn-brand btn-block " type="submit" value="Verstuur">
        </form>
    </div>
<div class="md-6">
    <h1 class="text-center">Clienten informatie</h1>
</div>
<?php
$clients = Database::getInstance()->get(
    'clients',
    [
        'id', '=', $client_id
    ]);
foreach ($clients->results() as $client) {
?>
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
<?php
    }
?>
