
    <div class="admin_side_tab">
        <figure>
            <img src="/assets/admin_logo.svg" alt="e-commerce logo">
        </figure>
        <a href="/dashboards/orders" id="orders">Orders</a>
        <a href="/dashboards/products" id="products">Products</a>
    </div>
    <main>
        <img id="admin_background_image" src="/assets/nav_admin_background.png" alt="different kind of fruits">
        <header class="admin_nav">
            <figure>
                <img src="/assets/leaf.svg" alt="leaf icon">
                <figcaption>Let’s provide fresh items for everyone.</figcaption>
            </figure>
            <div>
<?php       $name = $this->session->userdata("name");
?>              <h3><?= $name['first_name'] . " " . $name['last_name']; ?></h3>
                <img id="expand_more" src="/assets/expand_more_white.svg" alt="expand more white icon"></a>
            </div>
        </header>