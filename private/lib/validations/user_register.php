<?php

function validate_user_reg(array $request): array {
    $error = [];
    if(empty($request['username'])){
        $error['username'][] = 'A felhasználónév mezőt kötelező kitölteni';
    } else if(strlen($request['username']) < 6) {
        $error['username'][] = 'Legalább 6 karakteres felhasználónevet adjon meg';
    } else {
        $username = db_fetch('users', 'username LIKE :username', [':username' => $request['username']]);
        if($username){
            $error['username'][] = 'A felhasználónév már foglalt';
        }
    }

    //Többi szabály....

    if(empty($request['password'])){
        $error['password'][] = 'A jelszó mezőt kötelező kitölteni';
    } else if(strlen($request['password']) < 8) {
        $error['password'][] = 'A jelszó legalább 8 karakter legyen';
    } else if ($request['password'] !== $request['password_confirmation']) {
        $error['password_confirmation'][] = 'Nem egyező jelszavak';
    }

    if(empty($request['email'])){
        $error['email'][] = 'Adjon meg egy e-mail címet';
    } else if(strlen($request['email']) < 7){
        $error['email'][] = 'Legalább 7 karakteres e-mail címet adjon meg';
    } else{
        $email = db_fetch('users', 'email LIKE :email', [':email' => $request['email']]);
        if($email){
            $error['email'][] = 'Ezzel az email címmel már regisztráltak';
        }
    }

    return $error;
}