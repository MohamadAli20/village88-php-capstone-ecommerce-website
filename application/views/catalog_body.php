    <div class="content">
        <nav>
            <img src="/assets/leaf.svg" alt="leaf logo">
            <h1>Let’s order fresh items for you.</h1>
            <a id="signup" href="#">Sign Up</a>
            <a id="login" href="#">Login</a>
        </nav>   
        <main>
            <header>
                <form action="/products/search" method="post">
                    <label>
                        <input type="text" name="search" placeholder="Search Products">
                    </label>
                    <button type="submit" id="btn-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <a href="">
                    <i class="fa-solid fa-cart-shopping"></i>Cart(0)
                </a>
            </header>
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
<?php               for($i = 1; $i <= 15; $i++)
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
    <div class="login-background">
        <form id="login-form" class="login" action="">
            <img id="logo-login" src="/assets/logo.svg" alt="e-commerce logo of the company">
            <header>
                <img src="/assets/smiley-face.svg" alt="a smiley face">
                <h3>Login to order.</h3>
                <a href="">New Member? Register here.</a>
            </header>
            <label>
                <input type="text" placeholder="Email" name="email">
            </label>
            <label>
                <input type="password" placeholder="Password" name="password">
            </label>
            <footer>
                <input type="submit" value="Signup">
            </footer>
            <i id="close-login" class="fa-solid fa-circle-xmark"></i>
            <img id="login-side-logo" src="/assets/login_side_logo.svg" alt="e-commerce logo with onion leaves in the background">
        </form>
    </div>
    <div class="signup-background">
        <form id="signup-form" class="login" action="">
            <img id="logo-login" src="/assets/logo.svg" alt="e-commerce logo of the company">
            <header>
                <img src="/assets/smiley-face.svg" alt="a smiley face">
                <h3>Signup to order.</h3>
                <a href="">Already a member? Login here.</a>
            </header>
            <label id="first_name">
                <input type="text" placeholder="First Name" name="first_name">
            </label>
            <label id="last_name">
                <input type="text" placeholder="Last Name" name="last_name">
            </label>
            <label>
                <input type="text" placeholder="Email" name="email">
            </label>
            <label>
                <input type="password" placeholder="Password" name="password">
            </label>
            <label>
                <input type="password" placeholder="Confirm Password" name="confirm_password">
            </label>
            <footer>
                <input type="submit" value="Signup">
            </footer>
            <i id="close-signup" class="fa-solid fa-circle-xmark"></i>
            <img id="login-side-logo" src="/assets/login_side_logo.svg" alt="e-commerce logo with onion leaves in the background">
        </form>
    </div>
</body>
</html>