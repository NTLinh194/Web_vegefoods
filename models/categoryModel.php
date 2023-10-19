<?php
    require_once('DBConfig.php');
    require_once('function.php');

    class categories {
        public function __construct() {
            $db = new DBConnection();
        }

        public function insert_category($CategoryID, $CategoryName) {
            $query = "INSERT INTO categories (CategoryID, CategoryName) VALUES($CategoryID, $CategoryName)";
            $result = $db->query($query);
            return $result;
        }

        public function select_category($CategoryID) {
            $query = "SELECT * FROM categories WHERE CategoryID = '$CategoryID'";
            $result = $db->query($query);
            return $result;
        }

        public function update_category($CategoryID, $CategoryName) {
            $query = "UPDATE categories SET CategoryName = '$CategoryName' WHERE CategoryID = '$CategoryID'";
            $result = $db->query($query);
            return $result;
        }

        public function delete_category($CategoryID) {
            $query = "DELETE FROM categories WHERE CategoryID = '$CategoryID'";
            $result = $db->query($query);
            return $result;
        }
    }
?>