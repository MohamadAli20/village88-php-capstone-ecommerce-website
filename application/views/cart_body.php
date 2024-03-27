
        
        <form id="listed_items" action="" method="post">
            <div>
<?php           for($i = 1; $i <= 4; $i++)
                {   ?>
                <figure id="product<?=$i?>">
                    <img src="/assets/small_image<?=$i?>.svg" alt="">
                    <figcaption>
                            <p>Vegetables<span>$ 10</span></p>
                            <label>Quantity
                                <select name="product<?=$i?>_quantity">
<?php                               for($j = 1; $j <= 100; $j++)
                                    {   ?>
                                    <option value="<?=$j?>"><?=$j?></option>
<?php                               }   ?>
                                </select>
                            </label>
                            <p class="total_amount">Total Amount<span>$ 10</span></p>
                    </figcaption>
                    <i id="remove_product<?=$i?>" class="fa-solid fa-xmark"></i>
                    <div class="remove_modal" id="remove_modal<?=$i?>">
                        <p>Are you sure you want to remove this item?</p>
                        <button class="btn_cancel" id="cancel<?=$i?>"><a href="#">Cancel</a></button>
                        <!-- Add backend logic -->
                        <button class="btn_remove" id="remove<?=$i?>"><a href="#">Remove</a></button>
                    </div>
                </figure>
<?php           }   ?>
            </div>  
            <div id="shipping_info">
                <h3>Shipping Information</h3>
                <div>
                    <label class="name">
                        <input type="text" placeholder="First Name" name="first_name">
                    </label>
                    <label class="name">
                        <input type="text" placeholder="Last Name" name="last_name">
                    </label>
                </div>
                <label>
                    <input type="text" placeholder="Address 1" name="address1">
                </label>
                <label>
                    <input type="text" placeholder="Address 2" name="address2">
                </label>
                <div>
                    <label class="city_state_zipcode">
                        <input type="text" placeholder="City" name="city">
                    </label>
                    <label class="city_state_zipcode">
                        <input type="text" placeholder="State" name="state">
                    </label>
                    <label class="city_state_zipcode">
                        <input type="text" placeholder="Zip Code" name="zipcode">
                    </label>
                </div>
                <h3>Order Summary</h3>
                <p><span>Items</span><span class="fees">$ 40</span></p>
                <p><span>Shipping Fee</span><span class="fees">$ 40</span></p>
                <p id="total_fee"><span>Total Fee</span><span id="total_amount" class="fees">$ 40</span></p>
                <input id="proceed_checkout" type="submit" value="Proceed to Checkout">
            </div>
        </form>
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