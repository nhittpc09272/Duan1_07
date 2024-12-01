<?php

namespace App\Models;

class ProductVariants extends BaseModel
{
    protected $table = 'product_variants'; // Table name
    protected $id = 'variant_id'; // Primary key column

    // Constants for status
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    // Fetch all variants for a given product
    public function getVariantsByProductId($productId)
    {
        $result = [];
        try {
            $sql = "SELECT variant_id, size, color, status FROM $this->table WHERE product_id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $productId);
            $stmt->execute();
            $query_result = $stmt->get_result();
            $result = $query_result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Error fetching product variants: ' . $th->getMessage());
        }
        return $result;
    }

    // Add a new variant
    public function addVariant($productId, $size, $color, $status = self::STATUS_ENABLE)
    {
        $data = [
            'product_id' => $productId,
            'size' => $size,
            'color' => $color,
            'status' => $status
        ];
        return $this->create($data);
    }

    // Update an existing variant
    public function updateVariant($variantId, $size, $color, $status)
    {
        $data = [
            'size' => $size,
            'color' => $color,
            'status' => $status
        ];
        return $this->update($variantId, $data);
    }

    // Delete a variant
    public function deleteVariant($variantId)
    {
        return $this->delete($variantId);
    }
}

