<?php

class ProductOrder

{
    public $id;
    public $product_id;
    public $order_id;

    public function __construct($order_id, $product_id, $id = 0)
    {
        if ($id > 0) {
            $this->id = $id;
        }

        $this->order_id = $order_id;
        $this->product_id = $product_id;
    }
}
