<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="/assets/normalize.css">
    <script src="https://kit.fontawesome.com/a68fd5bcf8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/assets/styles.css">
    <style>
        main div{
            margin: 0;
            padding: 0;
        }
            main i, main h3{
                display: inline-block;
                vertical-align: middle;
            }
            main i{
                color: rgba(156, 137, 255, 1);
            }
            main div h3, a{
                padding-top: 3px;
                color: rgba(161, 161, 161, 1);
            }
            a{
                text-decoration: none;
                font-weight: bold;
            }
        main #product_view_form{
            background-color: rgba(255, 255, 255, 1);
            border-radius: 20px;
            width: 1000px;
            padding-bottom: 20px;
        }
            #product_view_form figure{
                padding: 0;
                margin: 0;
                height: 250px;
            }
                #product_view_form #main_image,
                #product_view_form figcaption{
                    display: inline-block;
                }
                #product_view_form #main_image{
                    width: 300px;
                    height: 100%;
                    border-radius: 20px;
                    overflow: hidden;
                    box-shadow: 0px 3.17949px 11.9231px rgba(201, 201, 201, 0.2);
                }
                #product_view_form #main_image img{
                    width: 100%;
                    height: 100%;
                }
                #product_view_form figcaption{
                    width: 60%;
                    margin: 40px;
                    color: rgba(125, 125, 125, 1);
                    line-height: 25px;
                    border-bottom: 1px solid rgba(241, 241, 241, 1);
                    margin-top: 0;
                    height: 100%;
                }
                #product_view_form figcaption span{
                    display: block;
                }
                #product_view_form img, #product_view_form figcaption{
                    display: inline-block;
                    vertical-align: top;
                }
                #product_view_form img{
                    width: 300px;
                }
                #product_category{
                    font-size: 26px;
                    color: rgba(125, 125, 125, 1);
                }
                #product_view_form figcaption i{
                    font-size: 11px;
                    color: rgba(255, 201, 63, 1);
                }
                #product_view_form figcaption p{
                    display: inline-block;
                    vertical-align: top;
                }
                #rating{
                    color: rgba(125, 125, 125, 1);
                    font-size: 12px;
                    margin-top: 5px;
                }
                #price{
                    color: rgba(121, 113, 217, 1);
                    background-color: rgba(241, 241, 241, 1);
                    border-radius: 33.43px;
                    width: 50px;
                    text-align: center;
                    padding-top: 0;
                    padding: 5px 10px;
                    margin: 20px;
                }
                #product_view_form figcaption #description{
                    display: block;
                    overflow: auto;
                    height: 150px;
                    position: relative;
                    bottom: 0;
                }
                #product_view_form footer .other_image{
                    overflow: hidden;
                    width: 100px;
                    height: 100px;
                    border-radius: 10px;
                    box-shadow: 0px 3.17949px 11.9231px rgba(201, 201, 201, 0.2);
                }
                #product_view_form footer figure img{
                    width: 100px;
                    height: 100px;

                }
            footer{
                padding: 20px;
                position: relative;
            }
                footer figure, footer form{
                    display: inline-block;
                    vertical-align: top;
                }
                footer form{
                    text-align: center;
                    padding: 0 20px;
                    position: absolute;
                    right: 0;
                }
                    footer label, footer p, footer button{
                        display: inline-block;
                        vertical-align: bottom;
                        margin: 0;
                        padding: 0;
                    }
                        footer label input[type="number"], footer p span{
                            display: block;
                        }
                        footer label, footer p{
                            width: 20%;
                            padding: 0 20px 0 10px;
                            color: rgba(125, 125, 125, 1);
                        }
                            footer label input[type="number"], footer p span, footer button{
                                width: 100px;
                                height: 50px;
                                border-radius: 10px;
                                text-align: center;
                            }
                            footer label input[type="number"]{
                                border: 1px solid rgba(212, 225, 236, 1);
                            }
                            footer p span{
                                background-color: rgba(246, 246, 246, 1);
                                line-height: 55px;
                            }
                            footer button{
                                color: rgba(156, 137, 255, 1);
                                border: 1px solid rgba(156, 137, 255, 1);
                                width: 200px;
                                background-color: rgba(255, 255, 255, 1);
                            }
                .similar_items a figure{
                    width: 220px;
                    height: 250px;
                    display: block;
                    margin-bottom: 10px;
                    background: #FFFFFF;
                    box-shadow: 0px 3.17949px 11.9231px rgba(201, 201, 201, 0.2);
                    border-radius: 15.8974px;
                    text-align: center;
                    margin-left: 0;
                    position: relative;
                    overflow: hidden;
                    display: inline-block;
                    white-space: nowrap;
                    font-size: 0;
                    margin-right: 10px;
                }
                .similar_items a figure:hover{
                    box-shadow: 0px 3px 11px 0px rgba(156, 137, 255, 0.45);
                }
                .similar_items a figure img{
                        width: 220px;
                        height: 220px;
                        position: absolute;
                        left: 0;
                        top: -20px;
                    }
                    .similar_items a figure figcaption{
                        height: 70px;
                        position: absolute;
                        bottom: 0;
                        width: 220px;
                        background-color: white;
                    }
                        .similar_items a figure figcaption p{
                            display: inline-block;
                            vertical-align: bottom;
                            font-size: 11px;
                        }
                        .similar_items .description{
                            width: 65%;
                            text-align: left;
                        }
                            .similar_items .description span{
                                display: block;
                                font-size: 16px;
                                padding: 5px 0;
                            }
                            .similar_items .description i{
                                display: inline-block;
                                padding-right: 1px;
                            }
                                .description .rated{
                                    color: rgba(255, 201, 63, 1);
                                }
                                .description .unrated{
                                    color: rgba(232, 232, 232, 1);
                                }
                        .similar_items .price{
                            font-size: 16px;
                            color: rgba(121, 113, 217, 1);
                            background-color: rgba(241, 241, 241, 1);
                            border-radius: 34px;
                            padding: 5px 10px;
                        }
        #logout_modal{
            position: absolute;
            top: 70px;
            right: 10px;
            font-size: 16px;
            width: 200px;
            height: 64px;
            box-shadow: 0px 4.373316764831543px 12px 0px rgba(156, 137, 255, 0.28);
            background-color: rgba(255, 255, 255, 1);
            border-radius: 20px;
            display: none;
        }
            #logout_modal p, #logout_modal i{
                display: inline-block;
                vertical-align: middle;
                color: rgba(120, 120, 120, 1);
                margin: 0;
                line-height: 65px;
            }
            #logout_modal p{
                width: 60%;
                margin-left: 20px;
            }
            #logout_modal i{
                font-size: 22px;
                color: rgba(208, 199, 253, 1);
                margin-right: 20px;
            }
        #modal_background{
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }
            .success_added{
                position: absolute;
                width: 557px;
                height: 123px;
                top: 250px;
                right: 33.3%;
                left: 33.3%;
                border-radius: 20px;
                background-color: rgba(255, 255, 255, 1);
                line-height: 90px;
            }
                .success_added i, .success_added p{
                    display: inline-block;
                }
                .success_added .fa-check{
                    border-radius: 100%;
                    background-color: rgba(85, 204, 133, 1);
                    font-size: 20px;
                    color: #ffffff;
                    padding: 10px;
                }
                .success_added p{
                    color: rgba(125, 125, 125, 1);
                    font-size: 16px;
                    width: 70%;
                }
                .success_added i{
                    margin: 0 5%;
                }
                .success_added .fa-xmark{
                    color: rgba(202, 220, 237, 1);
                    font-size: 20px;
                }
    </style>
    <script>
         $(document).ready(function() {
            var modal = document.getElementById('modal_background');
            $('#add_to_cart').submit(function(event){
                event.preventDefault();
                modal.style.display = 'block';

                /*send post data to controller*/
                var formData = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
                /*increment the cart value*/
                let currentTotal = parseInt($("#total_cart").text());
                $("#total_cart").text(currentTotal + 1);
            });
            $('#close_success').click(function(){
                modal.style.display = 'none';
            });
            var logout_modal = document.getElementById('logout_modal');
            $('#expand_more').click(function(){
                if(logout_modal.style.display === 'none')
                {
                    logout_modal.style.display = 'block';
                }
                else
                {
                    logout_modal.style.display = 'none';
                }
            });
            $("#add_to_cart input[type='number']").on('input', function(e){
                let quantity = e.target.value;
                let price = parseInt($("#add_to_cart input[name='price']").val());
                let total = price * quantity;
                $("#total_amount").text("$ " + total);
                $("input[name='total_price']").val(total);
            });
            /*handle search*/
            function handleSearch(){
            let name = $("#form_success_nav").find("input[name='search']").val();
            let url = "<?php echo base_url('/product_view/')?>" + encodeURIComponent(name);

            /*replace the current URL in the address bar*/
            history.replaceState(null, '', url);

            $.ajax({
                url: url,
                type: "GET",
                success: function(data){
                    location.reload();
                }, 
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        }
            $("#form_success_nav").submit(function(e){
                e.preventDefault();
                handleSearch();
            });
            $("#btn-search").click(function(e){
                e.preventDefault();
                handleSearch();
            });
        });
    </script>
</head>
<body>
    