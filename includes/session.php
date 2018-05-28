<?php

session_start();

function session_has_user() {
    return isset($_SESSION['username']) && !empty($_SESSION['username']);
}

function session_get_user() {
    return session_has_user() ? $_SESSION['username'] : null;
}

function session_set_user($username) {
    $_SESSION['username'] = $username;
}

if (session_has_user() && in_array(basename($_SERVER['SCRIPT_NAME']), array('index.php', 'register.php'))) {
    header('Location: files.php');
    exit;
}

if (!session_has_user() && !in_array(basename($_SERVER['SCRIPT_NAME']), array('index.php', 'register.php'))) {
    header('Location: index.php');
    exit;
}
