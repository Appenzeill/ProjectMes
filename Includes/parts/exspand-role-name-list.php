<?php
/**
 * Created by PhpStorm.
 * User: thega
 * Date: 8-4-2019
 * Time: 12:18
 */

$errors = '';

?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Role name toevoegen
        </div>
        <div class="panel-body">


<form action="" method="post">
	<div class="field">
		<label for="username">Rol naam</label>
		<input type="text" name="rol_naam" id="rol_naam" placeholder="name" autocomplete="off">
	</div>

	<input type="submit" value="Toevoegen">
</form>
	        <?php
	        if (Input::exists()) {
			        Database::getInstance()->insert(
				        'user_permission_lists_name',
				        [
					        'user_permission_list_name'  => Input::get('rol_naam'),
				        ]);
			        echo "Nieuwe gegevens toegevoegd!!";
		        }
	        ?>
            <br>
        </div>
    </div>
</div>
