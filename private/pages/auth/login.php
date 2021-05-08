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
<form method="post" class="text-center">
    <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
    <div class="form-group h3 mb-3 col-auto text-center">
        <label for="username">Username</label>
        <input type="text" class="form-control border border-primary" id="username" placeholder="Felhasználónév" name="username" aria-describedby="username" required>
        <?php if(!(empty($errors))): ?>
            <span class="alert alert-danger"><?= implode(', ', ($errors['username'] ?? [])) ?> </span>
        <?php endif; ?>
    </div>
    <div class="form-group h3 mb-3 col-auto text-center">
        <label for="password">Password</label>
        <input type="password" class="form-control border border-primary" id="password" placeholder="Jelszó" name="password" aria-describedby="password" required>
        <?php if(!(empty($errors))): ?>
            <span class="alert alert-danger"><?= implode(', ', ($errors['password'] ?? [])) ?> </span>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-lg btn-primary h3 mb-3 col-auto text-center" name="submit" value="login">Submit</button>
    <?php if(!(empty($errors))): ?>
        <span class='alert alert-danger h3 mb-3 col-auto text-center'><?= implode(', ', ($errors['_'] ?? [])) ?> </span>
    <?php endif; ?>
</form>