<?php
$errors = '';
$status = '';
$user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : '';
$id = Session::get(Config::get('session/session_name'));

$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $user_id
	]);
foreach ($user->results() as $u){
}


if (Input::exists()) {
	$validate = new Validate();
	$validation = $validate->check($_POST,[
//		'disease' => array( 'required' => true,'unique' =>'disease'), //,'unique' =>'users'
	]);

	if ($validation->passed()) {
		Database::getInstance()->create(
			'description',
			[
				'user_id' => $user_id,
				'description' => Input::get('beschrijving'),
				'employee_id' => $id,
			]);
		$status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Nieuwe beschrijving toegevoegd!!
	                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                          <span aria-hidden='true'>&times;</span>
	                       </button>
	                      </div>
	                      ";
	} else {
		$status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Niet alles is ingevuld...
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                          <span aria-hidden=\"true\">&times;</span>
                       </button>
                      </div>";
//		$errors = print_r($validation->errors());
	}
}


?>



<?php echo $status; ?>
<div class="jumbotron bg-dark text-white m-4 p-5">
	<h1 class="display-3 text-center">Beschrijving toevoegen aan: <?php echo $u->first_name. " " .$u->last_name;?></h1>
	<hr class="bg-secondary w-50">
	<form class="mx-auto" style="width: 500px;" action="" method="post">

		<div class="form-group">
			<label for="username">Beschrijving</label>
            <input type="text" class="form-control" name="beschrijving" id="beschrijving" placeholder="Beschrijving" autocomplete="off" required>
        </div>
		<input class="btn btn-brand btn-block " type="submit" value="Toevoegen">
	</form>
</div>