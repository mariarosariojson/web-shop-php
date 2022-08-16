<?php

require_once __DIR__ . "/../classes/Template.php";

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$users_db = new UsersDatabase();

$user = $users_db->get_one_by_username($_GET["id"]);

Template::header("user {$_GET["id"]}", "");

?>

<div>
    <p>Id: <?= $user->id ?></p>
    <p>Username: <?= $user->username ?></p>
    <p>Role: <?= $user->role ?></p>
</div>

<?php
Template::footer();
