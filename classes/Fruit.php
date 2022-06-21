<?php
class Fruit
{
    public $name;
    public $color;
    public $price;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro()
    {
        echo "Fruit name: {$this->name} is color {$this->color} and costs {$this->price}kr. <br>";
    }

    public static function info_about_fruits($count)
    {
        echo "Fruits are good to eat and easy to throw away and there are only {$count} left! <br>";
    }
}

class Strawberry extends Fruit
{
    public $berryness;

    public function __construct($name, $color, $berryness)
    {
        $this->name = $name;
        $this->color = $color;
        $this->berryness = $berryness;
    }

    public function message()
    {
        echo "I am a strawberry!";
    }
}
