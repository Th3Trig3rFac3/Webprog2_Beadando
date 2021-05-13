<?php
if(isset($_POST['submit'])){
    require_once 'private/lib/validations/user_register.php';
    require_once "private/lib/utils/request.php";

    $errors = validate_user_reg($_POST);

    if(empty($errors)){
        db_execute('INSERT INTO `users` (id, username, email, password) VALUES (:id, :username, :email, :password)', [
            ':id' => uniqid('', true),
            ':username' => $_POST['username'],
            ':email' => $_POST['email'],
            ':password' => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 20]),
        ]);
    }
    if(empty($errors)){
        require_once "private/lib/utils/request.php";
        redirect("home");
    }
}
?>

<form method="post" class="col-auto">
    <div class="form-group col-auto h3 mb-3">
        <label for="username">Felhasználónév</label>
        <input type="text" class="form-control border border-primary" id="username" placeholder="Felhasználónév" name="username" aria-describedby="username" required>
    </div>
    <div>
        <?php if(!(empty($errors))): ?>
            <span class="alert alert-danger"><?= implode(', ', ($errors['username'] ?? [])) ?> </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-auto h3 mb-3">
        <label for="email">Email-cím</label>
        <input type="email" class="form-control border border-primary" id="email" placeholder="Email cím" name="email" aria-describedby="emailHelp" required>
        <small id="emailHelp" class="form-text text-muted">Senkivel sem osztjuk meg az email címét.</small>
    </div>
    <div>
        <?php if(!(empty($errors))): ?>
            <span class='alert alert-danger'><?= implode(', ', ($errors['email'] ?? [])) ?> </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-auto h3 mb-3">
        <label for="password">Jelszó</label>
        <input type="password" class="form-control border border-primary" id="password" placeholder="Jelszó" name="password" required>
    </div>
    <div>
        <?php if(!(empty($errors))): ?>
            <span class='alert alert-danger'><?= implode(', ', ($errors['password'] ?? [])) ?> </span>
        <?php endif; ?>
    </div>
    <div class="form-group col-auto h3 mb-3">
        <label for="password_confirmation">Jelszó mégegyszer</label>
        <input type="password" class="form-control border border-primary" id="password_confirmation" placeholder="Jelszó mégegyszer" name="password_confirmation" required>
    </div>
    <div>
        <?php if(!(empty($errors))): ?>
            <span class='alert alert-danger'><?= implode(', ', ($errors['password_confirmation'] ?? [])) ?> </span>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary col-auto h3 mb-3" value="register" name="submit">Submit</button>
    <?php if(!(empty($errors))): ?>
        <span class='alert alert-danger'><?= implode(', ', ($errors['_'] ?? [])) ?> </span>
    <?php endif; ?>

</form>