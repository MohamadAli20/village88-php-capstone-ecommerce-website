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
        }
        .show_category form figure, .show_category form p, .show_category form div{
            width: 120px;
            vertical-align: middle;
        }
        .form_add_product{
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
            .form_add_product h1, 
            .form_add_product label, 
            .form_add_product textarea, 
            .form_add_product input,
            .form_add_product select{
                display: block;
                margin: 5px 0;
            }
            .form_add_product label input, 
            .form_add_product textarea{
                width: 100%;
                resize: none;
            }
            .form_add_product textarea{
                height: 100px;
                overflow: auto;
            }
            .form_add_product p{
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
        .form_add_product footer{
            font-size: 16px;
            text-align: right;
            position: relative;
            padding: 10px 0;
        }
            .form_add_product footer #btnPreview, 
            .form_add_product footer input{
                display: inline-block;
            }
            .form_add_product footer a{
                text-decoration: underline;
                color: gray;
                position: absolute;
                line-height: 35px;
                left: 0;
                pointer-events: none;
                opacity: 0.5;
            }
    </style>
    <script>
        $(document).ready(function(){
            $("#btnPreview").click(function(){
                $('#imagePreview').css("display", "block");
            });
            $("#add_product").click(function(){
                $(".form_add_product").css("display", "block");
            });
            $("input[value='Cancel']").click(function(){
                $(".form_add_product").css("display", "none");
            });
            // // $("input[type='checkbox']").change(function(){
            // //     console.log("shdsjhdsk");
            // // });
            // console.log("sdhsds");

            $(".display_product").submit(function(e){
                /*
                    1. Show the modal to edit product but clear first the content
                    2. Display the information fromy the database of the product to be edited
                    3. Update the product in the database
                    Note: The product information displayed in the client side should be updated.
                */

                // product id inside the form
                let product_id = $(this)[0].querySelector("input[type='hidden']").value;

                /* borrow add product form for updating product information*/
                
                // Prevent default form submission behavior
                e.preventDefault();

                // Send AJAX request to fetch product data
                $.ajax({
                    url: "<?php echo base_url('admins/get_product/');?>" + product_id,
                    type: "GET",
                    success: function(data) {
                        $('input[name="name"]').val(data.name);
                        $('textarea[name="description"]').val(data.description);
                        $('select[name="category"]').val(data.category);
                        $('input[name="price"]').val(data.price);
                        $('input[name="stocks"]').val(data.stocks);

                        $(".form_add_product").css("display", "block");
                        $(".form_add_product h2").text("Edit a Product");
                        $(".form_add_product").attr("action", "<?php echo base_url('admins/edit_product/');?>" + product_id);
                        $("#btnPreview").css({
                            "opacity": "1",
                            "pointer-events": "auto",
                            "cursor": "default",
                            "color": "blue"
                        });

                        $("#btnPreview").click(function(){
                            displayImages(data.images);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                    
                });
                
                function displayImages(images){
                    const preview = document.getElementById('imagePreview');
                    

                    images = JSON.parse(images);
                    console.log(images);
                    let imagesArr = Object.keys(images);

                    for(let i = 0; i < imagesArr.length; i++){
                        let image = document.createElement("img");
                        image.style.maxWidth = '100px';
                        image.style.maxHeight = '100px';
                        image.setAttribute("src", "/"+images[imagesArr[i]]);
                    
                        let frame = document.createElement("div");
                        frame.className = "frame";
                        // frame.setAttribute("name", `image${len}`);

                        let closeIcon = document.createElement("i");
                        closeIcon.className ="fa-solid fa-circle-xmark";
                        closeIcon.setAttribute("name", "closeIcon");
                        // closeIcon.setAttribute("id", `image${len}`);
                        closeIcon.onclick = function(){
                            removeImage(this);
                        }

                        let label = document.createElement("label");
                        label.className = "checkboxes";
                        
                        let checkbox = document.createElement("input");
                        checkbox.setAttribute("type", "checkbox");
                        checkbox.setAttribute("name", "checkbox");
                        // checkbox.setAttribute("id", `checkbox${len}`);
                        // checkbox.setAttribute("value", len);
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
                    };
                };
            });
        });
    </script>
</head>
<body>
    