<?php
require_once __DIR__ . "/User.php";
require_once __DIR__ . "/Models.php";

session_start();

class Template
{
    public static function header($title)
    {
        $is_logged_in = isset($_SESSION['user']);
        $logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
        $is_admin = $is_logged_in && $logged_in_user->role == 'admin';

        $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title> <?= $title ?> - My Web Shop</title>
            <link rel="stylesheet" href="/ws/assets/style.css">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
            </style>
        </head>

        <body>
            <h1 style="text-align: center;"><?= $title ?></h1>
            <br><br>
            <div class="header">
                <nav class="navbar">
                    <a href="/ws/index.php">Home</a>
                    <a href="/ws/pages/products.php">Products</a>
                    <?php if ($is_logged_in) : ?>
                        <a href="/ws/pages/orders.php">My orders</a>
                    <?php endif; ?>


                    <?php if (!$is_logged_in) : ?>
                        <a href="/ws/pages/login.php">Log in</a>

                        <a href="/WS/pages/register.php">Register</a>

                    <?php elseif ($is_admin) : ?>
                        <a href="/ws/pages/admin.php">Admin area</a>
                    <?php endif; ?>
                </nav>

                <div class="login-status">
                    <?php if ($is_logged_in) : ?>
                        <p>
                            <b>Logged in as:</b>
                            <?= $logged_in_user->username ?>
                        </p>
                    <?php endif; ?>
                    <a href="/ws/pages/cart.php">Cart / <?= $cart_count ?></a>

                    <form class="logout-btn" action="/ws/scripts/post-logout.php" method="post">
                        <input class="logout-button" type="submit" value="Log out">
                    </form>
                </div>
            </div>



        <?php
    }

    public static function footer()
    { ?>
            <br>
            <hr>
            <br>
            <footer class="footer-template">
                Copyright Maria Rosario 2022
            </footer>
            <script src="/ws/assets/script.js"></script>
        </body>

        </html>
<?php
    }
}
