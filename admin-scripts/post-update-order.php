<?php

require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/Order.php";
require_once __DIR__ . "/force-admin.php";

$success = false;

if (isset($_POST["status"]) && isset($_POST["id"])) {
    $orders_db = new OrdersDatabase();

    $success = $orders_db->update_order("sent", $_POST["id"]);
} else {
    die("Error updating order");
}

if ($success) {
    header('Location: /ws/pages/admin.php');
}
