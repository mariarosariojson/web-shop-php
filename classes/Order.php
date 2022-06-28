<?php

class Order
{
    public $id;
    public $customer_id;
    public $status;
    public $order_date;

    public function __construct($customer_id, $status, $order_date, $id = 0)
    {
        if ($id > 0) {
            $this->id = $id;
        }
        $this->customer_id = $customer_id;
        $this->status = $status;
        $this->order_date = $order_date;
    }
}
