<?php

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Order.php";
require_once __DIR__ . "/ProductOrder.php";


class OrdersDatabase extends Database
{
    // Create
    public function create(Order $order)
    {
        $query = "INSERT INTO orders (`user-id`, `status`, `order-date`) VALUES (?,?,?)";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("iss", $order->user_id, $order->status, $order->order_date);

        $success = $stmt->execute();

        return $success;
    }

    // Get all
    public function get_all_orders()
    {
        $query = "SELECT * FROM orders";

        $result = mysqli_query($this->conn, $query);

        $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $orders = [];

        foreach ($db_orders as $db_order) {
            $user_id = $db_order["user-id"];
            $status = $db_order["status"];
            $order_date = $db_order["order-date"];
            $id = $db_order["id"];

            $orders[] = new Order($user_id, $status, $order_date, $id);
        }

        return $orders;
    }

    // Get by user id 
    public function get_order_by_user_id($user_id)
    {
        $query = "SELECT *, orders.id AS `order-id` FROM `orders`
        JOIN users ON users.id = orders.`user-id`
        WHERE orders.`user-id` = ? ORDER BY `order-id`";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $user_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $orders;
    }

    // Get order by id
    public function get_order_by_id($id)
    {
        $query = "SELECT * FROM orders WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_order = mysqli_fetch_assoc($result);

        $order = null;

        if ($db_order) {
            $db_id = $db_order["id"];
            $db_user_id = $db_order["user-id"];
            $db_status = $db_order["status"];
            $db_order_date = $db_order["order-date"];

            $order = new Order($db_user_id, $db_status, $db_order_date, $db_id);
        }

        return $order;
    }
}
