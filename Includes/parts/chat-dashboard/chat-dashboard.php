<?php
$id = Session::get(Config::get('session/session_name'));

$rooms = Database::getInstance()->query(
    "SELECT DISTINCT room FROM chat ORDER BY room");

if (isset($_POST["handled"])) {
    foreach ($_POST["handled"] as $value) {
        Database::getInstance()->query( "DELETE FROM chat WHERE room = $value;");
    }
    echo "
					    <script>
                  window.location.replace(\"http://127.0.0.1/projectMes/?chat_room_overview=\");
              </script>
					    ";
}
?>
<div class="">


</div>





<div class="col-md-8">
    <h1 class="display-5 text-center pt-5">Chat rooms</h1>
    <hr class="bg-secondary">
    <form action="" method="post">
        <table class="table">
            <thead>
            <tr>
                <th>Room</th>
                <th>Openen</th>
                <th>Verwijderen</th>
            </tr>
            </thead>
            <tbody id="myTable">
            <?php
            foreach ($rooms->results() as $r){
                ?>
                <tr>
                    <td>
                        <?php
                        echo "Room " .$r->room;
                        ?>
                    </td>
                    <td>
                        <input class="btn btn-brand" type="button" value="Chat" onclick="window.location.href = 'index.php?chat_hap=&room=<?php echo $r->room ?>'">
                    </td>
                    <td>
                        <input type="checkbox" name="handled[]" value="<?php echo $r->room ?>">
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <input class="btn btn-light" type="submit" name="submit" value="Bevestig het verwijderen van de rooms" />
    </form>
</div>
</div>