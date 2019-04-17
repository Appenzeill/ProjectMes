<?php
/**
 * Created by PhpStorm.
 * User: thega
 * Date: 8-4-2019
 * Time: 10:32
 */

$id = Session::get(Config::get('session/session_name'));

$permission = Database::getInstance()->get(
	'user_permissions',
	[
		'id', '>=', 1
	]);
?>
<div class="col-md-10 content">
    <div class="panel panel-default">
        <div class="panel-heading">
            Role toevoegen
        </div>
        <div class="panel-body">

        <form method="post">
          <div class="field">
                <h3>Nieuwe rol toevoegen:</h3>
            <label for="username">Role naam</label>
            <input type="text" name="permission_name" id="permission_name" placeholder="name" autocomplete="off">
          </div>
          <div class="field">
                <table>
                    <tr>
                        <th>State</th>
                        <th>Naam</th>
                        <th>Beschrijving</th>
                    </tr>
                  <?php
                  foreach ($permission->results() as $p) {
                  ?>
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" value="<?php echo $p->id?>"></td>
                        <td><?php echo $p->user_permission_name; ?><td>
                        <td><?php echo $p->user_permission_description; ?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
          </div>
          <input type="submit" value="Toevoegen">
        </form>
<?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  if(isset($_POST["permission_name"])){
                    $checkboxes = isset( $_POST['checkbox'] ) ? $_POST['checkbox'] : array();
                    foreach ( $_POST['checkbox'] as $value ) {
                        Database::getInstance()->insert(
                            'user_permission_lists',
                            [
                                'role_name'          => Input::get( 'permission_name' ),
                                'user_permission_id' => $value
                            ]
                        );
                    }
                } else {
                      echo "probleem";
                  }
            }
            ?>
        </div>
    </div>
</div>
</div>
<!--todo  reload voegt hij data toe aan de database
<!--todo  als de naam al het id heeft moet hij dat zeggen en niet nog een keer toevoegen
