<?php

function validate_user_reg(array $request): array
{
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

    return $error;
}