
        
        <div class="listed_items">
            <div class="cart_info">
<?php       
            for($i = 0; $i < count($carts); $i++)
            { 
?>              <figure id="product<?=$carts[$i]['id']?>">
<?php           $images = json_decode($carts[$i]['images']);    
                foreach($images as $key => $image)
                {
                    if($key === $carts[$i]['main_image'])
                    {
?>                  <img class="main_image" src="/<?=$image?>" alt="<?=$image?>">
<?php               }
                }
?>                  <figcaption>
                        <p class="category"><?=$carts[$i]['category']?><span>$ <?=$carts[$i]['price']?></span></p>
                        <label>Quantity
                            <input type="number" min="1" value="<?=$carts[$i]['quantity']?>">
                        </label>
                        <p class="total_amount">Total Amount<span>$ <?=$carts[$i]['total_amount']?></span></p>
                        <input type="hidden" value="<?=$carts[$i]['total_amount']?>">
                    </figcaption>
                    <i class="fa-solid fa-xmark remove-button" data-cart-id="<?=$carts[$i]['id']?>"></i>
                    <div class="remove_modal" id="remove_modal<?=$carts[$i]['id']?>">
                        <p>Are you sure you want to remove this item?</p>
                        <button class="btn_cancel cancel-button" data-cart-id="<?=$carts[$i]['id']?>">Cancel</button>
                        <button class="btn_remove" data-cart-id="<?=$carts[$i]['id']?>" data-total-amount="<?=$carts[$i]['total_amount']?>">Remove</button>
                    </div>
                </figure>
<?php       }   ?>
            </div>
            <div class="other_info">
                <form id="shipping_info" class="shipping_billing_info">
                    <h3>Shipping Information</h3>
                    <label id="checkbox">
                        <input type="checkbox" name="checkbox" checked> Same in Billing
                    </label>
                    <div>
                        <label class="name">
                            <input type="text" placeholder="First Name" name="shipping_first_name">
                        </label>
                        <label class="name">
                            <input type="text" placeholder="Last Name" name="shipping_last_name">
                        </label>
                    </div>
                    <label>
                        <input type="text" placeholder="Address 1" name="shipping_address1">
                    </label>
                    <label>
                        <input type="text" placeholder="Address 2" name="shipping_address2">
                    </label>
                    <div>
                        <label class="city_state_zipcode">
                            <input type="text" placeholder="City" name="shipping_city">
                        </label>
                        <label class="city_state_zipcode">
                            <input type="text" placeholder="State" name="shipping_state">
                        </label>
                        <label class="city_state_zipcode">
                            <input type="text" placeholder="Zip Code" name="shipping_zipcode">
                        </label>
                    </div>
                </form>
                <form id="billing_info" class="shipping_billing_info" >
                    <h3>Billing Information</h3>
                    <div>
                        <label class="name">
                            <input type="text" placeholder="First Name" name="billing_first_name">
                        </label>
                        <label class="name">
                            <input type="text" placeholder="Last Name" name="billing_last_name">
                        </label>
                    </div>
                    <label>
                        <input type="text" placeholder="Address 1" name="billing_address1">
                    </label>
                    <label>
                        <input type="text" placeholder="Address 2" name="billing_address2">
                    </label>
                    <div>
                        <label class="city_state_zipcode">
                            <input type="text" placeholder="City" name="billing_city">
                        </label>
                        <label class="city_state_zipcode">
                            <input type="text" placeholder="State" name="billing_state">
                        </label>
                        <label class="city_state_zipcode">
                            <input type="text" placeholder="Zip Code" name="billing_zipcode">
                        </label>
                    </div>
                </form>
                <form id="order_summary" class="shipping_billing_info">
                    <h3>Order Summary</h3>
                    <p><span>Items</span><span class="fees" id="total_items"></span></p>
                    <input type="hidden" value="" name="total_items">
                    <p><span>Shipping Fee</span><span class="fees" id="shipping_fee">$<?=$total_cart['total']*35?></span></p>
                    <input type="hidden" value="<?=$total_cart['total']*35?>" name="shipping_fee">
                    <input type="hidden" value="<?=$total_cart['total']?>" name="num_items">
                    <p id="total_fee"><span>Total Fee</span><span id="total_amount" class="fees"></span></p>
                    <input type="hidden" value="" name="total_fee">
                    <input id="proceed_checkout" type="submit" value="Proceed to Checkout">
                </form>
            </div>
        </div>
    </main>
    <form id="payment">
        <header>
            <img src="/assets/logo.svg" alt="company logo">
            <img src="/assets/visa_mastercard.svg" alt="visa and master card logo">
            <i class="fa-solid fa-xmark"></i>
        </header>
        <main>
        <h3>Card Details</h3>
        <label>
            <input type="text" placeholder="Card Name">
        </label>
        <label>
            <input type="text" placeholder="Card Number">
        </label>
        <div>
            <label>
                <input id="expiration" type="text" placeholder="Expiration">
            </label>
            <label>
                <input id="cvc" type="text" placeholder="CVC">
            </label>
        </div>
        </main>
        <footer>
            <p>Total Amount: <span>$45</span></p>
            <input type="submit" value="Pay">
        </footer>
    </form>
    <div id="gray_background"></div>
</body>
</html>