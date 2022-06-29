<?php

require_once __DIR__ . "/../classes/Template.php";

require_once __DIR__ . "/../classes/Order.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";

$orders_db = new OrdersDatabase();

$order = $orders_db->get_order_by_id($_GET["id"]);

Template::header("Order {$_GET["id"]}", "");

?>

<div>
    <p>Id: <?= $order->id ?></p>
    <p>Status: <?= $order->status ?></p>
    <p>Order date: <?= $order->order_date ?></p>
</div>

<?php
Template::footer();
