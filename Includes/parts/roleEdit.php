<?php
/**
 * Created by PhpStorm.
 * User: thega
 * Date: 8-4-2019
 * Time: 12:18
 */

$errors = '';
$id = Session::get(Config::get('session/session_name'));

$role = Database::getInstance()->query(
	"SELECT DISTINCT role_name FROM user_permission_lists");
?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Role aanpassen
        </div>
        <div class="panel-body">


<form method="post">
	<div class="field">
		<label for="username">Rol naam</label>
        <select id="list" onchange="selectedValue()">
            <option value=""></option>
			<?php
			foreach ($role->results() as $r) {
				?>
                <option value="<?php echo $r->role_name ?>">
					<?php
					echo $r->role_name;
					?>
                </option>
				<?php
			}
			?>
        </select>
	</div>
	<input type="submit" value="Aanpassen" onclick="<?php getPermission()?>">
</form>

<p id="permission"></p>
            <script>
                function selectedValue() {
                    var selectedRol = document.getElementById("list").value;
                    console.log(selectedRol);
                    return selectedRol;
                }
            </script>

	        <?php
            function getPermission(){
	            $getRol = "<script>document.write(selectedValue())</script>";
	            $selectedRol = Database::getInstance()->get(
		            'user_permission_lists',
		            [
			            'role_name', '>=', $getRol
		            ]);
	            foreach ($selectedRol->results() as $rol){
		            ?>
                    <label><?php echo $rol->user_permission_id?></label>
		            <?php
	            }
            }
	        ?>









	        <?php
//	        if (Input::exists()) {
//			        Database::getInstance()->insert(
//				        'user_permission_lists_name',
//				        [
//					        'user_permission_list_name'  => Input::get('rol_naam'),
//				        ]);
//			        echo "Nieuwe gegevens toegevoegd!!";
//		        }
	        ?>

        </div>
    </div>
</div>
<!--todo het maken van een fuctie voor de query