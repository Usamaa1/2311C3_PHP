<?php
	require "partial/navbar.php";
    require "connection/connection.php";
?>


<?php 

    $cartViewQuery = 'SELECT * FROM `cart` JOIN products ON products.prod_id = cart.prod_id WHERE user_id = 3';
    $cartViewPrepare = $connect->prepare($cartViewQuery);
    $cartViewPrepare->execute();
    $cartData = $cartViewPrepare->fetchAll(PDO::FETCH_ASSOC);



    $subTotalQuery= 'SELECT ROUND(SUM(products.prod_price * cart.quantity),2) as subTotal FROM `cart` JOIN products ON products.prod_id = cart.prod_id WHERE user_id = 3';

    $subTotalPrepare = $connect->prepare($subTotalQuery);
    $subTotalPrepare->execute();
    $subTotal = $subTotalPrepare->fetch(PDO::FETCH_ASSOC);





    // echo "<pre>";
    // print_r($cartData);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($subTotal);
    // echo "</pre>";

?>






    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if(empty($cartData))
                            {
                                echo "<p>Your cart is empty</p>";
                            }



                            foreach($cartData as $cData){
                            ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="100" src="../adminpanel/pages/images/<?= $cData['prod_image'] ?>" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p><?= $cData['prod_name'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$<?= $cData['prod_price'] ?></h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="<?= $cData['quantity'] ?>" title="Quantity:"
                                            class="input-text qty">
                                        <button onclick=""
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick=""
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5>$<?= $cData['quantity'] * $cData['prod_price'] ?></h5>
                                </td>
                                <td>
                                    <a href="cartDelete.php?cartId=<?= $cData['cart_id'] ?>"><span class="ti-close"></span></a>
                                </td>
                            </tr>
                <?php  } ?>
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                 
                                    <h5>$<?= $subTotal['subTotal'] ?></h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <a class="primary-btn" href="checkout.php">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
	<?php
	require "partial/footer.php"
?>