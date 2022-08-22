<?php
require_once __DIR__ . "/../classes/Template.php";

Template::header("Login");
if (isset($_GET['register']) && $_GET['register'] == 'success') {
    echo '<h2>User created, please log in!</h2>';
}
?>
<?php
if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials') : ?>
    <br>
    <p class="invalid-credentials">Invalid username or password!</p>
<?php endif; ?>

<div class="login-container">
    <form action="/ws/scripts/post-login.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="username">Username</label>
            </div>
            <div class="col-75">
                <input type="text" name="username" placeholder="Username.."><br>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="password">Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Password.."> <br>
                <input type="submit" value="Login">
            </div>
        </div>
    </form>
</div>











<?php
Template::footer();
