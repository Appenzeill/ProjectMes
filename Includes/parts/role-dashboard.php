<?php
/**
 * Created by PhpStorm.
 * User: thega
 * Date: 8-4-2019
 * Time: 10:32
 */

$errors = '';
$id = Session::get(Config::get('session/session_name'));

$role = Database::getInstance()->get(
	'user_permission_lists',
	[
		'user_permission_list_id', '>=', 1
	]);


?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Role dashboard
        </div>
        <div class="panel-body">


<form action="" method="post">
	<div class="field">
		<label for="username">Role naam</label>
		<input type="text" name="permission_name" id="permission_name" placeholder="name" autocomplete="off">
	</div>
	<div class="field">
		<label for="password">Role:</label>
		<select name="test">
			<?php
			foreach ($role->results() as $role) {
				?>
				<option value="">
					<?php
					echo $role->id." | ".$role->user_permission_list_id." | ".$role->user_permission_id;
					?>
				</option>
				<?php
			}
			?>
		</select>
	</div>
	<input type="submit" value="Toevoegen">
</form>
	        <?php
//	        if (Input::exists()) {
//			        Database::getInstance()->insert(
//				        'user_permissions',
//				        [
//					        'user_permission_name'  => Input::get('permission_name'),
//					        'user_permission_description'  =>  Input::get('permission_description'),
//				        ]);
//			        echo "Nieuwe gegevens toegevoegd!!";
//		        }
	        ?>
            <br>
        </div>
    </div>
</div>
