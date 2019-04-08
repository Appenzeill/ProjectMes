<?php
$errors = '';
$id = Session::get(Config::get('session/session_name'));

$nope = "";
foreach ($user->results() as $user) {
}
$role_name_filler    = "";
$role_description_filler   = "";
if (Input::exists()) {
	$role_name_filler         = Input::get('permission_name');
	$role_description_filler  = Input::get('permission_description');
}
?>
<div class="col-md-10 content">
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #3498DB; color: white;">
			Pas persoonlijke gegevens aan.
		</div>
		<div class="panel-body">

			<form action="" method="post">
				<div class="field">
					<label for="username">Rol naam:</label>
					<input type="text" name="role_name" id="role_name" value="<?php echo $role_name_filler?>" autocomplete="off">
				</div>
				<div class="field">
					<label for="password">Rol beschrijving:</label>
					<input type="text" name="role_description" id="role_description" value="<?php echo $role_description_filler?>" autocomplete="off">
				</div>


				<?php
				if (Input::exists()) {
					Database::getInstance()->insert(
						'user_roles',
						[
							'user_role_name'  => Input::get('role_name'),
							'user_role_description'  =>  Input::get('role_description'),
						]);
				}
				$user = Database::getInstance()->get(
					'user_permission_lists',
					[
						'user_permission_list_id', '>=', 1
					]);
				if (!$user->count()) {
					echo "Geen gebruiker";
				} else {
					?>
				<select name="test">
					<?php
					foreach ($user->results() as $user) {
						echo "<option>".$user->user_permission_lists_name.$user->id." | ".$user->user_permission_list_id." | ".$user->user_permission_id."</option>";
						}
					}
					?>
				</select>
				<?php echo $nope?>
				<br><input type="submit" value="Voeg toe">
			</form>
			<br>
		</div>
	</div>
</div>

