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
$insurance = Database::getInstance()->query(
	"SELECT insurance FROM insurance WHERE user_id=$id");
foreach ($insurance->results() as $i){
}

$clients = Database::getInstance()->get(
	'user_data',
	[
		'insurance', '=', $i->insurance
	]);

foreach ($clients->results() as $c) {
	$user = Database::getInstance()->query(
		"SELECT * FROM users WHERE id=$c->user_id");
	foreach ($user->results() as $u){
	}

	echo $u->username;
	echo "<br>";
	echo $u->first_name;
	echo "<br>";
	echo $u->last_name;
	echo "<br>";
	echo $u->email;
	echo "<br>";
	echo $c->biological_gender;
	echo "<br>";
	echo $c->bloodtype;
	echo "<br>";
	echo $c->bsn;
	echo "<br>";
	echo $c->date_of_birth;
	echo "<br>";
	echo $c->adress;
	echo "<br>";
	echo $c->city;
	echo "<br>";
	echo $c->postal_code;
	echo "<br>";
	echo $c->mobile_number;
	echo "<br>";
	echo $c->insurance;
	echo "<br>";
	echo $c->practitioner;
	echo "<br>";
}


