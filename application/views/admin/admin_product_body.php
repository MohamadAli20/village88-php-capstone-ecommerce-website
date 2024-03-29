
    <form action="" method="get">
        <h1>Products</h1>
        <label>
            <input type="text" placeholder="Search order">
        </label>
        <input type="button" id="add_product" value="Add a Product">
    </form>
    <div class="category">
        <h3>Categories</h3>
        <p>All Products <span>2</span></p>
        <p>Vegetables <span>2</span></p>
        <p>Fruits <span>2</span></p>
        <p>Pork <span>2</span></p>
        <p>Beef <span>2</span></p>
        <p>Chicken <span>2</span></p>
    </div>
    <div class="show_category">
        <ul>
            <li>All Products (<span>2</span>)</li>
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
            <p><?= $products[$i]['price']; ?></p>
            <div>
                <input type="hidden" value="<?= $products[$i]['id']; ?>">
                <input class="btnEdit" type="submit" value="Edit">
            </div>
        </form>
<?php   }   ?>
        <footer>
            <p class="previous_arrow"><</p>
            <p>1</p>
            <p class="next_arrow">></p>
        </footer>
    </div>
    <!-- Modal to add and edit product -->
    <form class="form_add_product" action="/admins/add_product" method="post" enctype="multipart/form-data">
        <h2>Add a Product</h2>
        <label>
            <input name="name" type="text" placeholder="Name" >
        </label>
        <textarea name="description" placeholder="Description"></textarea>
        <label>Category
            <select name="category" id="">
                <option value="vegetables">Vegetables</option>
                <option value="fruits">Fruits</option>
                <option value="pork">Pork</option>
                <option value="Beef">Beef</option>
                <option value="chicken">Chicken</option>
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
            <input type="button" value="Cancel">          
            <input type="submit" value="Save">
        </footer>
    </form>
    <script src="/assets/admin_product.js"></script>    
</body>
</html>