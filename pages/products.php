<?php
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/Template.php";

$products_db = new ProductsDatabase();
$products = $products_db->get_all();

Template::header('MAZA - Products'); ?>
<h2 class="sub-header-text">Products</h2>
<div class="products-container">

    <?php
    foreach ($products as $product) : ?>

        <div class="product-card">

            <div class="product-img">
                <img src="<?= $product->img_url ?>" alt="product-img">
            </div>

            <br>
            <div class="product-info">

                <h2 style="font-weight: bold;"><?= $product->title ?></h2>
                <h2><span style="font-size: 1.20rem; font-weight: 300; color:grey"><?= $product->price ?> kr
                    </span></h2>

                <div class="product-description">
                    <p><?= $product->description ?></p>
                </div>
            </div>

            <form action="/ws/scripts/post-add-to-cart.php" method="post">
                <input type="hidden" name="product-id" value="<?= $product->id ?>">
                <input class="buy-btn" type="submit" value="Add to cart">
            </form>
        </div>


    <?php
    endforeach; ?>
</div>

<?php
Template::footer();
