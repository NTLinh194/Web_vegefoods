<?php
// class Database {
//     private $conn;

//     private $db_host = "localhost";
//     private $db_username = "root"; 
//     private $db_password = "";
//     private $db_name = "your_database"; // Thay thế bằng tên cơ sở dữ liệu MySQL của bạn

//     public function connect() {
//         $this->conn = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);

//         if ($this->conn->connect_error) {
//             die("Lỗi kết nối đến MySQL: " . $this->conn->connect_error);
//         }

//         // Đặt bộ mã kết nối UTF-8
//         $this->conn->set_charset("utf8");

//         return $this->conn;
//     }

//     public function executeQuery($sql) {
//         $result = $this->conn->query($sql);

//         if (!$result) {
//             die("Lỗi truy vấn SQL: " . $this->conn->error);
//         }

//         return $result;
//     }

//     // Phương thức lấy dữ liệu 
//     public function getData() {
//         if($this->result) {
//             $data = mysqli_fetch_array($this->result);
//         }
//         else {
//             $data = 0;
//         }
//         return $data;
//     }

//     // Phương thức lấy toàn bộ dữ liệu
//     public function getAllData() {
//         if(!$this->result) {
//             $data = 0;
//         }
//         else {
//             while($datas = $this->getData()) {
//                 $data[] = $datas;
//             }
//         }
//         return $data;
//     }

//     // Phương thức lấy THÊM dữ liệu
//     public function insertData($namepro, $types) {
//         $sql = "INSERT INTO Product(id, namepro, types)VALUES(null, '$namepro', '$types)";
//         return $this->executeQuery($sql);
//     }

//     // Phương thức lấy SỬA dữ liệu
//     public function updateData($id, $namepro, $types) {
//         $sql = "UPDATE Product SET namepro = '$namepro', types = '$types' WHERE id = '$id'";
//         return $this->executeQuery($sql);
//     }

//     // Phương thức lấy XÓA dữ liệu
//     public function deleteData($id) {
//         $sql = "DELETE FROM Product WHERE id = '$id'";
//         return $this->executeQuery($sql);
//     }

//     public function closeConnection() {
//         $this->conn->close();
//     }
// }

// // Sử dụng lớp Database để kết nối và thực hiện các truy vấn SQL
// $database = new Database();
// $conn = $database->connect();

    $conn = mysqli_connect("localhost","root","","web_food");
    if(!$conn) {
        die("Failed to connect".mysqli_connect_error());
    }
    else {
        echo "Connection established";
    }
?>



