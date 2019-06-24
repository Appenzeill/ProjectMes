<?php
require_once 'Core/init.php';
$client_id = $_GET["id"];
$client_medicine_id = $_GET["medicine_id"];

if ($_GET['medicine_id']) {
	Database::getInstance()->delete(
		'medicine_list',
		[
			'medicine_id', '=', $client_medicine_id
		]);
	echo "
		            <script>
		            window.location.replace(\"index.php\");
                    </script>
		            ";
}