
    <form>
        <h1>Products</h1>
        <label>
            <input id="search" type="text" placeholder="Search order">
        </label>
    </form>
    <div class="category">
        <h3>Categories</h3>
        <p><a href="?status=all">All Orders <span><?=$count['total_order']?></a></span></p>
        <p><a href="?status=pending">Pending <span><?=$count['total_pending']?></span></a></p>
        <p><a href="?status=on-process">On-Process <span><?=$count['total_on_process']?></span></a></p>
        <p><a href="?status=shipped">Shipped <span><?=$count['total_shipped']?></span></a></p>
        <p><a href="?status=delivered">Delivered <span><?=$count['total_delivered']?></span></a></p>
    </div>
    <div class="show_category">
        <ul>
            <li>All 
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
            <li>Receiver</li>
            <li>Total Amount</li>
            <li>Status</li>
        </ul>
<?php   for($i = 0; $i < count($orders); $i++)
        {
?>      <form class="display_product">
            <input type="hidden" value="<?= $orders[$i]['id']; ?>">
            <figure>
                <img src="">
                <figcaption><?= $orders[$i]['total_items']; ?> item/s</figcaption>
            </figure>
            <p><?= $orders[$i]['id']; ?></p>
            <p><?= date('m/d/y', strtotime($orders[$i]['order_date'])); ?></p>
            <p>
                <?= $orders[$i]['receiver']; ?>
                <span><?= $orders[$i]['address']; ?></span>
            </p>
            <p><?= $orders[$i]['total_amount']; ?></p>
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
?>          <a href="?page=<?=$current_page - 1;?>" class="previous_arrow"><</a>
<?php       }  
            $numPage = ceil($total_per_status['total']/5);
            for($page = 1; $page <= $numPage; $page++)
            {
?>          <a href="?page=<?=$page;?>"><?=$page;?></a>
<?php       }
            if($current_page < $numPage){  
?>          <a href="?page=<?=$current_page + 1;?>" class="next_arrow">></a>
<?php       }   ?>
        </footer>
    </div>
    <script src="/assets/admin_product.js"></script>    
</body>
</html>