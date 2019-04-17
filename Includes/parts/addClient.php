<?php
$errors = '';
$status = "";


?>

<?php
if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST,[
        'email' => array( 'required' => true, 'unique' =>'users' ),
        'username' => array( 'required' => true, 'unique' =>'users','min' => 2 ),
    ]);
    $hashed_password = password_hash(Input::get('password'), PASSWORD_DEFAULT);

    if ($validation->passed()) {
        Database::getInstance()->create(
            'users',
            [
                'username'  => Input::get('username'),
                'first_name'  =>  Input::get('first_name'),
                'last_name'  =>  Input::get('last_name'),
                'email'  =>  Input::get('email'),
                'hash'      =>  $hashed_password,
            ]);
          $status = "<div class='alert alert-primary alert-dismissible fade show mx-4 mt-4' role='alert'>Nieuwe gebruiker toegevoegd!!
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                          <span aria-hidden=\"true\">&times;</span>
                       </button>
                      </div>
                      ";
    } else {
        $errors = print_r($validation->errors());
    }
}
?>

<?php echo $status; ?>
<div class="jumbotron bg-dark text-white m-4 p-5">
  <h1 class="display-3 text-center">Registreer gebruiker</h1>
  <hr class="bg-secondary w-50">
  <form class="mx-auto" style="width: 500px;" action="" method="post">

    <div class="form-group">
      <label for="username">Gebruikersnaam</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Gebruikersnaam" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="password">Wachtwoord</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Wachtwoord">
    </div>
    <div class="form-group">
      <label for="first_name">Voornaam</label>
      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Voornaam">
    </div>
    <div class="form-group">
      <label for="first_name">Achternaam</label>
      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Achternaam">
    </div>
    <div class="form-group">
      <label for="first_name">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="voorbeeld@gmail.com">
    </div>


<!--    <input type="hidden" name="token" value="--><?php //echo token::generate();?><!--">-->
    <input class="btn btn-brand btn-block " type="submit" value="Register">

  </form>
</div>


<!---->
<!---->
<!---->
<!---->
<!--<div class="col-md-10 content">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-heading">-->
<!--            Registreer gebruiker-->
<!--        </div>-->
<!--        <div class="panel-body">-->
<!---->
<!--<form action="" method="post">-->
<!--	<div class="field">-->
<!--		<label for="username">Gebruikersnaam</label>-->
<!--		<input type="text" name="username" id="username" placeholder="Gebruikersnaam" autocomplete="off">-->
<!--	</div>-->
<!--	<div class="field">-->
<!--		<label for="password">Wachtwoord</label>-->
<!--		<input type="password" name="password" id="password" placeholder="Wachtwoord">-->
<!--	</div>-->
<!--    <div class="field">-->
<!--        <label for="first_name">Voornaam</label>-->
<!--        <input type="text" name="first_name" id="first_name" placeholder="Voornaam">-->
<!--    </div>-->
<!--    <div class="field">-->
<!--        <label for="first_name">Achternaam</label>-->
<!--        <input type="text" name="last_name" id="last_name" placeholder="Achternaam">-->
<!--    </div>-->
<!--    <div class="field">-->
<!--        <label for="first_name">Email</label>-->
<!--        <input type="email" name="email" id="email" placeholder="voorbeeld@gmail.com">-->
<!--    </div>-->
<!---->
<!---->
<!--    <input type="hidden" name="token" value="--><?php //echo token::generate();?><!--">-->
<!--	<input type="submit" value="Register">-->
<!---->
<!--</form>-->
<!--	        -->
<!--            <br>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
