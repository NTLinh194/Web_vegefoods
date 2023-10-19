<?php
    require_once('DBConfig.php');
    require_once('function.php');

    $eventHandler = new handleEvent();

    $query = "SELECT * FROM Products";
    $data = $eventHandler->selectData($query);
    if ($data === false) {
        echo "Error occurred while getting data.";
    } 
    else {
        foreach ($data as $product) {
            echo    '<div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product" pid="">
                            <a href="info-product.php?productID=' . $product['ProductID'] . '" class="img-prod">
                                <img class="img-fluid" src="../assets/images/' . $product['ProductImage'] . '" alt="Colorlib Template">
                                <span class="status">30%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">' . $product['ProductName'] . '</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <span class="mr-2 price-dc">$' . number_format($product['OldPrice'], 3) . '</span>
                                            <span class="price-sale">$' . number_format($product['ProductPrice'], 3) . '</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart cart-js"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
    } 
?>



