<?php

class productModel extends Model
{
    function __construct()
    {
        parent::__construct(); // Khởi tạo kết nối trong lớp cha (Model)
    }

    function getPrds($orderBy, $start, $last, $where = null)
    {
        // Kiểm tra và xây dựng câu SQL
        if ($where === null) {
            $sql = "SELECT * FROM sanpham ORDER BY $orderBy DESC LIMIT $start, $last";
        } else {
            $sql = "SELECT * FROM sanpham WHERE $where ORDER BY $orderBy DESC LIMIT $start, $last";
        }

        $prd = [];
        try {
            // Thực thi câu lệnh và lấy kết quả
            foreach ($this->conn->query($sql) as $row) {
                $prd[] = $row;
            }
        } catch (PDOException $e) {
            echo "Lỗi: ".$e->getMessage(); // Nếu có lỗi xảy ra, hiển thị thông báo lỗi
        }
        return $prd;
    }

    function getPrdById($masp)
    {
        $sql = "SELECT * FROM sanpham WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);

        try {
            $stmt->execute([$masp]); // Sử dụng tham số để tránh SQL injection
            return $stmt->fetch(PDO::FETCH_ASSOC); // Lấy dữ liệu của sản phẩm theo masp
        } catch (PDOException $e) {
            echo "Lỗi: ".$e->getMessage(); // Hiển thị lỗi nếu có
            return null;
        }
    }
}
?>
