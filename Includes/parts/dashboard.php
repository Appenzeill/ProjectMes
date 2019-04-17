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
$data1 = "Welkom op uw dashboard, ".$user->first_name." ".$user->last_name."<br>"
;
$data2 = $user->hash."<br>";
}


}?>
      <div class="jumbotron bg-dark text-white m-4">
        <h1 class="display-3 text-center">Dashboard</h1>
        <p class="lead text-center"><?php echo $data1; ?></p>
      </div>