<?php
if(isset($_POST['submit'])){
    $users = [];

    if($_POST['rows'] > 0){
        $users = db_fetchAll('SELECT username, email, created_at, role FROM users LIMIT :limit', [':limit' => $_POST['rows']]);
    }else{
        $users = db_fetchAll('SELECT username, email, created_at, role FROM users');
    }

    exportCSV($users);
}
?>

<form method="post" class="col-auto">
    <h1 class="h3 mb-3 font-weight-normal">Hány sort szeretne kiíratni?</h1>
    <input type="number" class="form-control" value="0" name="rows" id="rows" min="0" required>
    <h1 class="h3 mb-3 font-weight-normal text-muted">Írjon 0-t, ha mindet szeretné</h1>
    <button type="submit" class="btn btn-lg btn-primary h3 mb-3" name="submit" value="login">Submit</button>
</form>