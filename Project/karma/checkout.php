<?php
require "partial/navbar.php";
require "connection/connection.php";
?>


<?php

// For Total Price
$subTotalQuery = 'SELECT ROUND(SUM(products.prod_price * cart.quantity),2) as subTotal FROM `cart` JOIN products ON products.prod_id = cart.prod_id WHERE user_id = 3';

$subTotalPrepare = $connect->prepare($subTotalQuery);
$subTotalPrepare->execute();
$subTotal = $subTotalPrepare->fetch(PDO::FETCH_ASSOC);


//For Products
$cartViewQuery = 'SELECT * FROM `cart` JOIN products ON products.prod_id = cart.prod_id WHERE user_id = 3';
$cartViewPrepare = $connect->prepare($cartViewQuery);
$cartViewPrepare->execute();
$cartData = $cartViewPrepare->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($cartData);
    echo "</pre>";




if(isset($_POST['payBtn']))
{


    $isOrderSuccessfull = false;

    foreach($cartData as $orderData)
    {
        $ordersQuery = 'INSERT INTO `orders`(`user_id`, `prod_id`, `quantity`) VALUES (:userId, :prodId, :quantity)';
        $ordersPrepare = $connect->prepare($ordersQuery);
        $ordersPrepare->bindValue(':userId',3,PDO::PARAM_INT);
        $ordersPrepare->bindParam(':prodId',$orderData['prod_id'],PDO::PARAM_INT);
        $ordersPrepare->bindParam(':quantity',$orderData['quantity'],PDO::PARAM_INT);
        $ordersPrepare->execute();
        $isOrderSuccessfull = true;
    }

    if($isOrderSuccessfull)
    {
        $deleteQuery = 'DELETE FROM `cart` WHERE user_id = :userId';
        $deletePrepare = $connect->prepare($deleteQuery);
        $deletePrepare->bindValue(':userId',3, PDO::PARAM_INT);
        $deletePrepare->execute();
        echo "<script>alert('Your order sucessfully placed')</script>";

    }
    else
    {
        echo "<script>alert('Order is not placed')</script>";
        
    }






}








?>






<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">

        <div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="tp_btn" href="#">Apply Coupon</a>
        </div>
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Payment Details</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">

                        <div class="col-md-12 form-group p_star">
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Card Number">

                           
                        </div>


                        <div class="col-md-4 form-group p_star">
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Cvv">

                        </div>
                        <div class="col-md-8 form-group p_star">
                            <input type="date" class="form-control" id="add1" name="add1">
                         
                        </div>
                        <div class="col-md-12 form-group">
                            <a href="#" class="primary-btn">Change Address</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            <?php foreach($cartData as $cData){ ?>
                            <li><a href="#"><?= mb_strimwidth($cData['prod_name'] , 0, 15, "...") ?> <span class="middle">x <?= $cData['quantity'] ?></span> <span class="last">$<?= $cData['quantity'] * $cData['prod_price'] ?></span></a></li>
                                <?php } ?>
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>$<?= $subTotal['subTotal'] ?></span></a></li>
                            <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                            <li><a href="#">Total <span><?= $subTotal['subTotal'] + 50 ?></span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector">
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                Store Postcode.</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector">
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <form method="post">
                            <input class="primary-btn" type="submit" value="Pay Now" name="payBtn"></input>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->

<?php
require "partial/footer.php"
?>