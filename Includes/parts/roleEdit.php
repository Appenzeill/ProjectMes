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
}
$id = Session::get(Config::get('session/session_name'));

$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $id
	]);

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



					$permissions = Database::getInstance()->query(
						"SELECT  user_permissions.*, filtered_list.id as lists_id, filtered_list.role_name, filtered_list.user_permission_list_id, filtered_list.user_permission_id FROM user_permissions LEFT JOIN (SELECT * FROM user_permission_lists WHERE user_permission_lists.role_name =  '$selectRoleName') filtered_list
                                ON user_permissions.id = filtered_list.user_permission_id
                                ORDER BY user_permissions.id;");


					echo "<br> Aanpassen van rol: <b>" .$selectRoleName. "<br>";
//					echo "<input type='radio' value='aanpassen'> Selecteer als u wilt Aanpassen";
					echo "<table>";
					echo "<th>Status</th>";
					echo "<th>Permission</th>";
					echo "<th>Beschrijving</th>";
					foreach ($permissions->results() as $pid) {
						echo "<tr>";

						?>
                        <!--todo zorgen dat ze geselecteerd zijn als ze de permission hebben in de lijst user_permission_lists-->
                        <td><input type="checkbox" name="checkbox[]" value"<?php echo $pid->id ?> <?php if ($pid->user_permission_id !== null) echo "checked='checked'"; ?>
                            ></td>
						<?php

//                        echo $p->user_permission_id;
						echo "<td>".$pid->user_permission_name ." </td>";
						echo "<td>".$pid->user_permission_description. "</td>";

					}
				}
				echo "</tr>";
				echo "</table>";






				//					VERWIJDEREN MOGELIJK geen van deze werkt de middelste stuurt het wel en de onderste ook maar meer niet
				//				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				//					if(isset($_POST['aanpassen'])){
				//						$checkboxes = isset( $_POST['checkbox'] ) ? $_POST['checkbox'] : array();
				//						foreach ( $_POST['checkbox'] as $value ) {
				//							Database::getInstance()->insert(
				//								'user_permission_lists',
				//								[
				//									'role_name'          => $role_name,
				//									'user_permission_id' => 3
				//								]
				//							);
				//						}
				//					} else{
				//						echo "aanpassen niet gezet";
				//					}
				//				} else {
				//					echo "geen post";
				//				}

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$checkboxes = isset( $_POST['checkbox'] ) ? $_POST['checkbox'] : array();
					foreach ( $_POST['checkbox'] as $value ) {
						Database::getInstance()->insert(
							'user_permission_lists',
							[
								'role_name'          => "hii",
								'user_permission_id' => 4
							]
						);
					}
				} else {
					echo "probleem";
				}






				?>

        </div>
        <input type="hidden" name="token" value="<?php echo token::generate();?>">
        <input type="submit" value="Aanpassen">
        </form>
		<?php
		//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		//	        $checkboxes = isset( $_POST['checkbox'] ) ? $_POST['checkbox'] : array();
		//	        foreach ( $_POST['checkbox'] as $value ) {
		//		        Database::getInstance()->insert(
		//			        'user_permission_lists',
		//			        [
		//				        'role_name'          => "hii",
		//				        'user_permission_id' => 2
		//			        ]
		//		        );
		//	        }
		//        } else {
		//	        echo "probleem";
		//        }
		?>
        <br>
    </div>
</div>