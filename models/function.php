<?php
    require_once('DBConfig.php');

    class handleEvent extends DBConnection {
        public function __construct() {
            parent::connect();
        }

        // Phương thức lấy dữ liệu
        public function selectData($query) {
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) { 
                return $result;
            } 
            else {
                return false;
            }
        }

        // Phương thức cập nhật dữ liệu
        public function updateData($query) {
            $result_update = $this->conn->query($query);

            if ($result_update) {
                return $result_update;
            } 
            else {
                return false;
            }
        }

        // Phương thức thêm mới dữ liệu
        public function insertData($query) {
            $result_insert = $this->conn->query($query);

            if ($result_insert) {
                return $result_insert;
            } 
            else {
                return false;
            }
        }

        // Phương thức xóa dữ liệu
        public function DeleteData($query) {
            $result_delete = $this->conn->query($query);

            if ($result_delete) {
                return $result_delete;
            } 
            else {
                return false;
            }
        }

        // Phương thức thực thi lệnh truy vấn
        public function execute($query) {
            $result = $this->conn->query($query);

            if ($result == false) {
                return false;
            }
            else {
                return true;
            }
        }

        // Khắc phục lỗi cú pháp
        public function escape_string($value) {
            $result = $this->conn->real_escape_string($value); // Sửa thành real_escape_string
            return $result;
        }
    }
?>
