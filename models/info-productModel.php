<?php 
    include 'function.php';

    $eventHandler = new handleEvent();

    if (isset($_GET['productID'])) {
        $pro_id = $_GET['productID'];

        $data = $eventHandler->getProductInfo($pro_id);
        if ($data === false) {
            echo "Error occurred while getting data.";
        }
        else {
            echo    '<div class="col-lg-6 mb-5 ftco-animate">
                        <a href="../assets/images/' . $data['ProductImage'] . '" class="image-popup">
                            <img src="../assets/images/' . $data['ProductImage'] . '" class="img-fluid" alt="Colorlib Template">
                        </a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3>' . $data['ProductName'] . '</h3>
                        <div class="rating d-flex">
                            <p class="text-left mr-4">
                                <a href="#" class="mr-2">5.0</a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                            </p>
                            <p class="text-left mr-4">
                                <a href="#" class="mr-2" style="color: #000;">100 <span
                                        style="color: #bbb;">Rating</span></a>
                            </p>
                            <p class="text-left">
                                <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                            </p>
                        </div>
                        <p class="price"><span>$' . number_format($data['OldPrice'], 3) . '</span></p>
                        <p>$' . $data['ProductDesc'] . '</p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Small</option>
                                            <option value="">Medium</option>
                                            <option value="">Large</option>
                                            <option value="">Extra Large</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
                                    min="1" max="100">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <p style="color: #000;">600 kg available</p>
                            </div>
                        </div>
                        <p><a href="cart.php" class="btn btn-black py-3 px-5">Add to Cart</a></p>
                    </div>';
        }
    }
    else {
        echo "ProductID không được cung cấp.";
    }
?>