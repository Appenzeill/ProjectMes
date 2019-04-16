<?php
$errors = '';
$nope = "";


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
	"
SELECT DISTINCT user_roles.id, user_permission_lists.user_permission_list_id, user_roles.user_role_name 
FROM user_roles 
INNER JOIN user_permission_lists ON user_roles.id=user_permission_lists.user_permission_list_id
                          ");
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
	            if (!$query->count()) {
		            echo "Geen gebruiker";
	            } else {

	            ?>
                <select name="selectRole">
		            <?php
		            foreach ($query->results() as $query) {
				            echo "<option value='$query->user_role_name' "; if($user->role_id == $query->user_permission_list_id) { echo 'selected="selected"';} echo "> ".$query->user_role_name."</option>";
		                }
		            }
		            ?>
                </select>
	            <?php
	            $query_id = Database::getInstance()->query(
		            "
SELECT
user_role_name, id
FROM
    user_roles
WHERE
    user_role_name =  '$selectRoleName';
                          ");


	            if (!$query_id->count()) {
		            echo "<br>Geen test<br>";
	            } else {
		            foreach ($query_id->results() as $query_id) {
			            $role_name = $query_id->user_role_name;

			            echo "<br><br> Rol is nu ".$role_name;
                       echo  $selectRoleID = $query_id->id;
			            $role = $query_id->id;
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
					'user_permission_list_id', '=', $selectRoleID
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
							'id', '=', $userasf->id
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