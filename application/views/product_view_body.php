            
            <div>
                <i class="fa-solid fa-chevron-left"></i>
                <h3>All Products</h3>
            </div>
            <div id="product_view_form">
                <figure>
                    <img src="/assets/product_view.svg" alt="An image of a hamburger">
                    <figcaption>
                        <span id="product_category">Vegetables</span>
                        <span id="rating">
                            <i class="fa-solid fa-star rated"></i>
                            <i class="fa-solid fa-star rated"></i>
                            <i class="fa-solid fa-star rated"></i>
                            <i class="fa-solid fa-star rated"></i>
                            <i class="fa-solid fa-star unrated"></i>
                            36 Rating
                        </span>
                        <span id="price">$ 10</span>
                        Lorem ipsum dolor sit amet consectetur. Eget sit posuere enim facilisi. Pretium orci venenatis habitasse gravida nulla tincidunt iaculis. Aliquet at massa quisque libero viverra ut sed. Est vulputate est rutrum nunc nunc pellentesque ultrices pharetra. Mauris euismod sed vel quisque tincidunt suspendisse sed turpis volutpat. 
                    </figcaption>
                </figure>
                <footer>
                    <figure><img src="/assets/small_image1.svg" alt=""></figure>
                    <figure><img src="/assets/small_image2.svg" alt=""></figure>
                    <figure><img src="/assets/small_image3.svg" alt=""></figure>
                    <figure><img src="/assets/small_image4.svg" alt=""></figure>
                    <form action="" method="post">
                        <label>Quantity
                            <select name="quantity">
<?php                           for($i = 1; $i <= 100; $i++)
                                {   ?>
                                <option value="<?=$i?>"><?=$i?></option>
<?php                           }   ?>
                            </select>
                        </label>
                        <p>Total Amount<span >$ 10</span></p>
                        <button type="submit" id="add_to_cart">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                    </form>
                </footer>
            </div>
            <div class="similar_items">
                <h3>Similar Items</h3>
                <div>
<?php               for($i = 1; $i <= 5; $i++)
                    {   ?>
                    <a href="/product_view/<?=$i?>">
                        <figure>
                            <img src="/assets/product1.jpg" alt="A bowl of vegetable salad">
                            <figcaption>
                                <p class="description">
                                    <span>Vegetables</span>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star unrated"></i>
                                    36 Rating
                                </p>
                                <p class="price">$ 10</p>
                            </figcaption>
                        </figure>
                    </a>
<?php               }   ?>
                </div>
            </div> 
        </main>
    </div>
    <div id="logout_modal">
       <p>Logout</p>
       <i class="fa-solid fa-right-from-bracket"></i>
    </div>
    <div id="modal_background">
        <div class="success_added">
            <i class="fa-solid fa-check"></i>
            <p>Added to cart successfully!</p>
            <a href="#" id="close_success"><i class="fa-solid fa-xmark"></i></a>
        </div>
    </div>
</body>
</html>