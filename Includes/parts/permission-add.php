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
?>
<div class="col-md-10 content">
	<div class="panel panel-default">
		<div class="panel-heading" style="background-color: #3498DB; color: white;">
			Pas persoonlijke gegevens aan.
		</div>
		<div class="panel-body">

			<form action="" method="post">
				<div class="field">
					<label for="username">Permissie naam:</label>
					<input type="text" name="permission_name" id="permission_name" value="<?php echo $permission_name_filler?>" autocomplete="off">
				</div>
				<div class="field">
					<label for="password">Permissie beschrijving:</label>
					<input type="text" name="permission_description" id="permission_description" value="<?php echo $permission_description_filler?>" autocomplete="off">
				</div>

				<?php echo $nope?>
				<input type="submit" value="Voeg toe">
				<?php
					if (Input::exists()) {
							Database::getInstance()->insert(
								'user_permissions',
								[
									'user_permission_name'  => Input::get('permission_name'),
									'user_permission_description'  =>  Input::get('permission_description'),
								]);
							}
				?>
			</form>
			<br>
		</div>
	</div>
</div>

