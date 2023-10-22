<?php
    require_once('DBConfig.php');

    class handleEvent {
        private $db;

        public function __construct() {
            $this->db = new DBConnection();
        }

        // ADMIN
        public function showProduct() {
            $query = "SELECT * FROM Products ORDER BY ProductID ASC";
            $result = $this->db->selectData($query);
            return $result;
        }

        public function insertProduct($pro_name, $pro_price, $pro_status) {
            $query = "INSERT INTO products (ProductName, ProductPrice, ProductStatus) VALUES ('$pro_name', '$pro_price', '$pro_status')";
            $result = $this->db->insertData($query);
            return $result;
        }

        public function updateProduct($pro_id, $pro_name, $pro_price, $pro_status) {
            $query = "UPDATE products SET ProductName='$pro_name', ProductPrice='$pro_price', ProductStatus='$pro_status' WHERE ProductID='$pro_id'";
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
