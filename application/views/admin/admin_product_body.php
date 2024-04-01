
    <form>
        <h1>Products</h1>
        <label>
            <input id="search" type="text" placeholder="Search order">
        </label>
        <input type="button" id="add_product" value="Add a Product">
    </form>
    <div class="category">
        <h3>Categories</h3>
        <p><a href="?category=all">All Products <span><?=$count['all_total']?></a></span></p>
        <p><a href="?category=vegetables">Vegetables <span><?=$count['vegetables_total']?></span></a></p>
        <p><a href="?category=fruits">Fruits <span><?=$count['fruits_total']?></span></a></p>
        <p><a href="?category=pork">Pork <span><?=$count['pork_total']?></span></a></p>
        <p><a href="?category=beef">Beef <span><?=$count['beef_total']?></span></a></p>
        <p><a href="?category=chicken">Chicken <span><?=$count['chicken_total']?></span></a></p>
    </div>
    <div class="show_category">
        <ul>
            <li>All Products (<span><?=$total_per_category['total']?></span>)</li>
            <li>Product ID #</li>
            <li>Price</li>
            <li>Category</li>
            <li>Stocks</li>
            <li>Sold</li>
            <li></li>
        </ul>
<?php   for($i = 0; $i < count($products); $i++)
        {
?>      <form class="display_product" action="/admins/get_product/<?=$products[$i]['id'];?>" method="post">
            <figure>
<?php       $main_image = intval($products[$i]['main_image']);
            $jsonString = $products[$i]['images'];
            $jsonObject = json_decode($jsonString, true);
            for($j = 1; $j <= count($jsonObject); $j++)
            {   
                if($main_image === $j){
?>              <img src="/<?=$jsonObject[$j]?>">
<?php           }  
            }   
?>              <figcaption><?= $products[$i]['name']; ?></figcaption>
            </figure>
            <p><?= $products[$i]['id']; ?></p>
            <p>$<span><?= $products[$i]['price']; ?></span></p>
            <p><?= $products[$i]['category']; ?></p>
            <p><?= $products[$i]['stocks']; ?></p>
            <p><?= $products[$i]['sold']; ?></p>
            <div>
                <input type="hidden" value="<?= $products[$i]['id']; ?>">
                <input type="submit" value="Edit">
            </div>
        </form>
<?php   }   
        $current_page = $this->session->userdata('current_page');
?>      <footer>
<?php       if($current_page > 1)
            {   
?>          <a href="?page=<?=$current_page - 1;?>" class="previous_arrow"><</a>
<?php       }  
            $numPage = ceil($total_per_category['total']/5);
            for($page = 1; $page <= $numPage; $page++)
            {
?>          <a href="?page=<?=$page;?>"><?=$page;?></a>
<?php       }
            if($current_page < $numPage){  
?>          <a href="?page=<?=$current_page + 1;?>" class="next_arrow">></a>
<?php       }   ?>
        </footer>
    </div>
    <!-- Modal to add and edit product -->
    <form id="form_modal" method="post" enctype="multipart/form-data">
        <h2>Add a Product</h2>
        <input type='hidden'name="product_id" value=''>
        <label>
            <input name="name" type="text" placeholder="Name" >
        </label>
        <textarea name="description" placeholder="Description"></textarea>
        <label>Category
            <select name="category" id="">
                <option value="Vegetables">Vegetables</option>
                <option value="Fruits">Fruits</option>
                <option value="Pork">Pork</option>
                <option value="Beef">Beef</option>
                <option value="Chicken">Chicken</option>
            </select>
        </label>
        <label>Price
            <input name="price" type="text" placeholder="$">
        </label>
        <label>Stocks
            <input name="stocks" type="text" placeholder="$">
        </label>
        <p id="upload_label">Upload Images (4 max):</p>
        <div id="imagePreview">
        </div> 
        <label id="uploadImage">
            <input type="file" name="images[]" multiple accept="image/*" onchange="previewImages(event)">
            <p>No file choosen</p>
        </label>
        <footer>
            <a id="btnPreview">Preview</a>
            <a id="btnHide">Hide</a>
            <input id="cancel" type="button" value="Cancel">          
            <input type="submit" value="Save">
        </footer>
    </form>
    <script src="/assets/admin_product.js"></script>    
</body>
</html>