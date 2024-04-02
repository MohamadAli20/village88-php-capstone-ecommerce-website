    
            <main class="products-dashboard">
                <div class="categories">
                    <h3>Categories</h3>
                    <figure id="active-category">
                        <h5>30</h5>
                        <div><img id="all_products" src="/assets/fruits_and_veggies.png" alt="lemon fruit represent all products"></div>
                        <figcaption>All Products</figcaption>
                    </figure>
                    <figure>
                        <h5>30</h5>
                        <div><img id="vegetables" src="/assets/fruits_and_veggies.png" alt="broccoli for vegetable category"></div>
                        <figcaption>Vegetables</figcaption>
                    </figure>
                    <figure>
                        <h5>30</h5>
                        <div><img id="fruits" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                        <figcaption>Fruits</figcaption>
                    </figure>
                    <figure>
                        <h5>30</h5>
                        <div><img id="pork" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                        <figcaption>Pork</figcaption>
                    </figure>
                    <figure>
                        <h5>30</h5>
                        <div><img id="beef" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                        <figcaption>Beef</figcaption>
                    </figure>
                    <figure>
                        <h5>30</h5>
                        <div><img id="chicken" src="/assets/fruits_and_veggies.png" alt="apple for fruit category"></div>
                        <figcaption>Chicken</figcaption>
                    </figure>
                </div>
                <div class="products">
                    <h3>All Products (36)</h3>
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
?>
                            <figcaption>
                                <p class="description">
                                    <span><?=$products[$i]['name']?></span>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star rated"></i>
                                    <i class="fa-solid fa-star unrated"></i>
                                    36 Rating
                                </p>
                                <p class="price">$ <?=$products[$i]['price']?></p>
                            </figcaption>
                        </figure>
                    </a>
<?php               }   ?>
                    <ul>
                        <li><i class="fa-solid fa-less-than"></i></li>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li><i class="fa-solid fa-greater-than"></i></li>
                    </ul>
                </div>
            </main>
        </main>
    </div>
    <div id="logout_modal">
       <p>Logout</p>
       <a href="/"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
</body>
</html>