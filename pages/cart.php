<?php

require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Template.php";

$products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

Template::header('Cart'); ?>

<div class="cart-container">

    <?php if (!$products) : ?>
        <h3>Your cart is empty..</h3>

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

            <input type="submit" value="Place order">
        </form>
    <?php endif ?>
</div>



<?= Template::footer(); ?>