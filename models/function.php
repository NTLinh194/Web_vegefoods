<?php
require_once('DBConfig.php');

class handleEvent extends DBConnection {
    public function __construct() {
        parent::connect();
    }

    // Phương thức lấy dữ liệu
    public function getData($query) {
        $result = $this->conn->query($query);
        if ($result == false) {
            return false;
        }
        
        $rows = array(); // Sửa thành $rows để lưu dữ liệu

        while ($row = $result->fetch_assoc()) { // Sửa thành $result->fetch_assoc()
            $rows[] = $row;
        }
        return $rows;
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

    // Phương thức xóa dữ liệu
    public function Delete($id_pro, $table) {
        $sql = "DELETE FROM $table WHERE id_pro = '$id_pro'";
        $result = $this->conn->query($sql);

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
