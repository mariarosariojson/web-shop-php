<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && $logged_in_user->role == 'admin';

if (!$is_admin) {
    http_response_code(401);
    die('Access denied');
}

$prducts_db = new ProductsDatabase();
$users_db = new UsersDatabase();

$users = $users_db->get_all();
$products = $prducts_db->get_all();

Template::header("Welcome to the Admin area!"); ?>

<br>
<div class="admin-container">

    <h2>
        Create product
    </h2>

    <form action="/ws/admin-scripts/post-create-product.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="number" name="price" placeholder="Price"><br>
        <input type="file" name="image" accept="image/*"><br>
        <input type="submit" value="Save">
    </form>

    <div>
        <h3>Products</h3>
        <br>
        <?php foreach ($products as $product) : ?>
            <p>
                <a href="/ws/pages/admin-product.php?id=<?= $product->id ?>">
                    <?= $product->title ?></a>
            </p>
        <?php endforeach; ?>

        <br>
        <h3>Users</h3>

        <?php foreach ($users as $user) : ?>
            <p>
                <a href="/ws/pages/admin-user.php?id=<?= $user->id ?>"><?= $user->username ?></a>
                <span><?= $user->role ?></span>
            </p>
        <?php endforeach; ?>
        <br>
    </div>
</div>

<?php
Template::footer();
