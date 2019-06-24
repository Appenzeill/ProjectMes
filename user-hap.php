<?php
include_once("Core/init.php");
include_once("Includes/html-parts/html/top.php");
echo "<meta http-equiv=\"refresh\" content=\"1\" > ";
$room = $_GET["room"];
$msgs = Database::getInstance()->query(
    "SELECT * FROM chat WHERE room = {$room} ORDER BY time DESC" );
foreach ($msgs->results() as $msg){
    echo $msg->msg."<br>";
}
?>

