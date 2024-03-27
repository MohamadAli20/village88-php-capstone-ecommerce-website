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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
                input[type="file"] {
                    /* display: none; */
                    /* display: block; */
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
        });
    </script>
</head>
<body>
    