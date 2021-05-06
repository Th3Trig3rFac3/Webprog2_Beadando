<?php
$errors = [];
if(isset($_POST['submit'])){
    $user = db_fetch('users', 'username LIKE :username', [':username' => $_POST['username']]);
    if(password_verify($_POST['password'], $user['password'])){
        $_SESSION['user'] = $user;
    }
    else {
        $errors['_'][] = 'Helytelen felhasználónév vagy jelszó';
    }
}
?>
<form method="post">
    <div class="form-group col-auto col-md-2">
        <label for="username">Username</label>
        <input type="text" class="form-control border border-primary" id="username" placeholder="Felhasználónév" name="username" aria-describedby="username" required>
    </div>
    <div class="form-group .col-auto col-md-2">
        <label for="password">Password</label>
        <input type="password" class="form-control border border-primary" id="password" placeholder="Jelszó" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary col-auto">Submit</button>
</form>