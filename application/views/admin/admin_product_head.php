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
    <link rel="stylesheet" href="/assets/admin_order.css">
    <link rel="stylesheet" href="/assets/admin_product.css">
    <style>
        body{
            /* position: relative; */
            /* width: 100%; */
            background: rgba(33, 35, 50, 1);
        }
            .admin_side_tab #products{
                background-color: rgba(156, 137, 255, 0.2);
                border-top-right-radius: 11px;
                border-bottom-right-radius: 11px;
            }
        #form_modal{
            font-size: 16px;
            color: rgba(125, 125, 125, 1);
            width: 500px;
            padding: 20px;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            background: rgba(255, 255, 255, 1);
            border-radius: 20px;
        }
            #form_modal header{
                position: relative;
            }
                #form_modal header h2, #form_modal header img{
                    display: inline-block;
                }
                #form_modal header h2{
                    margin-bottom: 10px;
                }
                #form_modal header img{
                    position: absolute;
                    right: 0;
                    padding: 5px;
                    border-radius: 100px;
                }
                #form_modal #close_icon:hover{
                    background: rgba(125, 125, 125, 0.5);
                    padding: 5px;
                    border-radius: 100px;
                }
            #form_modal label,
            #form_modal textarea,
            #form_modal select{
                display: block;
                margin: 10px 0;
            }
            #form_modal label input,
            #form_modal textarea{
                width: 100%;
                resize: none;
            }
            #form_modal textarea{
                height: 100px;
                overflow: auto;
            }
            #form_modal p{
                display: block;
            }
            #form_modal input,
            #form_modal textarea,
            #form_modal select{
                border-radius: 10px;
                border: 1px solid rgba(218, 211, 255, 1);
                font-size: 16px;
                padding: 10px 20px;
            }
            #form_modal div{
                display: block;
                text-align: right;
                position: relative;
            }
                #form_modal div select{
                    color: rgba(125, 125, 125, 1);
                    width: 50%;
                    position: absolute;
                    left: 0;    
                }
                #form_modal div select,
                #form_modal div label{
                    display: inline-block;
                }
                #form_modal input[name='price'],
                #form_modal input[name='stocks']{
                    width: 110px;
                }
        #upload_label{
            font-size: 14px;
        }
        #imagePreview{
            margin: 0;
            padding: 0;
            display: none;
            text-align: center;
        }
                #imagePreview .frame{
                    width: 100px;
                    display: inline-block;
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
                    border-radius: 10px;
                    border: 1px solid rgba(193, 193, 193, 1);
                }
                #imagePreview span,
                #imagePreview .checkbox{
                    display: inline-block;
                    vertical-align: top;
                }
                #imagePreview span{
                    width: 80px;
                    font-size: 13.5px;
                }
                #imagePreview .checkbox{
                    width: 20px;
                }
            #form_modal #uploadImage{
                /* position: relative; */
                border-radius: 10px;
                border: 1px solid rgba(218, 211, 255, 1);
                font-size: 16px;
                padding: 0;
                background: rgba(255, 255, 255, 1);
                overflow: hidden;
            }
                #uploadImage button, #uploadImage p{
                    display: inline-block;
                    margin: 0 auto;
                }
                #uploadImage button{
                    background: rgba(156, 137, 255, 1);
                    border: none;
                    padding: 10px 20px;
                    color: rgba(255, 255, 255, 1);
                }
                #uploadImage input[type='file']{
                    display: none;
                }
                #uploadImage p{

                }
        #form_modal footer{
            font-size: 16px;
            text-align: right;
            position: relative;
            padding: 10px 0;
        }
            #form_modal footer #btnPreview,
            #form_modal footer #btnHide,
            #form_modal footer input{
                display: inline-block;
            }
            #form_modal footer a{
                color: rgba(156, 137, 255, 1) !important;
                position: absolute;
                line-height: 35px;
                left: 0;
                pointer-events: none;
                background: none;
            }
            #form_modal footer #btnHide{
                display: none;
            }
            #form_modal #cancel{
                border: 1px solid rgba(226, 226, 226, 1);
                color: rgba(177, 177, 177, 1);
            }
            #form_modal footer input[type='submit']{
                background: rgba(156, 137, 255, 1);
                color: rgba(255, 255, 255, 1);
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
                $("#uploadImage").css("display", "none");
                setDefaultCheckbox();
            });
            $("#btnHide").click(function(){
                $("#imagePreview").css("display", "none");
                $("#btnPreview").css("display", "block");
                $("#btnHide").css("display", "none");
                $("#uploadImage").css("display", "block");
            });
            $("#add_product").click(function(){
                clearForm();
                $("#form_modal").css("display", "block");
                $("#form_modal h2").text("Add a Product");
                $("#form_modal").attr("action", "/dashboards/add_product");
                $("#form_modal").attr("class", "form_add_product");
            });
            $("#close_icon").click(function(){
                clearForm();
                $("#form_modal").css("display", "none");
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
                    url: "<?php echo base_url('dashboards/get_product/');?>" + product_id,
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
                        $("#form_modal").attr("action", "<?php echo base_url('dashboards/edit_product');?>");
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
                        url: "<?php echo base_url('dashboards/edit_product'); ?>",
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
                                        url: "<?php echo base_url('dashboards/get_product/');?>" + id,
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
                        url: "<?php echo base_url('dashboards/add_product/');?>",
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
            $("#uploadImage button").click(function(event) {
                event.preventDefault();
                $(this).siblings("input[type='file']").trigger('click');
            });
        });
    </script>
</head>
<body>
    