<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Dashboard - Organic Shop</title>
    <link rel="stylesheet" href="/assets/normalize.css">
    <script src="https://kit.fontawesome.com/a68fd5bcf8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/assets/styles.css">
    <link rel="stylesheet" href="/assets/partial_admin_side_nav.css">
    <style>
        body{
            position: relative;
            width: 100%;
        }
        .show_category ul li{
            display: inline-block;
            width: 120px;
            text-align: center;
        }
        .show_category form{
            padding: 20px;
            margin-bottom: 10px;
        }
        .show_category footer{
            
        }
            .show_category a{
                font-size: 16px;
                border: 1px solid black;
                padding: 0 10px;
                text-decoration: none;
                color: black;
            }
        .show_category form figure, .show_category form p, .show_category form div{
            width: 120px;
            vertical-align: middle;
        }
        #form_modal{
            display: none;
            font-size: 16px;
        }
        .form_add_product,
        .form_edit_product{
            border: 1px solid black;
            background-color: white;
            width: 500px;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }
            .form_add_product h1, .form_edit_product h1,
            .form_add_product label, .form_edit_product label,
            .form_add_product textarea, .form_edit_product textarea,
            .form_add_product input, .form_edit_product input,
            .form_add_product select, .form_edit_product select{
                display: block;
                margin: 5px 0;
            }
            .form_add_product label input, .form_edit_product label input,
            .form_add_product textarea, .form_edit_product textarea{
                width: 100%;
                resize: none;
            }
            .form_add_product textarea,
            .form_edit_product textarea{
                height: 100px;
                overflow: auto;
            }
            .form_add_product p,
            .form_edit_product p{
                display: block;
            }
        #imagePreview{
            margin: 0;
            padding: 0;
            display: none;
        }
                #imagePreview .frame{
                    width: 100px;
                    height: 140px;
                    padding: 0;
                    overflow: hidden;
                    text-align: center;
                    margin: 0;
                    margin-right: 10px;
                    position: relative; 
                }
                .fa-circle-xmark{
                    position: absolute;
                    top: 5px;
                    right: 5px;
                }
                #imagePreview img{
                    height: 100px;
                    border: 1px solid black;
                }
                #imagePreview span,
                #imagePreview .checkbox{
                    display: inline-block;
                    vertical-align: top;
                }
                #imagePreview span{
                    width: 80px;
                    font-size: 13px;
                    line-height: 26px;
                    height: 20px;
                }
                #imagePreview .checkbox{
                    width: 10px;
                }
            #uploadImage{
                position: relative;
            }
                input[type="file"]{
                    color: transparent;
                }
                #uploadImage p{
                    position: absolute;
                    top: 0;
                    left: 120px;
                    height: 100%;
                    margin: 0;
                    line-height: 27px;
                }
        .form_add_product footer,
        .form_edit_product footer{
            font-size: 16px;
            text-align: right;
            position: relative;
            padding: 10px 0;
        }
            .form_add_product footer #btnPreview, .form_edit_product footer #btnPreview,
            .form_add_product footer #btnHide, .form_edit_product footer #btnHide,
            .form_add_product footer input, .form_edit_product footer input{
                display: inline-block;
            }
            .form_add_product footer a,
            .form_edit_product footer a{
                text-decoration: underline;
                color: gray;
                position: absolute;
                line-height: 35px;
                left: 0;
                pointer-events: none;
                opacity: 0.5;
            }
            .form_add_product footer #btnHide,
            .form_edit_product footer #btnHide{
                display: none;
            }
    </style>
    <script>
        $(document).ready(function(){
            $("#btnPreview").click(function(){
                $("#imagePreview").css("display", "block");
                $("#btnPreview").css("display", "none");
                $("#btnHide").css({
                    "display": "block",
                    "color": "blue",
                    "opacity": "1",
                    "pointer-events": "auto",
                    "cursor": "default"
                });
                setDefaultCheckbox();
            });
            $("#btnHide").click(function(){
                $("#imagePreview").css("display", "none");
                $("#btnPreview").css("display", "block");
                $("#btnHide").css("display", "none");
            });
            $("#add_product").click(function(){
                clearForm();
                $("#form_modal").css("display", "block");
                $("#form_modal h2").text("Add a Product");
                $("#form_modal").attr("action", "/admins/add_product");
                $("#form_modal").attr("class", "form_add_product");
            });
            $("input[value='Cancel']").click(function(){
                clearForm();
                $("#form_modal").css("display", "none");
            });
            let timer;
            $("#search").on('keyup', function(){
                clearTimeout(timer);
                /*wait 1 second before appending the param*/
                timer = setTimeout(function(){
                    let name = $("#search").val();
                    let url = new URL(window.location.href);

                    url.search = '';
                    /*update search param*/
                    url.searchParams.set('search', name);
                    window.location.href = url.toString();
                }, 1000);
            });
            $(".display_product").submit(function(e){
                e.preventDefault();
                let product_id = $(this)[0].querySelector("input[type='hidden']").value;
                
                /*ajax to retrieve and display product from the database*/
                $.ajax({
                    url: "<?php echo base_url('admins/get_product/');?>" + product_id,
                    type: "GET",
                    success: function(data){
                        $("input[name='product_id']").val(product_id);
                        $("input[name='name']").val(data.name);
                        $("textarea[name='description']").val(data.description);
                        $("select[name='category']").val(data.category);
                        $("input[name='price']").val(data.price);
                        $("input[name='stocks']").val(data.stocks);

                        $("#form_modal").css("display", "block");
                        $("#form_modal h2").text("Edit a Product");
                        $("#form_modal").attr("action", "<?php echo base_url('admins/edit_product');?>");
                        $("#form_modal").attr("class", "form_edit_product");
                        $("#btnPreview").css({
                            "opacity": "1",
                            "pointer-events": "auto",
                            "cursor": "default",
                            "color": "blue"
                        });

                        $("#imagePreview").children("div").remove();
                        displayImages(data.images, data.main_image);
                        
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                
                function displayImages(images, main_image){
                    const preview = document.getElementById('imagePreview');                    
                    images = JSON.parse(images);
                    let imagesArr = Object.keys(images);

                    let len = $("#imagePreview").children(".frame").length + 1;

                    for(let i = 0; i < imagesArr.length; i++){
                        let image = document.createElement("img");
                        image.style.maxWidth = '100px';
                        image.style.maxHeight = '100px';
                        image.setAttribute("src", "/"+images[imagesArr[i]]);
                        image.setAttribute("name", "retrievedImage")

                        let frame = document.createElement("div");
                        frame.className = "frame";

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
                        $("#imagePreview").append(frame);

                        len += 1;
                    };
                    let checkboxes = document.querySelectorAll('input[name="checkbox"]');
                    for(let i = 0; i < checkboxes.length; i++){
                        if(i === parseInt(main_image) - 1){
                            checkboxes[i].checked = true;
                        }
                    }
                    /*if the checked as main image is removed*/
                    setDefaultCheckbox();
                };

            });
            $("#form_modal").submit(function(e){
                e.preventDefault();

                let className = $(this).attr("class");
                if(className === "form_edit_product"){
                    let id = $(this).find("input[name='product_id']").val();
                    let name = $(this).find("input[name='name']").val();
                    let description = $(this).find("textarea[name='description']").val();
                    let category = $(this).find("select[name='category']").val();
                    let price = $(this).find("input[name='price']").val();
                    let stocks = $(this).find("input[name='stocks']").val();

                    let main_image = findChecked();
                    let details = [id, name, description, category, price, stocks, main_image]

                    /*get the images existing image/s displayed*/
                    let imageUrl = $(this).find("img");
                    let images = [];
                    for(let k = 0; k < imageUrl.length; k++){
                        let imagePath = $(imageUrl[k]).attr("src");
                        
                        for(let l = 0; l < imagePath.length; l++){
                            if(imagePath[l] === ","){
                                imagePath = imagePath.slice(l + 1);
                                break;
                            }
                        }
                        images.push(imagePath);
                    }
                    $.ajax({    
                        /*
                        *send the updated data in the controller
                        *update the displayed information
                        */
                        url: "<?php echo base_url('admins/edit_product'); ?>",
                        type: "POST",
                        data: { details, images},
                        success: function(response){
                            /*update the product information displayed*/
                            let displayProduct = document.querySelectorAll(".display_product");                
                            for(let y = 0; y < displayProduct.length; y++){
                                if(y === id - 1){
                                    let product = $(displayProduct[y])[0];
                                    product.querySelector("figcaption").innerText = name;
                                    product.querySelectorAll("p")[1].querySelector("span").innerText = price;
                                    product.querySelectorAll("p")[2].innerText = category;
                                    product.querySelectorAll("p")[3].innerText = stocks;
                                    /*Ajax to retrieve and display product from the database*/
                                    $.ajax({
                                        url: "<?php echo base_url('admins/get_product/');?>" + id,
                                        type: "GET",
                                        success: function(data){
                                            let jsonObject = JSON.parse(data.images);
                                            for(let key in jsonObject){
                                                if(data.main_image == key){
                                                    product.querySelector("img").src = "/" +jsonObject[key];
                                                }
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        }
                                    });
                                }
                            }
                        },
                        error: function(xhr, status, error){
                            console.error(error);
                        }
                    });
                }
                if(className === "form_add_product"){
                    let formData = new FormData($("#form_modal")[0]);
                    $.ajax({
                        url: "<?php echo base_url('admins/add_product/');?>",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
                
                $("#form_modal").css("display", "none");
            });
        });
    </script>
</head>
<body>
    