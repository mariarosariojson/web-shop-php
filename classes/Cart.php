<?php
class Cart
{
    public $id;
    public $title;
    public $description;
    public $price;

    public function __construct($title, $description, $price, $img_url, $id = 0)
    {
        if ($id > 0) {
            $this->id = $id;
        }
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->img_url = $img_url;
    }
}
