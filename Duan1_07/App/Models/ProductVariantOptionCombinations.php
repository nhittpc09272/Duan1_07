<?php

namespace App\Models;

use App\Models\Database;

class ProductVariantOptionCombinations
{
    public function getCombinationsByProductId($productId)
    {
        // Lấy kết nối MySQLi từ lớp Database
        $db = new Database();
        $conn = $db->MySQLi();  // Kết nối MySQLi

        // Câu truy vấn để kiểm tra xem sản phẩm có biến thể hay không
        $checkVariantsSql = "SELECT COUNT(*) AS total_variants FROM product_variants WHERE product_id = ?";
        $stmt = $conn->prepare($checkVariantsSql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $variantCount = $result->fetch_assoc()['total_variants'];

        // Nếu không có biến thể, trả về mảng rỗng
        if ($variantCount == 0) {
            $stmt->close();
            $conn->close();
            return [];  // Không có biến thể
        }

        // Câu truy vấn để lấy các kết hợp biến thể
        // Chỉnh sửa câu truy vấn cho đúng với các tên cột
        $sql = "
        SELECT pvo.product_variant_name, pv.product_id, pv.variant_id
        FROM product_variant_option_combinations pvoc
        JOIN product_variant_options pvo ON pvo.variant_id = pvoc.variant_id
        JOIN product_variants pv ON pv.variant_id = pvo.variant_id
        WHERE pv.product_id = ?
        ";

        $combinations = [];  // Khởi tạo mảng rỗng để chứa kết quả
        try {
            // Chuẩn bị và thực thi câu truy vấn
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $productId);  // Liên kết tham số
            $stmt->execute();
            $result = $stmt->get_result();

            // Kiểm tra nếu có kết quả
            if ($result->num_rows > 0) {
                $combinations = $result->fetch_all(MYSQLI_ASSOC);  // Lấy tất cả kết quả dưới dạng mảng kết hợp
            }

        } catch (\Exception $e) {
            // Log lỗi nếu có
            error_log("Lỗi khi lấy kết hợp biến thể sản phẩm: " . $e->getMessage());
        } finally {
            // Đảm bảo đóng kết nối
            if ($stmt) {
                $stmt->close();
            }
            if ($conn) {
                $conn->close();
            }
        }

        return $combinations;
    }
}
