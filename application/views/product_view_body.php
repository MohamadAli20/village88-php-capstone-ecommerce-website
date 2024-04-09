            
            <div>
                <a href="/"><</a>
                <h3>Go Back</h3>
            </div>
            <div id="product_view_form">
                <figure>
<?php               $images = json_decode($product['images']);
                    foreach($images as $key => $image)
                    {   
                        if($key === $product['main_image'])
                        {
?>                      <div id="main_image">
                            <img src="/<?=$image;?>" alt="<?=$image;?>">
                        </div>
<?php                   }
                    }  
?>                    <figcaption>
                        <p>
                        <span id="product_category"><?=$product['name']?></span>
                        <span id="rating">
<?php                   $ratings = round($product['average_rating']);
                        for($i = 1; $i <= 5; $i++)
                        {
                            if($ratings > 0)
                            {
?>                          <i class="fa-solid fa-star"></i>
<?php                       $ratings--;
                            }
                            else
                            {
?>                          <i class="fa-regular fa-star"></i>
<?php                       }
                        }   
?>                          <?=$product['num_rating'] . " Rating"?>
                        </span>
                        </p>
                        <p id="price">$ <?=$product['price']?></p>
                        <p id="description"><?=$product['description']?></p>
                    </figcaption>
                </figure>
                <footer>
<?php               $images = json_decode($product['images']);
                    foreach($images as $key => $image)
                    {   
                        if($key !== $product['main_image'])
                        {
?>                      <figure class="other_image">
                            <img src="/<?=$image;?>" alt="<?=$image;?>">
                        </figure>
<?php                   }
                    }  
?>                  <form id="add_to_cart" action="" method="post">
                        <input type="hidden" value="<?=$product['price']?>">
                        <label>Quantity
                            <input type="number" name="quantity" min="1" value="1"/>
                        </label>
                        <p>Total Amount<span id="total_amount">$ <?=$product['price']?></span></p>
                        <button type="submit">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                    </form>
                </footer>
            </div>
            <div class="similar_items">
                <h3>Similar Items</h3>
                <div>
<?php           for($i = 0; $i < count($similar_items); $i++)
                {   
                    if($similar_items[$i]['id'] !== $product['id'])
                    {
?>
                    <a href="/product_view/<?=$similar_items[$i]['id']?>">
                        <figure>
<?php                   $images = json_decode($similar_items[$i]['images']);
                        foreach($images as $key => $image)
                        {   
                        if($key === $similar_items[$i]['main_image'])
                        {
?>                      <div id="main_image">
                            <img src="/<?=$image;?>" alt="<?=$image;?>">
                        </div>
<?php                   }
                        }   
?>                          <figcaption>
                                <p class="description">
                                    <span><?=$similar_items[$i]['name']?></span>
<?php                               $ratings = round($similar_items[$i]['average_rating']);
                                    for($j = 1; $j <= 5; $j++)
                                    {
                                    if($ratings > 0)
                                    {
?>                                  <i class="fa-solid fa-star"></i>
<?php                               $ratings--;
                                    }
                                    else
                                    {
?>                                  <i class="fa-regular fa-star"></i>
<?php                               }
                                    }   
?>                                  <?=$similar_items[$i]['num_rating']?> Rating
                                </p>
                                <p class="price">$ <?=$similar_items[$i]['price']?></p>
                            </figcaption>
                        </figure>
                    </a>
<?php               }
                }   
?>              </div>
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