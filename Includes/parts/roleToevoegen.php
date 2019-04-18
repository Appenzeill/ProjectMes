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
      <div class="jumbotron bg-dark text-white m-4 p-5">
          <form method="post">
            <h1 class="display-3 text-center mt-5">Rol toevoegen</h1>
            <hr class="bg-secondary w-50">
          <div class="input-group col-md-4 col-sm-5 px-0 mt-4">
            <div class="input-group-prepend">
              <span class="input-group-text bg-dark text-white border-0" id="basic-addon1"><i class="material-icons">group_add</i></span>
            </div>
            <input type="text" style="height: 40px;" class="form-control bg-dark text-white border-0 text search-bar" name="permission_name" id="permission_name" placeholder="Voer naam van nieuwe rol in" autocomplete="off">
            <input class="border-0 bg-dark text-light" type="submit" value="Toevoegen">
          </div>
                <table class="table table-hover table-dark mt-4">
                  <thead>
                    <tr>
                        <th>State</th>
                        <th>Naam</th>
                        <th>Beschrijving</th>
                    </tr>
                  </thead>
                  <?php
                  foreach ($permission->results() as $p) {
                  ?>
                    <tbody id="myTable">
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" value="<?php echo $p->id?>"></td>
                        <td><?php echo $p->user_permission_name; ?></td>
                        <td class="text-left"><?php echo $p->user_permission_description; ?></td>
                    </tr>
                  </tbody>
                    <?php
                  }
                  ?>
                </table>
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
<!--todo  reload voegt hij data toe aan de database
<!--todo  als de naam al het id heeft moet hij dat zeggen en niet nog een keer toevoegen
