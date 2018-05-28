<?php

function user_authenticate($identity, $credential) {
    $users = user_get_all_users();

    foreach ($users as $username => $password) {
        if ($username == $identity && $password == $credential) {
            return $username;
        }
    }

    return false;
}

function user_get_all_users() {
    $users = array();

    if (is_file(USERS_DATAFILE)) {
        if (($handle = fopen(USERS_DATAFILE, "r")) != false) {
            while (($data = fgetcsv($handle, 0, ",")) != false) {
                $users[$data[0]] = $data[1];
            }
            fclose($handle);
        }
    }

    return $users;
}

function user_exists($username) {
    return array_key_exists($username, user_get_all_users());
}

function user_register($username, $password) {
    $handle = fopen(USERS_DATAFILE, 'a');
    
    fputcsv($handle, array($username, $password));
    
    fclose($handle);
    
    return true;
}
