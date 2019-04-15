<?php
$errors = '';
$nope = "";

foreach ($user->results() as $user) {

}

$permission_name_filler    = "";
$permission_description_filler   = "";
if (Input::exists()) {
	$permission_name_filler         = Input::get('permission_name');
	$permission_description_filler  = Input::get('permission_description');
}
$selectRoleName     = "";
$selectRoleID       = "";

if (Input::exists()) {
	$selectRoleName     = Input::get('selectRole');
} else {

}

$id = Session::get(Config::get('session/session_name'));

$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $id
	]);

foreach ($user->results() as $user) {
	$data1 = "Voeg een rol toe aan of pas de rol van ".$user->first_name." ".$user->last_name."<br>Rol id: ".$user->role_id;
}


/**
 * Rollen selecteren:
 */
$query = Database::getInstance()->query(
	"SELECT DISTINCT role_name FROM user_permission_lists");
?>

<div class="col-md-4     content">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB; color: white;">
            Voeg rol toevoegen aan gebruiker.
        </div>
        <div class="panel-body">
			<?php echo $data1; ?>
            <form action="" method="post">
                <br>
				<?php

				?>
                <select name="selectRole">
					<?php
					foreach ($query->results() as $query) {
						echo "<option value='$query->role_name' "; echo "> ".$query->role_name."</option>";
					}

					?>
                </select>
				<?php
				$query_id = Database::getInstance()->query(
					"SELECT * FROM user_permission_lists WHERE role_name = '$selectRoleName'");


				if (!$query_id->count()) {
					echo "<br>Geen test<br>";
				} else {
					foreach ($query_id->results() as $query_id) {
						$role_name = $query_id->role_name;
						/**
						 * ksejgsd
						 */
						echo "<br><br> Rol is nu ".$role_name."<br> ".$query_id->user_permission_id."<br>";
						echo  $selectRoleID = $query_id->id;
						$role = $query_id->id;

						$get_permission_id = Database::getInstance()->get(
							'user_permissions',
							[
								'id', '=', $query_id->user_permission_id
							]);
						foreach ($get_permission_id->results() as $get_permission_id) {
							echo "<td>".$get_permission_id->user_permission_name ." </td>";
							echo "<td>".$get_permission_id->user_permission_description. "</td>";
						}
						Database::getInstance()->update(
							'users',$id,
							[
								'role_id'  => $role
							]);
					}
				}
				?>
        </div>
		<?php echo $nope ?>
        <input type="hidden" name="token" value="<?php echo token::generate();?>">
        <input type="submit" value="Voeg toe">
        </form>
        <br>
    </div>
</div>
<div class="col-md-6 content"  >
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB; color: white;">
            Rechten van gebruiker
        </div>
        <div class="panel-body">
			<?php
			$userasf = Database::getInstance()->get(
				'user_permission_lists',
				[
					'role_name', '=', $selectRoleName
				]);
			if (!$userasf->count()) {
				echo "<br>Geen test<br>";
			} else {
				echo "<table>
                        ";
				foreach ($userasf->results() as $userasf) {
					echo "<tr>";
					$get_permission_id = Database::getInstance()->get(
						'user_permissions',
						[
							'user_permission_id', '=', $userasf->id
						]);
					foreach ($get_permission_id->results() as $get_permission_id) {
						echo "<td>".$get_permission_id->user_permission_name ." </td>";
						echo "<td>".$get_permission_id->user_permission_description. "</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
				echo $selectRoleName;
			}
			?>
        </div>
    </div>
</div>
</div>