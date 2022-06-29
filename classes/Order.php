<?php

class Order
{
    public $id;
    public $user_id;
    public $status;
    public $order_date;

    public function __construct($user_id, $status, $order_date, $id = 0)
    {
        if ($id > 0) {
            $this->id = $id;
        }
        $this->user_id = $user_id;
        $this->status = $status;
        $this->order_date = $order_date;
    }
}
