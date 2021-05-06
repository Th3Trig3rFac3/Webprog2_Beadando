<?php

function validate_user_reg(array $request){
    $error = [];
    if(empty($request['username'])){
        $error['username'][] = 'Username is empty';
    } else if(strlen($request['username']) < 6) {
        $error['username'][] = 'Username must be at least 6 characters';
    } else {
        $username = db_fetch('users', 'username LIKE :username', [':username' => $request['username']]);
        if($username){
            $error['username'][] = 'Username is already in use';
        }
    }

    //Többi szabály....

    if(empty($request['password'])){
        $error['password'][] = 'password is empty';
    } else if(strlen($request['password']) < 8) {
        $error['password'][] = 'password must be at least 8 characters';
    } else if ($request['password'] !== $request['password_confirmation']) {
        $error['password_confirmation'][] = 'Password and password confirmation does not match';
    }
    
    return $error;
}
