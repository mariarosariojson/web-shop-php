<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && $logged_in_user->role == 'admin';

if (!$is_admin) {
    http_response_code(401);
    die('Access denied');
}

if (!isset($_GET['id'])) {
    die('Invalid input');
}

$products_db = new ProductsDatabase();

$product = $products_db->get_one($_GET['id']);

Template::header("Update product");

if ($product == null) :
?>
    <br>
    <h2>No product</h2>
<?php else : ?>

    <div class="admin-product-container">
        <form action="/ws/admin-scripts/post-update-product.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="title">Title</label>
                </div>
                <div class="col-75">
                    <input type="text" id="title" name="title" value="<?= $product->title ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="price">Price</label>
                </div>
                <div class="col-75">
                    <input type="number" name="price" placeholder="Price" value="<?= $product->price ?>"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="description">Description</label>
                </div>
                <div class="col-75">
                    <textarea name="description" placeholder="Description"><?= $product->description ?></textarea><br>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="img">Product image</label>
                </div>
                <div class="col-75">
                    <input type="file" name="image" accept="image/*"><br>
                    <input type="submit" value="Save">
                    <br>
                    <form action="/ws/admin-scripts/post-delete-product.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="submit" value="Delete item">
                    </form>

                </div>
            </div>
        </form>
    </div>

<?php
endif;
Template::footer();
