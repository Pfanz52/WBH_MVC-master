<?php

/**
* Lớp Model giúp xử lý các truy vấn cơ sở dữ liệu
*/
class Model
{
    protected $conn;

    function __construct()
    {
        try {
            // Cập nhật kết nối với cổng 3307 nếu cần thiết
            $this->conn = new PDO("mysql:host=localhost;port=3307;dbname=".DB_NAME.";charset=UTF8;SET time_zone = 'Asia/Ho_Chi_Minh'", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Cấu hình báo lỗi PDO
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die(); // Dừng chương trình nếu không thể kết nối
        }
    }

    function insert($table, $value, $row = null)
    {
        if ($row != null) {
            $row = rtrim(implode(',', $row), ',');
        }
        $placeholders = implode(',', array_fill(0, count($value), '?')); // Sử dụng ? để chuẩn bị tham số
        $sql = "INSERT INTO $table ($row) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);

        try {
            if ($stmt->execute($value)) {
                return 1; // Thành công
            }
        } catch(PDOException $e) {
            echo "Lỗi: ".$e->getMessage(); // Hiển thị thông báo lỗi
            return 0; // Thất bại
        }
    }

    function update($table, $setRow, $setVal, $cond)
    {
        $set = '';
        for ($i = 0; $i < count($setRow); $i++) {
            $set .= $setRow[$i].' = ?,';
        }
        $set = rtrim($set, ',');
        $sql = "UPDATE $table SET $set WHERE $cond";
        $stmt = $this->conn->prepare($sql);

        try {
            if ($stmt->execute($setVal)) {
                return 1; // Thành công
            }
        } catch(PDOException $e) {
            echo "Lỗi: ".$e->getMessage(); // Hiển thị thông báo lỗi
            return 0; // Thất bại
        }
    }

    function delete($table, $cond)
    {
        $sql = "DELETE FROM $table WHERE $cond";
        $stmt = $this->conn->prepare($sql);

        try {
            if ($stmt->execute()) {
                return 1; // Thành công
            }
        } catch(PDOException $e) {
            echo "Lỗi: ".$e->getMessage(); // Hiển thị thông báo lỗi
            return 0; // Thất bại
        }
    }

    function select($what, $table, $cond = null, $option = null)
    {
        $sql = "SELECT $what FROM $table";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        if ($option) {
            $sql .= " $option";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Sử dụng FETCH_ASSOC để chỉ lấy các cột
    }

    function exe_query($sql)
    {
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; // Trả về false khi có lỗi
        }
    }

    function getListMasp($sql)
    {
        $result = [];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        foreach ($data as $row) {
            $result[] = $row['masp']; // Lấy giá trị từ cột 'masp'
        }
        return $result;
    }

    function getLastInsertID()
    {
        return $this->conn->lastInsertId(); // Lấy ID của bản ghi vừa được thêm
    }

    function __destruct()
    {
        $this->conn = null; // Đóng kết nối khi đối tượng được hủy
    }
}
?>
