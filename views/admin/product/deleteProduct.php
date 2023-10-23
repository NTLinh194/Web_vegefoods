<?php
    include '../../../models/function.php';

    $product = new handleEvent();

    if (isset($_GET['product_id'])) {
        $pro_id = $_GET['product_id'];
    
        // Gọi hàm xóa sản phẩm
        $result = $product->deleteProduct($pro_id);
    
        if ($result) {
            header("Location: createProduct.php");
            // Nếu muốn chuyển hướng sau khi xóa sản phẩm thành công, bạn có thể sử dụng header("Location: your_redirect_url.php");
        } else {
            echo "Error deleting the product.";
        }
    }     
?>