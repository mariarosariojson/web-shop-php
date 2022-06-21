<?php

require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/Template.php";

$products = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

Template::header('Cart'); ?>

<div class="cart-container">
    <div id="product-details" hidden>
        <img src="" height="200px" width="200px" id="product-img">
        <p id="product-title"> </p>
        <p id="product-description"> </p>
        <p id="product-price"> </p>
    </div>

    <?php foreach ($products as $product) : ?>
        <br>
        <div class="product">
            <img src="<?= $product->img_url ?>" alt="product-img" width="50px" height="50px"><br>
            <h3><?= $product->title ?></h3>
            <p><?= $product->price ?> kr</p>
            <button data-id="<?= $product->id ?>" class="view-products-details">View</button>
        </div>
</div>


<?php
    endforeach;

    Template::footer();
