<?php

require_once __DIR__ . "/../classes/Template.php";

require_once __DIR__ . "/../classes/Order.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";

$orders_db = new OrdersDatabase();

$order = $orders_db->get_order_by_id($_GET["id"]);

Template::header("Order {$_GET["id"]}", "");

?>

<div>
    <p>ID: <?= $order->id ?></p>
    <p>Customer ID: <?= $order->user_id ?></p>
    <p>Status: <?= $order->status ?></p>
    <p>Order date: <?= $order->order_date ?></p>
</div>






<div>
    <?php if ($order->status == "sent") : ?>
        <form action="/ws/admin-scripts/post-update-order.php" method="POST">
            <label>Status: <?= $order->status ?></label>
        </form>
    <?php else : ?>
        <form action="/ws/admin-scripts/post-update-order.php" method="POST">
            <label>Mark as sent</label> <br>
            <input type="hidden" name="id" value="<?= $order->id ?>">
            <input type="checkbox" name="status">
            <input type="submit" value="Send">
        </form>
    <?php endif ?>
</div>






<?php
Template::footer();
