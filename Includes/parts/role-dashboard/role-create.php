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



<div class="col-md-4  content">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB; color: white;">
            Voeg rol toevoegen aan gebruiker.
        </div>
        <div class="panel-body">
            <form action="" method="post">
                <table class="table">
                    <tbody>
                    <tr>
                        <td><label for="username">Role naam</label></td>
                        <td><input type="text" name="user_role_name" id="user_role_name" placeholder="name"  autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><label for="username">Role beschrijving</label></td>
                        <td><input type="text" name="user_role_description" id="user_role_description" placeholder="name"  autocomplete="off"></td>
                    </tr>
                    </tbody>
                </table>

	            <?php echo "<br>".Input::get('user_role_name') ?>
	            <?php echo "<br>".Input::get('user_role_description') ?>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	                if (Input::get('user_role_name')) {
		                $validate = new Validate();
		                $validation = $validate->check($_POST,[
			                'user_role_name' => array( 'required' => true, 'unique' =>'user_roles' ),
			                'user_role_description' => array( 'required' => true, 'unique' =>'user_roles' )
		                ]);
		                if ($validation->passed()) {
			                Database::getInstance()->insert(
				                'user_roles',
				                [
					                'user_role_name'            => Input::get('user_role_name'),
					                'user_role_description'     => Input::get('user_role_description')
				                ]
			                );
			                $user_role_ids = Database::getInstance()->get(
				                'user_roles',
				                [
					                'user_role_name', '=', Input::get('user_role_name')
				                ]);
			                foreach ($user_role_ids->results() as $user_role_id) {
				                Database::getInstance()->insert(
					                'user_permission_lists',
					                [
						                'user_permission_list_id'       =>      $user_role_id->id,
						                'user_permission_id'        =>      0
					                ]
				                );
			                }

		                }
	                }
                }

                ?>
        </div>
        <input type="submit" value="Voeg toe">
        </form>
    </div>
</div>

<div class="col-md-6  content">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #3498DB; color: white;">
            Voeg rol toevoegen aan gebruiker.
        </div>
        <div class="panel-body">
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
							echo "<option " . (isset($_POST["selectRole"]) && $_POST["selectRole"] === $query->user_permission_list_id ? "selected " : "") . "value='$query->user_permission_list_id' "; echo "> ".$query->user_role_name."</option>";
						}
						?>
                    </select>
					<?php
				}
				?>
        </div>
		<?php echo $nope ?>
        <input type="hidden" name="token" value="<?php echo token::generate();?>">
        <input type="submit" value="Pas rol aan">
        </form>
        <?php


        ?>
        <script>
            const addSelected = element => {
                let value = $($("select[name='selectRole']")[0]).val();
                $(element).val(value);
            }
        </script>

        <form action="" method="post">
            <br>
            <input type="submit" value="Permissies toevoegen / aanpassen">
            <input type="hidden" value="" name="selectRole" id="hidden-selected" />

            <script>
                addSelected($("#hidden-selected"))
            </script>

            <div class="field">
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

                    <table class="table">
                        <thead>
                        <tr>
                            <th>State</th>
                            <th>Naam</th>
                            <th>Beschrijving</th>
                        </tr>
                        </thead>
                        <tbody id="myTable">
		                <?php
		                echo "<br>test".$selectRoleName;
		                $permission_list1 = Input::get('selectRole');
		                $permissions = Database::getInstance()->get(
			                'user_permissions',
			                [
				                'id', '>=', 1
			                ]);
		                foreach ($permissions->results() as $permission) {
			                $permission_lists = Database::getInstance()->query(
				                "SELECT * FROM `user_permission_lists` WHERE user_permission_lists.user_permission_list_id = '$permission_list1';"
			                );
			                ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="checkbox[]" value="<?php echo $permission->id?>" <?php
					                foreach ($permission_lists->results() as $permission_list) {
						                if ($permission->id == $permission_list->user_permission_id) {
							                echo "checked='checked'";

							                echo "style='
		                            
		                            '";
						                }
					                }
					                ?>>
                                </td>
                                <td><?php echo $permission->user_permission_name; ?></td>
                                <td><?php echo $permission->user_permission_description; ?></td>
                            </tr>
			                <?php
		                }
		                ?>
                        </tbody>
                    </table>
	                <?php
	                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		                if(isset($_POST['checkbox'])){
			                $checkboxes = isset( $_POST['checkbox'] ) ? $_POST['checkbox'] : array();
			                $roleName = $selectRoleName;
			                Database::getInstance()->query(
				                "DELETE FROM user_permission_lists WHERE user_permission_list_id = '$permission_list1'"
			                );
			                foreach ( $_POST['checkbox'] as $value ) {
				                Database::getInstance()->insert(
					                'user_permission_lists',
					                [
						                'user_permission_list_id' => $permission_list1,
						                'user_permission_id' => $value
					                ]
				                );
				                echo $permission_list1."<br>";

				                echo $value."<br><hr>";
				                echo "  <script>
		                                    window.location.replace(\"index.php?role_create=\");
                                        </script>";
			                }
		                }
                }?>
            </div>
        </form>
        <br>
    </div>
</div>

