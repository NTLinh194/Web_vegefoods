<?php
    include '../../../models/function.php';

    $product = new handleEvent();

    if (isset($_GET['product_id'])) {
        $pro_id = $_GET['product_id'];
    
        // Gọi hàm xóa sản phẩm
        $result = $product->deleteProduct($pro_id);
    
        if ($result) {
            header("Location: createProduct.php");
        } else {
            echo "Error deleting the product.";
        }
    }     
?>

<script>
function confirmDelete(element) {
    var product_id = element.getAttribute("data-product-id");
    if (confirm("Are you sure you want to delete this product?")) {
        // Nếu người dùng đồng ý xóa, chuyển hướng đến trang xóa sản phẩm
        window.location.href = element.href;
    } else {
        // Nếu người dùng nhấn hủy, không thực hiện hành động nào
        return false;
    }
}
</script>
