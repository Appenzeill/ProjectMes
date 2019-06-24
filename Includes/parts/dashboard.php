<?php
$id = Session::get(Config::get('session/session_name'));
$user = Database::getInstance()->get(
	'users',
	[
		'id', '=', $id
	]);
$permissions = Database::getInstance()->query(
	"
SELECT DISTINCT * FROM user_roles INNER JOIN user_permission_lists ON user_roles.id=user_permission_lists.user_permission_list_id INNER JOIN users ON users.role_id=user_permission_lists.user_permission_list_id WHERE users.id = '$id';
");
if (!$user->count()) {
	echo "
<script>
    window.location.replace(\"login.php\");
</script>
";
} else {
	foreach ($user->results() as $user) {
		$data1 = "Welkom ".$user->first_name." ".$user->last_name." op uw dashboard.<br>"
		;
	}
}?>

<div class="col-sm-12">
        <div class="panel-body">
			<?php
			foreach ($permissions->results() as $permission) {
				//echo $permission->user_permission_id."<br>";
				if ($permission->user_permission_id == 1) {
				    echo "Permission 1 <br>";
                }
				if ($permission->user_permission_id == 2) {
					echo "Permission 2<br>";
				}
				if ($permission->user_permission_id == 3) {
					echo "Permission 3<br>";
				}
				if ($permission->user_permission_id == 4) {
					echo "Permission 4<br>";
				}
				if ($permission->user_permission_id == 5) {
					echo "Permission 5<br>";
				}
				if ($permission->user_permission_id == 6) {
					echo "Permission 6<br>";
				}
				if ($permission->user_permission_id == 7) {
					echo "Permission 7<br>";
				}
				if ($permission->user_permission_id == 8) {
					echo "Permission 8<br>";
				}
				if ($permission->user_permission_id == 9) {
					echo "Permission 9<br>";
				}
				if ($permission->user_permission_id == 10) {
					echo "Permission 10<br>";
				}
				if ($permission->user_permission_id == 11) {
					echo "Permission 11<br>";
				}
				if ($permission->user_permission_id == 12) {
					echo "Permission 12<br>";
				}
				if ($permission->user_permission_id == 13) {
					echo "Permission 13<br>";
				}
				if ($permission->user_permission_id == 14) {
					echo "Permission 14<br>";
				}
				if ($permission->user_permission_id == 15) {
					echo "Permission 15<br>";
				}
				if ($permission->user_permission_id == 16) {
					echo "Permission 16<br>";
				}
				if ($permission->user_permission_id == 17) {
					echo "Permission 17<br>";
				}
				if ($permission->user_permission_id == 18) {
					echo "Permission 18<br>";
				}
				if ($permission->user_permission_id == 19) {
					echo "Permission 19<br>";
				}
				if ($permission->user_permission_id == 20) {
					echo "Permission 20<br>";
				}
				if ($permission->user_permission_id == 21) {
					echo "Permission 21 <br>";
				}
				if ($permission->user_permission_id == 22) {
					echo "Permission 22<br>";
				}
				if ($permission->user_permission_id == 23) {
					echo "Permission 23<br>";
				}
				if ($permission->user_permission_id == 24) {
					echo "Permission 24<br>";
				}
				if ($permission->user_permission_id == 25) {
					echo "Permission 25<br>";
				}
				if ($permission->user_permission_id == 26) {
					echo "Permission 26<br>";
				}
				if ($permission->user_permission_id == 27) {
					echo "Permission 27<br>";
				}
				if ($permission->user_permission_id == 28) {
					echo "Permission 28<br>";
				}
				if ($permission->user_permission_id == 29) {
					echo "Permission 29<br>";
				}
				if ($permission->user_permission_id == 30) {
					echo "Permission 30 <br>";
				}
				if ($permission->user_permission_id == 31) {
					echo "Permission 31<br>";
				}
				if ($permission->user_permission_id == 32) {
					echo "Permission 32<br>";
				}
				if ($permission->user_permission_id == 33) {
					echo "Permission 33<br>";
				}
				if ($permission->user_permission_id == 34) {
					echo "Permission 34<br>";
				}
			}
			?>
        </div>
</div>
