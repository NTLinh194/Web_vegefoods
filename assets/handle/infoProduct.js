
document.querySelectorAll('.product-link').forEach(function (link) {
    link.addEventListener('click', function (event) {
        event.preventDefault();
        var productId = link.getAttribute('data-product-id');
        loadProductInfo(productId);
    });
});

function loadProductInfo(productId) {
    // Sử dụng Ajax để tải thông tin sản phẩm
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Khi dữ liệu được tải xong, hiển thị nó trong trang info-product.php
            document.location.href = 'info-product.php?product_id=' + productId;
        }
    };
    xhr.open('GET', 'get-product-info.php?product_id=' + productId, true);
    xhr.send();
}
