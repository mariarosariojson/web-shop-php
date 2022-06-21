<?php
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . "/../classes/Template.php";

$products_db = new ProductsDatabase();
$products = $products_db->get_all();

Template::header("Products");

foreach ($products as $product) : ?>

    <div class="products-container">
        <br>
        <div class="product">
            <img src="<?= $product->img_url ?>" alt="product-img" width="100px" height="100px"><br>
            <b><?= $product->title ?></b>
            <span><?= $product->price ?> kr</span>
            <p><?= $product->description ?></p>

            <form action="/ws/scripts/post-add-to-cart.php" method="post">
                <input type="hidden" name="product-id" value="<?= $product->id ?>">
                <input type="submit" value="Add to cart">
            </form>
        </div>
    </div>

<?php
endforeach;

Template::footer();
