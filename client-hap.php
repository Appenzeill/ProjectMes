<?php
include_once("Core/init.php");
include_once("Includes/html-parts/html/top.php");
echo "<meta http-equiv=\"refresh\" content=\"1\" > ";
$client_id = $_GET["id"];

$msgs = Database::getInstance()->query(
    "SELECT * FROM chat WHERE client_id = {$client_id} ORDER BY time DESC");
foreach ($msgs->results() as $msg) {
    echo $msg->msg . "<br>";
}
?>
