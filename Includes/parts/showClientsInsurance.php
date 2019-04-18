<?php
/**
 * Created by PhpStorm.
 * User: thega
 * Date: 18-4-2019
 * Time: 16:20
 */

$id = Session::get(Config::get('session/session_name'));



//$insurance = Database::getInstance()->get(
//	'user_data',
//	[
//		'insurance', '=', $insurance
//	]);
//$insurance = Database::getInstance()->query(
//	"SELECT insurance FROM insurance WHERE user_id=$id");
//foreach ($insurance->results() as $i){
//}
//
//$clients = Database::getInstance()->get(
//	'user_data',
//	[
//		'insurance', '=', $i->insurance
//	]);
//
//foreach ($clients->results() as $c) {
//	$user = Database::getInstance()->query(
//		"SELECT * FROM users WHERE id=$c->user_id");
//	foreach ($user->results() as $u){
//	}

//	echo $u->username;
//	echo $u->first_name;
//	echo $u->last_name;
//	echo $u->email;
//	echo $c->biological_gender;
//	echo $c->bloodtype;
//	echo $c->bsn;
//	echo $c->date_of_birth;
//	echo $c->adress;
//	echo $c->city;
//	echo $c->postal_code;
//	echo $c->mobile_number;
//	echo $c->insurance;
//	echo $c->practitioner;
//}





$insurance = Database::getInstance()->query(
	"SELECT insurance FROM insurance WHERE user_id=$id");
foreach ($insurance->results() as $i){
}

$clients = Database::getInstance()->get(
	'user_data',
	[
		'insurance', '=', $i->insurance
	]);
?>
<div class="jumbotron bg-dark text-white m-4 p-5">
    <h1 class="text-white text-center">Mijn clienten</h1>
    <div class="input-group col-md-4 col-sm-5 px-0 mt-4">
        <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-white border-0" id="basic-addon1"><i class="material-icons">search</i></span>
        </div>
        <input type="text" class="form-control bg-dark border-0 text search-bar" id="myInput" placeholder="Search...">
    </div>
    <table class="table table-hover table-responsive table-dark mt-4">
        <thead>
        <tr>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Bloodtype</th>
            <th>BSN</th>
            <th>Date of birth</th>
            <th>Adress</th>
            <th>City</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>Insurance</th>
            <th>Practitioner</th>
        </tr>
        </thead>
            <tbody id="myTable">
            <?php
            foreach ($clients->results() as $c) {
				$user = Database::getInstance()->query(
					"SELECT * FROM users WHERE id=$c->user_id" );
				?>
		<tr>
			<?php
				foreach ( $user->results() as $u ) {
				?>
					<td><?php echo $u->username; ?></td>
					<td><?php echo $u->first_name; ?></td>
					<td><?php echo $u->last_name; ?></td>
					<td><?php echo $u->email; ?></td>
					<td><?php echo $c->biological_gender; ?></td>
					<td><?php echo $c->bloodtype; ?></td>
					<td><?php echo $c->bsn; ?></td>
					<td><?php echo $c->date_of_birth; ?></td>
					<td><?php echo $c->adress; ?></td>
					<td><?php echo $c->city; ?></td>
					<td><?php echo $c->postal_code; ?></td>
					<td><?php echo $c->mobile_number; ?></td>
					<td><?php echo $c->insurance; ?></td>
					<td><?php echo $c->practitioner; ?></td>
					<?php
				}
				?>
            </tr>
	            <?php
            }
            ?>
            </tbody>
    </table>
</div>

