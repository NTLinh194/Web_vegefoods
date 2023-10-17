<?php
    // $conn = mysqli_connect("localhost","root","","web_food");
    // if(!$conn) {
    //     die("Failed to connect".mysqli_connect_error());
    // }
    // else {
    //     echo "Connection established";
    // }

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
    }
    
?>



