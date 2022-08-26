<?php
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$logged_in_user = $_SESSION["user"];

$orders_db = new OrdersDatabase();

$orders = $orders_db->get_order_by_user_id($logged_in_user->id);

Template::header("MAZA - Order page");
?>
<h2>My orders</h2>

<?php foreach ($orders as $order) : ?>

    <p>
        <b>Order (# <?= $order["order-id"] ?>)</b>
        [<?= $order["status"] ?>]
    </p>

<?php endforeach;


Template::footer();
