
    <form class="form_nav">
        <h1>Orders</h1>
        <label>
            <input id="search" type="text" placeholder="Search order">
            <figure>
                <img src="/assets/search_purple.png" alt="search icon">
            </figure>
        </label>
    </form>
    <div class="category">
        <h3>Status</h3>
        <p>
            <span><?=$count['total_order']?></span>
            <img src="/assets/all_orders_icon.svg" alt="All orders icon">
            <a href="?status=all">All Orders</a>
        </p>
        <p>
            <span><?=$count['total_pending']?></span>
            <img src="/assets/pending_icon.svg" alt="Pending icon">
            <a href="?status=pending">Pending</a> 
        </p>
        <p>
            <span><?=$count['total_on_process']?></span>
            <img src="/assets/on_process_icon.svg" alt="On-Process icon">
            <a href="?status=on-process">On-Process</a>
        </p>
        <p>
            <span><?=$count['total_shipped']?></span>
            <img src="/assets/shipped_icon.svg" alt="Shipped icon">
            <a href="?status=shipped">Shipped</a>
        </p>
        <p>
            <span><?=$count['total_delivered']?></span>
            <img src="/assets/delivered_icon.svg" alt="Delivered icon">
            <a href="?status=delivered">Delivered</a>
        </p>
    </div>
    <div class="show_category">
        <ul>
            <li class="all_column">All 
<?php       $status = $this->session->userdata('status');
            if($status === null || $status === "all")
            {
                $status = "Orders";
            }   
?>              <?= ucfirst($status); ?>
                (<span><?=$total_per_status['total']?></span>)
            </li>
            <li>Order ID #</li>
            <li>Order Date</li>
            <li class="receiver_column">Receiver</li>
            <li>Total Amount</li>
            <li class="status_column">Status</li>
        </ul>
<?php   for($i = 0; $i < count($orders); $i++)
        {
?>      <form class="display_product">
            <input type="hidden" value="<?= $orders[$i]['id']; ?>">
            <figure>
                <img src="<?= $orders[$i]['product_image']; ?>">
                <figcaption><?= $orders[$i]['total_items']; ?> item/s</figcaption>
            </figure>
            <p><?= $orders[$i]['id']; ?></p>
            <p class="order_date"><?= date('m-d-y', strtotime($orders[$i]['order_date'])); ?></p>
            <p class="receivers">
                <?= $orders[$i]['receiver']; ?><br/>
                <span class="addresses"><?= $orders[$i]['address1']; ?></span>
            </p>
            <p>$<?= $orders[$i]['total_amount']; ?></p>
            <select name="status">
                <option value="Pending" <?= ($orders[$i]['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="On-Process" <?= ($orders[$i]['status'] == 'On-Process') ? 'selected' : ''; ?>>On-Process</option>
                <option value="Shipped" <?= ($orders[$i]['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                <option value="Delivered" <?= ($orders[$i]['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
            </select>
        </form>
<?php   }   
        $current_page = $this->session->userdata('current_page');
?>      <footer>
<?php       if($current_page > 1)
            {   
?>          <a href="?page=<?=$current_page - 1;?>" class="previous_arrow">
                <img src="/assets/arrow-left.png" alt="Arrow left">
            </a>
<?php       }  
            $numPage = ceil($total_per_status['total']/10);
            for($page = 1; $page <= $numPage; $page++)
            {
?>          <a href="?page=<?=$page;?>"><?=$page;?></a>
<?php       }
            if($current_page < $numPage){  
?>          <a href="?page=<?=$current_page + 1;?>" class="next_arrow">
                <img src="/assets/arrow-right.png" alt="Arrow right">
            </a>
<?php       }   ?>
        </footer>
    </div>
    <div id="logout_modal">
       <p>Logout</p>
       <a href="/products/login"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
    <script src="/assets/admin_product.js"></script>    
</body>
</html>