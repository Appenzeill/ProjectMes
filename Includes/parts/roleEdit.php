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
}


/**
 * Rollen selecteren:
 */
$query = Database::getInstance()->query(
	"SELECT DISTINCT role_name FROM user_permission_lists");
?>

<div class="col-md-4     content">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Aanpassen van rechten</h3>
        </div>
        <div class="panel-body">
            <p>Selecteer de rol die u wilt aanpassen:</p>
            <form action="" method="post">
                <select name="selectRole">
                    <option value=""></option>
					<?php
					foreach ($query->results() as $query) {
						echo "<option value='$query->role_name' "; echo "> ".$query->role_name."</option>";
					}
					?>
                </select>
				<?php
				$rawpermissions = Database::getInstance()->query(
					"SELECT * FROM user_permission_lists WHERE role_name = '$selectRoleName'");

				if (!$rawpermissions->count()) {
					echo "<br>Geen rol geselecteerd<br>";
				} else {
				    echo "<br> Aanpassen van rol: <b>" .$selectRoleName. "<br>";
					echo "<table>";
					echo "<th>Status</th>";
					echo "<th>Permission</th>";
					echo "<th>Beschrijving</th>";
					foreach ($rawpermissions->results() as $rp) {
					    echo "<tr>";
						$role_name = $rp->role_name;
						$permission = Database::getInstance()->get(
							'user_permissions',
							[
								'id', '=', $rp->user_permission_id
							]);

						foreach ($permission->results() as $p) {
							    ?>
                                <td><input type="checkbox" value="<?php echo $p->id?>" <?php if ($p->id == $rp->user_permission_id) echo "checked='checked'"; ?>> </td>
                                <?php
							    echo "<td>".$p->user_permission_name ." </td>";
							    echo "<td>".$p->user_permission_description. "</td>";
                            }
						}

//						Database::getInstance()->update(
//							'users',$id,
//							[
//								'role_id'  => $role_name
//							]);
					}
					echo "</tr>";
					echo "</table>";
//				}
				?>
        </div>
		<?php echo $nope ?>
        <input type="hidden" name="token" value="<?php echo token::generate();?>">
        <input type="submit" value="Aanpassen">
        </form>
        <br>
    </div>
</div>