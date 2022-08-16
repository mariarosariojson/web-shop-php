<?php

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

require_once __DIR__ . "/force-admin.php";

$success = false;

if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    isset($_POST['confirm-password']) &&
    isset($_POST['role']) &&

    strlen($_POST['username']) > 0 &&
    strlen($_POST['password']) > 0 &&

    $_POST['password'] === $_POST['confirm-password']
) {
    $user = new User(
        $_POST['username'],
        $_POST['role']
    );
    $user->hash_password($_POST['password']);

    $users_db = new UsersDatabase();
    $success = $users_db->create($user);
} else {
    die('Invalid input');
}

if ($success) {
    header("Location: /ws/pages/admin.php");
} else {
    die('Error saving user');
}
