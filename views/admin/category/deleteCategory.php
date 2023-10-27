<?php
    include '../../../models/function.php';

    $category = new handleEvent();

    if (isset($_GET['category_id'])) {
        $cat_id = $_GET['category_id'];
    
        // Gọi hàm xóa sản phẩm
        $result = $category->deleteCategory($cat_id);
    
        if ($result) {
            header("Location: createCategory.php");
        } else {
            echo "Error deleting the product.";
        }
    }     
?>


