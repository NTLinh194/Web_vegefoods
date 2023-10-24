<?php
    require_once('DBConfig.php');

    class handleEvent {
        private $db;

        public function __construct() {
            $this->db = new DBConnection();
        }

        // ADMIN
        public function getProductInfo($pro_id) {
            $query = "SELECT * FROM Products WHERE ProductID = $pro_id";
            $result = $this->db->selectData($query);
            return $result->fetch_assoc();
        }

        public function showProduct() {
            $query = "SELECT * FROM Products ORDER BY ProductID ASC";
            $result = $this->db->selectData($query);
            return $result;
        }

        public function insertProduct($pro_id, $pro_name, $pro_desc, $pro_image, $pro_price, $pro_oldprice, $pro_status) {
            $query = "INSERT INTO products (ProductName, ProductDesc, ProductImage, ProductPrice, OldPrice, ProductStatus) VALUES ('$pro_name', '$pro_desc', '$pro_image', '$pro_price', '$pro_oldprice', '$pro_status')";
            $result = $this->db->insertData($query);
            return $result;
        }

        public function updateProduct($pro_id, $pro_name, $pro_desc, $pro_image, $pro_price, $pro_oldprice, $pro_status) {
            $query = "UPDATE products SET ProductName='$pro_name', ProductDesc='$pro_desc', ProductImage='$pro_image', ProductPrice='$pro_price', OldPrice='$pro_oldprice', ProductStatus='$pro_status' WHERE ProductID='$pro_id'";
            $result = $this->db->updateData($query);
            return $result;
        }
    
        public function deleteProduct($pro_id) {
            $query = "DELETE FROM products WHERE ProductID='$pro_id'";
            $result = $this->db->deleteData($query);
            return $result;
        }
    }
?>
