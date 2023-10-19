<?php
    if(isset($_POST['act'])) {
        switch($_POST['act']) {
            case 'wishlist':
                include 'wishlist.php';
                break;
            case 'info-product':
                include 'info-product.php';
                break;
            case 'cart':
                include 'cart.php';
                break;
            case 'checkout':
                include 'checkout.php';
                break;
            case 'about':
                include 'about.php';
                break;
            case 'blog':
                include 'blog.php';
                break;
            case 'contact':
                include 'contact.php';
                break; 
    
            default:
                include 'home.php';
                break;
        }
    }

    else {
        include 'home.php';
    }
?>