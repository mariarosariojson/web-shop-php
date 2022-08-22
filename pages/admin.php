<?php
require_once __DIR__ . '/../classes/Template.php';

require_once __DIR__ . "/../classes/User.php";
require_once __DIR__ . "/../classes/Order.php";

require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';
require_once __DIR__ . '/../classes/OrdersDatabase.php';

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && $logged_in_user->role == 'admin';

if (!$is_admin) {
    http_response_code(401);
    die('Access denied');
}

$products_db = new ProductsDatabase();
$users_db = new UsersDatabase();
$orders_db = new OrdersDatabase();


$users = $users_db->get_all();
$products = $products_db->get_all();
$orders = $orders_db->get_all_orders();



Template::header("Welcome to the Admin area!"); ?>

<br>
<div class="admin-container">
    <div class="product-section">
        <div class="create">
            <h2>Create product</h2>
            <form action="/ws/admin-scripts/post-create-product.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-25">
                        <label for="title">Title</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="title" name="title" placeholder="Product title..">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="price">Price</label>
                    </div>
                    <div class="col-75">
                        <input type="number" name="price" placeholder="Price.."><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="description">Description</label>
                    </div>
                    <div class="col-75">
                        <textarea id="description" name="description" placeholder="Description.." style="height:200px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="img">Image</label>
                    </div>
                    <div class="col-75">
                        <input type="file" name="image" accept="image/*"><br>
                    </div>
                </div>

                <div class="row">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
        <div class="list">
            <h2>Products</h2>
            <br>
            <?php foreach ($products as $product) : ?>
                <ul>
                    <li>
                        <a href="/ws/pages/admin-product.php?id=<?= $product->id ?>">
                            <?= $product->title ?></a>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="user-section">
        <div class="create">

            <h2>Create new user</h2>
            <form action="/ws/admin-scripts/post-create-user.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-75">
                        <input type="password" name="password" placeholder="Password"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="password">Confirm password</label>
                    </div>
                    <div class="col-75">
                        <input type="password" name="confirm-password" placeholder="Confirm password"><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="role">Role</label>
                    </div>
                    <div class="col-75">
                        <select id="role" name="role">
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <input type="submit" value="Save">
                </div>
            </form>

        </div>
        <div class="list">

            <h2>Users</h2>
            <br>
            <?php foreach ($users as $user) : ?>

                <ul>
                    <li>
                        <a href="/ws/pages/admin-update-user.php?username=<?= $user->username ?>"><?= $user->username ?></a>
                        <span>[<?= $user->role ?>]</span>
                    </li>

                </ul>
            <?php endforeach; ?>
            <br>
        </div>
    </div>
    <div class="orders-section ">

        <h2>Orders</h2>
        <br>
        <?php foreach ($orders as $order) : ?>
            <div>
                <p>
                    <a href="admin-single-order.php?id=<?= $order->id ?>">Order #<?= $order->id ?> [<?= $order->status ?>]</a>
                </p>
            </div>

        <?php endforeach; ?>
    </div>
    <br>
</div>

<?php
Template::footer();
