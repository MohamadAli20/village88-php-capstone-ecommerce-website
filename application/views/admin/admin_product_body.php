
    <form action="" method="get">
        <h1>Products</h1>
        <label>
            <input type="text" placeholder="Search order">
        </label>
        <button id="add_product">Add a Product</button>
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
        <form action="" method="post">
            <figure>
                <img src="" alt="">
                <figcaption>Carrots</figcaption>
            </figure>
            <p>5</p>
            <p>$ <span>10</span></p>
            <p>Vegetables</p>
            <p>100</p>
            <p>12</p>
            <div>
                <input type="submit" value="Edit">
            </div>
        </form>
        <footer>
            <p class="previous_arrow"><</p>
            <p>1</p>
            <p class="next_arrow">></p>
        </footer>
    </div>
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
        <p>Upload Images (4 max):</p>
        <div id="imagePreview">
        </div> 
        <label id="uploadImage">
            <input type="file" name="images[]" multiple accept="image/*" onchange="previewImages(event)">
        </label>
        <footer>
            <a id="btnPreview">Preview</a>
            <input type="button" value="Cancel">          
            <input type="submit" value="Save">
        </footer>
    </form>
    <script>
        let files;
        function previewImages(event) {
            const preview = document.getElementById('imagePreview');
            files = event.target.files;
            let len = preview.children.length + 1;
            if(files.length <= 4){
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    reader.onload = function (event) {
                        let image = new Image();
                        image.style.maxWidth = '100px';
                        image.style.maxHeight = '100px';
                        image.src = event.target.result;

                        let frame = document.createElement("div");
                        frame.className = "frame";
                        frame.setAttribute("name", `image${len}`);
                        // frame.setAttribute("id", `image${len}`);

                        let closeIcon = document.createElement("i");
                        closeIcon.className ="fa-solid fa-circle-xmark";
                        closeIcon.setAttribute("name", "closeIcon");
                        closeIcon.setAttribute("id", `image${len}`);
                        closeIcon.onclick = function(){
                            removeImage(this);
                        }

                        let label = document.createElement("label");
                        label.className = "checkboxes";
                        
                        let checkbox = document.createElement("input");
                        checkbox.setAttribute("type", "checkbox");
                        checkbox.setAttribute("name", "checkbox");
                        checkbox.setAttribute("id", `checkbox${len}`);
                        checkbox.setAttribute("value", len);
                        checkbox.onchange = function() {
                            limitCheckboxSelection(this);
                        };
                        checkbox.className = `checkbox`;
                        
                        label.append(checkbox);
                        let text = document.createElement("span");
                        text.textContent = "Mark as main";
                        label.append(text);

                        frame.append(closeIcon);
                        frame.append(image);
                        frame.append(label);
                        
                        preview.append(frame);

                        if(len >= 4){
                            $(".material-symbols-outlined").css("display", "none");
                        }
                        if(len > 0){
                            $("#btnPreview").css({
                                "opacity": "1",
                                "pointer-events": "auto",
                                "cursor": "default",
                                "color": "blue"
                            });
                        }
                        len += 1;
                    };
                    reader.readAsDataURL(file);
                }
            }
            else{
                console.log("Maximum 4 images");
            }
        }
        function removeFile(files, indexToRemove){
            let newFiles = [];
            for(let j = 0; j < files.length; j++){
                if(j !== indexToRemove){
                    newFiles.push(files[j]);
                }
            }
            return newFiles;
        }
        function removeImage(clickedCloseIcon){
            console.log("Before:")
            console.log(files);
            
            let closeIcons = document.querySelectorAll("i[name='closeIcon']");
            for(let i = 0; i < closeIcons.length; i++){
                if(closeIcons[i] === clickedCloseIcon){
                    files = removeFile(files, i);
                }
            }
            $(clickedCloseIcon).parent().remove();
            console.log("After:")
            console.log(files);
            
            let countImages = $("#imagePreview").children(".frame").length;
            if(countImages === 3){
                $(".material-symbols-outlined").css("display", "block");
            }
            if(countImages === 0){
                $("input[type='file']").val("");
                $("#btnPreview").css({
                    "opacity": "0.5",
                    "pointer-events": "none",
                    "color": "gray"
                });
            }
        }
        function limitCheckboxSelection(checkbox) {
            let checkboxes = document.querySelectorAll('input[name="option"]');
            checkboxes.forEach(function(item) {
                if (item !== checkbox) {
                    item.checked = false;
                }
            });
            return checkbox;
        }

    </script>
</body>
</html>