
    <div class="content">
        <nav>
            <img src="/assets/leaf.svg" alt="leaf logo">
            <h1>Let’s order fresh items for you.</h1>
            <a id="signup" href="/products/signup">Sign Up</a>
            <a id="login" href="/products/login">Login</a>
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