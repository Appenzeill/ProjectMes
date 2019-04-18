<?php
$id = Session::get(Config::get('session/session_name'));
$permissions = Database::getInstance()->get(
	'user_permissions',
	[
		'id', '>=', 1
	]);
?>
                </select>
<div class="col-md-10 content">
	<div class="panel panel-default">
		<div class="panel-heading">
			Role aanpassen:
		</div>
		<div class="panel-body">
			<form method="post">
				<div class="field">
					<h3>Rol aanpassen:</h3>
					<label for="username">Role naam</label>

				</div>
				<div class="field">
                    <script>
                        $(document).ready(function(){
                            $("#myInput").on("keyup", function() {
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
                    <br>
                    <input id="myInput" type="text" placeholder="Search..">

					<table class="table">
						<thead>
                        <tr>
                            <th>State</th>
                            <th>Naam</th>
                            <th>Beschrijving</th>
                        </tr>
						</thead>
                        <tbody id="myTable">
						<?php
						foreach ($permissions->results() as $permission) {
							?>
							<tr>
								<td><input type="checkbox" name="checkbox[]" value="<?php echo $permission->id?>"></td>
								<td><?php echo $permission->user_permission_name; ?></td>
								<td><?php echo $permission->user_permission_description; ?></td>
							</tr>
							<?php
						}
						?>
                        </tbody>
					</table>
				</div>
				<input type="submit" value="Toevoegen">
			</form>
			<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (Input::exists()) {
					$checkboxes = isset( $_POST['checkbox'] ) ? $_POST['checkbox'] : array();
					foreach ( $_POST['checkbox'] as $value ) {
						echo Input::get( 'permission_name' )." $value <br> ";
						Database::getInstance()->insert(
							'user_permission_lists',
							[
								'role_name'          => Input::get( 'permission_name' ),
								'user_permission_id' => $value
							]
						);
					}
				}
			}
			?>
		</div>
	</div>
</div>
