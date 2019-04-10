<?php
$errors = '';
$nope = "";
foreach ($user->results() as $user) {
}
$username_filler    = "";
$firstname_filler   = "";
if (Input::exists()) {
	$username_filler    = Input::get('username');
	$firstname_filler   = Input::get('first_name');
}
$id = Session::get(Config::get('session/session_name'));

$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $id
	]);


foreach ($user->results() as $user) {
	$data1 = "Voeg een rol toe aan of pas de rol van ".$user->first_name." ".$user->last_name.".<br>";
}

?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB; color: white;">
            Voeg rol toevoegen aan gebruiker.
        </div>
        <div class="panel-body">
            <?php echo $data1; ?>

            <form action="" method="post">
                <br>
	            <?php
	            $query = Database::getInstance()->query(
		            "
SELECT DISTINCT user_roles.id, user_permission_lists.user_permission_list_id, user_roles.user_role_name 
FROM user_roles 
INNER JOIN user_permission_lists ON user_roles.id=user_permission_lists.user_permission_list_id
                          ");

	            if (!$query->count()) {
		            echo "Geen gebruiker";
	            } else {

	            ?>
                <select name="test">
		            <?php
		            foreach ($query->results() as $query) {
			            echo "<option     value='$query->user_permission_list_id'>" .$query->user_permission_list_id." | ".$query->user_role_name."</option>";
		                }
		            }
		            ?>
                </select>
            </div>
				<?php echo $nope?>

                <input type="hidden" name="token" value="<?php echo token::generate();?>">
                <input type="submit" value="Voeg toe">
				<?php

				?>
            </form>

            <br>
        </div>
    </div>
</div>