<?php
    class DBConnection {
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "web_food";
    
        protected $conn;
    
        public function connect() {
            if (!isset($this->conn)) {
                $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    
                mysqli_set_charset($this->conn, 'utf8');
                if (!$this->conn) {
                    echo "Failed to connect";
                    exit;
                }
            }
            return $this->conn;
        }

        public function __construct() {
            $this->connect();
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
            $result = $this->conn->real_escape_string($value); 
            return $result;
        }
    }
?>


<!-- https://youtu.be/QxIxNjOCCDQ?si=IdbLEoEdapiThmYy  phut 17-->
