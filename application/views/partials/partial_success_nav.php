    
    <div class="content">
        <nav id="nav_login">
            <img src="/assets/leaf.svg" alt="leaf logo">
            <h1>Let’s order fresh items for you.</h1>
            <div>
<?php       $name = $this->session->userdata("name");
?>              <h3><?= $name['first_name'] . " " . $name['last_name']; ?></h3>
                <img id="expand_more" src="/assets/expand_more.svg" alt="expand more icon">
            </div>
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
                <a href="/products/cart">
                    <i class="fa-solid fa-cart-shopping"></i>Cart(0)
                </a>
            </header>