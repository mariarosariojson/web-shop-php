<?php
require_once __DIR__ . '/../classes/Template.php';

Template::header("Register");
?>
<div class="register-container">
    <form action="/ws/scripts/post-register-user.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="username">Username</label>
            </div>
            <div class="col-75">
                <input type="text" id="username" name="username" placeholder="Username..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="password">Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Password.."><br>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="password">Confirm password</label>
            </div>
            <div class="col-75">
                <input type="password" name="confirm-password" placeholder="Confirm password.."><br>
                <input type="submit" value="Register">

            </div>
        </div>

    </form>



</div>
<br>

<?php
Template::footer();
?>