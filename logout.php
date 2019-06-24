<?php
require_once 'Core/init.php';

$user = new User();
$user->logout();

echo "
		            <script>
		            window.location.replace(\"login.php\");
                    </script>
		            ";