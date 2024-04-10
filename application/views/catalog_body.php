    
            <main class="products-dashboard">
                <div class="categories">
                    <h3>Categories</h3>
                    <a href="?category=all">
                        <figure id="active-category">
                            <h5><?=$count['total_products']?></h5>
                            <div><img id="all_products" src="/assets/fruits_and_veggies.png" alt="lemon fruit represent all products"></div>
                            <figcaption>All Products</figcaption>
                        </figure>
                    </a>
                    <a href="?category=vegetables">
                        <figure>
                            <h5><?=$count['total_vegetables']?></h5>
                            <div><img id="vegetables" src="/assets/fruits_and_veggies.png" alt="broccoli for vegetable category"></div>
                            <figcaption>Vegetables</figcaption>
                        </figure>
                    </a>
                    <a href="?category=fruits">
                        <figure>
                            <h5><?=$count['total_fruits']?></h5>
                            <div><img id="fruits" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                            <figcaption>Fruits</figcaption>
                        </figure>
                    </a>
                    <a href="?category=pork">
                        <figure>
                            <h5><?=$count['total_pork']?></h5>
                            <div><img id="pork" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                            <figcaption>Pork</figcaption>
                        </figure>
                    </a>
                    <a href="?category=beef">
                        <figure>
                            <h5><?=$count['total_beef']?></h5>
                            <div><img id="beef" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                            <figcaption>Beef</figcaption>
                        </figure>
                    </a>
                    <a href="?category=chicken">
                        <figure>
                            <h5><?=$count['total_chicken']?></h5>
                            <div><img id="chicken" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                            <figcaption>Chicken</figcaption>
                        </figure>
                    </a>
                </div>
                <div class="products">
                    <h3>All Products (<?=count($products)?>)</h3>
<?php               for($i = 0; $i < count($products); $i++)
                    {   ?>
                    <a href="/product_view/<?=$products[$i]['id']?>">
                        <figure>
<?php                       $images = json_decode($products[$i]['images']);
                            foreach($images as $key => $image)
                            {   
                                if($key === $products[$i]['main_image'])
                                {
?>                              <img src="<?=$image;?>" alt="<?=$image;?>">
<?php                           }
                            }    
?>                          <figcaption>
                                <p class="description">
                                    <span><?=$products[$i]['name']?></span>
<?php                               $ratings = round($products[$i]['average_rating']);
                                    for($j = 1; $j <= 5; $j++)
                                    {
                                        if($ratings > 0)
                                        {
?>                                      <i class="fa-solid fa-star rated"></i>
<?php                                   $ratings--;
                                        }
                                        else
                                        {
?>                                      <i class="fa-solid fa-star unrated"></i>
<?php                                   }
                                    }
?>                                      <?= $products[$i]['total'] . " Rating"; ?>
                                </p>
                                <p class="price">$<?=$products[$i]['price']?></p>
                            </figcaption>
                        </figure>
                    </a>
<?php               }   ?>
                    <ul>
<?php                   $current_page = $this->session->userdata('current_page');
                        if($current_page > 1)
                        {
?>                      <li><a href="?page=<?=$current_page - 1?>"><</a></li>
<?php                   }
                        $num_page = ceil($total_per_category['total']/12);
                        for($page = 1; $page <= $num_page; $page++)
                        {   
?>                      <li><a href="?page=<?=$page?>"><?=$page?></a></li>
<?php                   }   
                        if($current_page < $num_page){  
?>                      <li><a href="?page=<?=$current_page + 1?>">></a></li>
<?php                   }   ?>
                    </ul>
                </div>
            </main>
        </main>
    </div>
    <div id="logout_modal">
       <p>Logout</p>
       <a href="/products/login"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
</body>
</html>