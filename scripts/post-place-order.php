<?php
// BYTTE NAMN PÅ CUSTOMER-ID TILL USER-ID

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Order.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";

session_start();

$success = false;

if (isset($_POST["id"]) && isset($_SESSION["user"])) {
    $product_id = $_POST["id"];

    $user = $_SESSION["user"];

    $orders_db = new OrdersDatabase();

    $current_date = date("Y-m-d");

    $status = "Pending";

    $order = new Order($user->id, $status, $current_date);

    $success = $orders_db->create($order);
} else {
    die("You need to be logged in to place an order");
}

if ($success) {
    $_SESSION["cart"] = null;
    header("location: /ws/pages/orders.php");
} else {
    die("Error placing order");
}
