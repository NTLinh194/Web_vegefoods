<?php
    require_once('DBConfig.php');

    class handleEvent {
        private $db;

        public function __construct() {
            $this->db = new DBConnection();
        }

        //------------------------------------------------ ADMIN PRODUCT ------------------------------------------------//
        public function getProductInfo($pro_id) {
            $query = "SELECT * FROM products WHERE ProductID = $pro_id";
            $result = $this->db->selectData($query);
            return $result->fetch_assoc();
        }

        public function showProduct() {
            $query = "SELECT * FROM products JOIN categories ON categories.CategoryID = products.CategoryID";
            $result = $this->db->selectData($query);
            return $result;
        }

        public function insertProduct($pro_id, $pro_name, $pro_desc, $pro_image, $pro_quantity, $pro_price, $pro_oldprice, $cat_id, $pro_status) {
            $query = "INSERT INTO products (ProductName, ProductDesc, ProductImage, ProductQuantity, ProductPrice, OldPrice, CategoryID, ProductStatus) VALUES ('$pro_name', '$pro_desc', '$pro_image', '$pro_quantity', '$pro_price', '$pro_oldprice', '$cat_id', '$pro_status')";
            $result = $this->db->insertData($query);
            return $result;
        }

        public function updateProduct($pro_id, $pro_name, $pro_desc, $pro_image, $pro_quantity, $pro_price, $pro_oldprice, $cat_id, $pro_status) {
            $query = "UPDATE products SET ProductName='$pro_name', ProductDesc='$pro_desc', ProductImage='$pro_image', ProductQuantity='$pro_quantity', ProductPrice='$pro_price', OldPrice='$pro_oldprice', CategoryID='$cat_id', ProductStatus='$pro_status' WHERE ProductID='$pro_id'";
            $result = $this->db->updateData($query);
            return $result;
        }
    
        public function deleteProduct($pro_id) {
            $query = "DELETE FROM products WHERE ProductID='$pro_id'";
            $result = $this->db->deleteData($query);
            return $result;
        }

        //------------------------------------------------ ADMIN CATEGORY ------------------------------------------------//
        public function getCategoryInfo($cat_id) {
            $query = "SELECT * FROM categories WHERE CategoryID = $cat_id";
            $result = $this->db->selectData($query);
            return $result->fetch_assoc();
        }

        public function showCategory() {
            $query = "SELECT * FROM categories ORDER BY CategoryID ASC";
            $result = $this->db->selectData($query);
            return $result;
        }

        public function insertCategory($cat_id, $cat_name, $cat_status) {
            $query = "INSERT INTO categories (CategoryID, CategoryName, CategoryStatus) VALUES ('$cat_id', '$cat_name', '$cat_status')";
            $result = $this->db->insertData($query);
            return $result;
        }

        public function updateCategory($cat_id, $cat_name, $cat_status) {
            $query = "UPDATE categories SET CategoryName='$cat_name', CategoryStatus='$cat_status' WHERE CategoryID='$cat_id'";
            $result = $this->db->updateData($query);
            return $result;
        }
    
        public function deleteCategory($cat_id) {
            $query = "DELETE FROM categories WHERE CategoryID='$cat_id'";
            $result = $this->db->deleteData($query);
            return $result;
        }
    }
?>
