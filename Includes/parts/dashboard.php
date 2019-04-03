<?php
$id = Session::get(Config::get('session/session_name'));

$user = Database::getInstance()->get(
'users',
[
'id', '=', $id
]);

if (!$user->count()) {
echo "
<script>
    window.location.replace(\"login.php\");
</script>
";
} else {
foreach ($user->results() as $user) {
$data1 = "Welkom ".$user->first_name." ".$user->last_name." op uw dashboard.<br>"
;
$data2 = $user->hash."<br>"
.$user->password;
}


}?>

    <div class="col-md-10 content" >
        <div class="panel panel-default" >
            <div class="panel-heading" style="background-color: #3498DB">
                Dashboard
            </div>
            <div class="panel-body">
                <br>
				<?php
                echo $data1;
				?>
            </div>
        </div>
    </div>