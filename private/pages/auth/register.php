<?php
if(isset($_POST['submit'])){
    require_once 'private/lib/validations/user_register.php';

    $errors = validate_user_reg($_POST);

    if(empty($errors)){
        db_execute('INSERT INTO `users` (id, username, email, password) VALUES (:id, :username, :email, :password)', [
            ':id' => uniqid('', true),
            ':username' => $_POST['username'],
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 20]),
        ]);
    } else{
        //hibák kiírása szépen
    }
}
?>

<form method="post">
    <div class="form-group col-auto col-md-2 ">
        <label for="username">Felhasználónév</label>
        <input type="text" class="form-control border border-primary" id="username" placeholder="Felhasználónév" name="username" aria-describedby="username" required>
    </div>
    <div class="form-group col-auto col-md-2">
        <label for="email">Email-cím</label>
        <input type="email" class="form-control border border-primary" id="email" placeholder="Email cím" name="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">Senkivel sem osztjuk meg az email címét.</small>
    </div>
    <div class="form-group .col-auto col-md-2">
        <label for="password">Jelszó</label>
        <input type="password" class="form-control border border-primary" id="password" placeholder="Jelszó" name="password" required>
    </div>
    <div class="form-group .col-auto col-md-2">
        <label for="password">Jelszó mégegyszer</label>
        <input type="password" class="form-control border border-primary" id="password" placeholder="Jelszó" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary col-auto">Submit</button>
</form>