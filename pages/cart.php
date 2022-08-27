<?php

require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";

$products_db = new ProductsDatabase();
$products = $products_db->get_all();
$products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];


Template::header('MAZA - Cart'); ?>
<h2 class="sub-header-text">Cart</h2>

<div class="cart-container">
    <?php if (!$products) : ?>

        <div class="empty-cart">

            <h3 class="cart-empty-text">Your cart is empty</h3>

            <form class="back-button-form" action="http://localhost:8888/ws/index.php">
                <input class="back-button" type="submit" value="Return to Store" />
            </form>
        </div>

    <?php elseif ($_SESSION["cart"]) : ?>


        <form class="products-cart-form" action="/ws/scripts/post-place-order.php" method="post">
            <div class="cart-title">
                <p>Product</p>
                <p>Qty</p>
                <p>Price</p>
                <p>Total</p>
            </div>
            <?php foreach ($products as $product) : ?>
                <hr>
                <br>
                <div class="cart">

                    <div class="products-cart">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <img class="products-cart-img" src="<?= $product->img_url ?>" alt="product-img">
                    </div>

                    <div class="cart-product_info">
                        <h3><?= $product->title ?></h3>
                        <p><input class="cart-qty" type="number" placeholder="0"></p>
                        <p><?= $product->price ?> kr</p>
                        <p><?= $product->price ?> kr</p>
                    </div>
                </div>
                <br>

            <?php endforeach ?>
            <br>
            <p class="cart-total">Total: <?= $product->price ?> kr</p>
            <input class="cart-button" type="submit" value="Place order">
        </form>
    <?php endif ?>
</div>



<?= Template::footer(); ?>