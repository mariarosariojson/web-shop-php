<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Product.php";

class ProductsDatabase extends Database
{
    // get_one
    public function get_one($id)
    {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $db_product = mysqli_fetch_assoc($result);
        $product = null;

        if ($db_product) {
            $product = new Product(
                $db_product["title"],
                $db_product["description"],
                $db_product["price"],
                $db_product["img-url"],
                $id
            );
        }
        return $product;
    }


    // get_all
    public function get_all()
    {
        $query = "SELECT * FROM products";
        $result = mysqli_query($this->conn, $query);
        $db_products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $products = [];

        foreach ($db_products as $db_product) {
            $db_id = $db_product['id'];
            $db_title = $db_product['title'];
            $db_description = $db_product['description'];
            $db_price = $db_product['price'];
            $db_img_url = $db_product['img-url'];

            $products[] = new Product($db_title, $db_description, $db_price, $db_img_url, $db_id);
        }
        return $products;
    }

    // create
    public function create(Product $product)
    {
        $query = "INSERT INTO products (title, `description`, price, `img-url`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("ssis", $product->title, $product->description, $product->price, $product->img_url);
        $success = $stmt->execute();
        return $success;
    }

    // update
    public function update(Product $product, $id)
    {
        $query = "UPDATE products SET title = ?, `description` = ?, price = ?, `img-url` = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param(
            "ssisi",
            $product->title,
            $product->description,
            $product->price,
            $product->img_url,
            $id
        );
        return $stmt->execute();
    }

    // delete
    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
