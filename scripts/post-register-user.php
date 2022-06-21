<?php

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$success = false;

//db-class
//user-class

if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['confirm-password']) &&
    strlen($_POST['username']) > 0 &&
    strlen($_POST['password']) > 0 &&
    $_POST['password'] === $_POST['confirm-password']
) {
    $users_db = new UsersDatabase();

    $user = new User($_POST['username'], 'customer');
    $user->hash_password($_POST['password']);

    $existing_user = $users_db->get_one_by_username($_POST['username']);
    if ($existing_user) {
        die('Username is taken');
    } else {
        $success = $users_db->create($user);
    }
    // hasha password
    // anropa db->create_user
} else {
    die('Invalid input');
}

// felmedelande 
if ($success) {
    header("Location: /ws/pages/login.php");
} else {
    die('Error saving user');
}
