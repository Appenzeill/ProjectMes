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
            Voeg een item toe.
        </div>
        <div class="panel-body">

            <form action="" method="post">
                <div class="field">
                    <label for="username">Item naam:</label>
                    <input type="text" name="item_name" id="item_name" value="<?php echo $permission_name_filler?>" autocomplete="off">
                </div>
                <div class="field">
                    <label for="password">Item beschrijving:</label>
                    <input type="text" name="item_description" id="item_description" value="<?php echo $permission_description_filler?>" autocomplete="off">
                </div>

				<?php echo $nope?>
                <input type="submit" value="Voeg toe">
				<?php

				?>

	            <?php
	            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		            if (Input::exists()) {
			            $validate = new Validate();
			            $validation = $validate->check($_POST,[
				            'item_name' => array( 'required' => true, 'unique' =>'items' ),
				            'item_description' => array( 'required' => true, 'unique' =>'items' )
			            ]);
			            if ($validation->passed()) {
				            Database::getInstance()->insert(
					            'items',
					            [
						            'item_name'  => Input::get('item_name'),
						            'item_description'  =>  Input::get('item_description'),
					            ]);
			            } else {
			                foreach ($validation->errors() as $error) {
				                echo "<br>{$error}";

                            }
			            }
		            }
	            }
	            ?>
            </form>
            <br>
        </div>
    </div>
</div>

