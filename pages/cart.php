<?php

require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";

$products_db = new ProductsDatabase();
$products = $products_db->get_all();
$products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

Template::header('a Clothing Store'); ?>

<h2 class="sub-header-text">Cart</h2>

<div class="cart-container">
    <?php if (!$products) : ?>
        <h3 class="cart-empty-text">Your cart is empty</h3>

        <form class="back-button-form" action="http://localhost:8888/ws/index.php">
            <input class="back-button" type="submit" value="Return to Store" />
        </form>

    <?php elseif ($_SESSION["cart"]) : ?>

        <form action="/ws/scripts/post-place-order.php" method="post">
            <?php foreach ($products as $product) : ?>
                <div class="product">
                    <input type="hidden" name="id" value="<?= $product->id ?>">
                    <img src="<?= $product->img_url ?>" alt="product-img" width="50px" height="50px"><br>
                    <h3><?= $product->title ?></h3>
                    <p><?= $product->price ?> kr</p>
                </div>
            <?php endforeach ?>

            <input class="cart-button" type="submit" value="Place order">
        </form>
    <?php endif ?>
</div>



<?= Template::footer(); ?>