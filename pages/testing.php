<?php
require_once __DIR__ . '/../classes/Fruit.php';
require_once __DIR__ . '/../classes/Template.php';

Template::header("Test sida");
Fruit::info_about_fruits(5);

$my_fruit = new Fruit('Apple', 'Red');
$my_fruit->price = 25;
// $my_fruit->name = 'Orange';
// $my_fruit->name = 'Apple';
// $my_fruit->color = 'Red';
$my_fruit->intro();
?>
<br>
<?php
$my_strawberry = new Strawberry("Strawberry", "Red", 250);
$my_strawberry->price = 10;

$my_strawberry->intro();
$my_strawberry->message();

Template::footer();
