<?php
/**
 * Created by PhpStorm.
 * User: thega
 * Date: 8-4-2019
 * Time: 09:23
 */
$errors = '';

?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Permission dashboard
        </div>
        <div class="panel-body">


<form action="" method="post">
	<div class="field">
		<label for="username">permission naam</label>
		<input type="text" name="permission_name" id="permission_name" placeholder="name" autocomplete="off">
	</div>
	<div class="field">
		<label for="password">permission beschrijving</label>
		<input type="text" name="permission_description" id="permission_description" placeholder="beschrijving">
	</div>
	<input type="submit" value="Toevoegen">
</form>
	        <?php
	        if (Input::exists()) {
			        Database::getInstance()->insert(
				        'user_permissions',
				        [
					        'user_permission_name'  => Input::get('permission_name'),
					        'user_permission_description'  =>  Input::get('permission_description'),
				        ]);
			        echo "Nieuwe gegevens toegevoegd!!";
		        }
	        ?>
            <br>
        </div>
    </div>
</div>
</div>
</div>