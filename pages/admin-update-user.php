<?php

require_once __DIR__ . "/../classes/Template.php";

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$username = $_GET["username"];

$db = new UsersDatabase();

$user = $db->get_one_by_username($username);

Template::header("Update user", "");

?>

<div>
    <p>Id: <?= $user->id ?></p>
    <p>Username: <?= $user->username ?></p>
    <p>Role: <?= $user->role ?></p>
</div>
<form action="/ws/admin-scripts/post-update-user.php" method="post">
    <input type="hidden" name="id" value="<?= $user->id ?>"> <br>
    <select name="role" id="role">
        <option value="role" selected disabled>Set role</option>
        <option value="admin">Admin</option>
        <option value="customer">User</option>
    </select>
    <br><br>
    <input type="submit" value="Save">
</form>


<form action="/ws/admin-scripts/post-delete-user.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $user->id ?>">
    <input type="submit" value="Delete user">
</form>





<hr>


<?php

Template::footer();
