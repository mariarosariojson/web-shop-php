<?php
require_once __DIR__ . '/../classes/Fruit.php';
require_once __DIR__ . '/../classes/Template.php';

Template::header("Register");
?>

<div class="register-container">

    <form action="/ws/scripts/post-register-user.php" method="post">
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="confirm-password" placeholder="Confirm password"><br>
        <input type="submit" value="Register">
    </form>
</div>
<br>

<?php
Template::footer();
?>