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
        .listed_items{
            margin-top: 20px;
        }
            .listed_items .cart_info{
                width: 750px;
                height: 100vh;
                /* border: 1px solid black; */
            }
            .listed_items .cart_info, .cart_info div, .other_info{
                display: inline-block;
                vertical-align: top;
            }
            .listed_items figure{
                padding: 0;
                margin: 0;
                margin-bottom: 20px;
                width: 750px;
                height: 119px;
                border-radius: 20px;
                background: rgba(255, 255, 255, 1);
                box-shadow: 0px 0px 14.869999885559082px 0px rgba(156, 137, 255, 0.33);
                position: relative;
                text-align: right;
            }
                .listed_items img{
                    height: 100%;
                    width: 150px;
                    position: absolute;
                    left: 0;
                    border-radius: 20px;
                }
                .listed_items img, .listed_items figcaption, .listed_items .fa-xmark{
                    display: inline-block;
                    vertical-align: middle;
                    margin: 0;
                    padding: 0;
                    text-align: center;
                }
                .listed_items span, label input[type='number']{
                    display: block;
                    text-align: center;
                }
                    label input[type='number']{
                        border: 1px solid rgba(212, 225, 236, 1);
                        width: 110px;
                        height: 50px;
                        border-radius: 10px;
                        color: rgba(161, 161, 161, 1);
                    }
                .listed_items figcaption label, .listed_items figcaption p{
                    height: 80px;
                    display: inline-block;
                    vertical-align: middle;
                    text-align: center;
                }
                .listed_items figcaption{
                    font-size: 16px;
                    color: rgba(125, 125, 125, 1);
                    line-height: 30px;
                    height: 100%;
                    width: 70%;
                    padding-left: 20px;
                    border-right: 1px solid rgba(241, 241, 241, 1);
                    text-align: right;
                    position: relative;
                }
                    figcaption .category{
                        position: absolute;
                        left: 0;
                    }
                    .listed_items .cart_info figcaption p, .listed_items .cart_info figcaption label{
                        margin: 0 10px;
                        height: 100%;
                        padding: 20px 0;
                    }
                        .listed_items figcaption p span{
                            color: rgba(121, 113, 217, 1);
                            background: rgba(241, 241, 241, 1);
                            padding: 5px 10px;
                            border-radius: 34px;
                            text-align: center;
                        }
                .listed_items .total_amount span{
                    width: 110px;
                    height: 45px;
                    border-radius: 10px;
                    background: rgba(246, 246, 246, 1);
                    font-size: 18px;
                    color: rgba(156, 137, 255, 1);
                    line-height: 45px;
                }
                .listed_items .fa-xmark{
                    padding: 15px;
                    color: rgba(202, 220, 237, 1);
                }
                .listed_items .no_cart{
                    width: 750px;
                    height: 200px;
                    border-radius: 20px;
                    background: rgba(255, 255, 255, 1);
                    box-shadow: 0px 0px 14.869999885559082px 0px rgba(156, 137, 255, 0.33);
                    text-align: center;
                    display: none;
                }
                    .listed_items .no_cart h3{
                        padding: 20px;
                        padding-top: 50px;
                    }
                    .listed_items .no_cart a{
                        width: 91.5%;
                        padding: 20px;
                        padding-left: 20px;
                        border-radius: 10px;
                        border: 1px solid rgba(156, 137, 255, 1);
                        background: rgba(255, 255, 255, 1);
                        color: rgba(156, 137, 255, 1);
                    }
            .other_info{
                width: 33%;
                margin-left: 10px;
            }
                .shipping_billing_info h3, .shipping_billing_info #checkbox{
                    margin-top: 0;
                    display: inline-block;
                    vertical-align: top;
                    width: 48%;
                    padding: 0;
                    margin: 0;
                    height: 50px;
                    line-height: 50px;
                }
                .shipping_billing_info input[type='checkbox']{
                    width: 15px;
                    margin: 0;
                    padding: 0;
                    display: inline-block;
                    vertical-align: top;
                    background: green;
                }
                .shipping_billing_info div{
                    width: 100%;
                    display: block
                }
                    .shipping_billing_info label{
                        width: 100%;
                        height: 80px;
                        display: inline-block;
                        vertical-align: middle;
                        text-align: center;
                    }
                        .shipping_billing_info label input{
                            width: 91.5%;
                            height: 50px;
                            padding-left: 20px;
                            border-radius: 10px;
                            border: 1px solid rgba(156, 137, 255, 1);
                            background: rgba(243, 248, 253, 1);
                        }
                    .shipping_billing_info div .name{
                        width: 49%;
                    }
                        .shipping_billing_info .name input{
                            width: 85%;
                        }
                    .shipping_billing_info .city_state_zipcode{
                        width: 32.5%;
                    }
                        .shipping_billing_info .city_state_zipcode input{
                            width: 74.5%;
                        }
                .shipping_billing_info p{
                    display: block;
                    width: 100%;
                    text-align: right;
                    padding: 10px 0;
                    margin: 0;
                    height: 30px;
                }
                .shipping_billing_info p span{
                    display: inline-block;
                    border-radius: none;
                    background-color: none;
                    width: 45%;
                    text-align: left;
                    background: rgba(243, 248, 253, 1);
                    color: rgba(184, 184, 184, 1);
                }
                .shipping_billing_info p .fees{
                    text-align: right;
                }
                .shipping_billing_info #total_fee{
                    border-top: 1px solid rgba(226, 226, 226, 1);
                }
                    .shipping_billing_info #total_amount{
                        color: rgba(156, 137, 255, 1);
                        font-size: 22px;
                    }
                .shipping_billing_info input[type="submit"]{
                    width: 98%;
                    height: 55px;
                    border-radius: 10px;
                    border: none;
                    background: rgba(156, 137, 255, 1);
                    color: #ffff;
                }
            #billing_info{
                display: none;
            }
        #gray_background{
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: none;
            z-index: 1;
        }
        .remove_modal{
            width: 317px;
            height: 119px;
            background: rgba(255, 255, 255, 1);
            border-radius: 20px;
            position: absolute;
            margin: 0;
            padding: 0;
            margin-left: 20px;
            color: rgba(184, 184, 184, 1);
            text-align: center;
            visibility: hidden;
        }
            .listed_items .remove_modal p{
                display: block;
                height: 0;
                width: 100%;
                padding: 10px 0 15px 0;
            }
            .listed_items .remove_modal button, .listed_items .remove_modal a{
                width: 80px;
                height: 34px;
                border-radius: 10px;
                border: 1px;
                background: rgba(255, 255, 255, 1);
            }
            .listed_items a{
                text-decoration: none;
            }
            .listed_items .remove_modal .btn_cancel, .btn_cancel a{
                border: 1px solid rgba(230, 240, 249, 1);
                color: rgba(161, 161, 161, 1);
            }
            .listed_items .remove_modal .btn_remove, .btn_remove a{
                border: 1px solid rgba(233, 141, 141, 1);
                color: rgba(233, 141, 141, 1);
            }
        #payment{
            width: 35%;
            border-radius: 20px;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0px 4.373316764831543px 21.866580963134766px 0px rgba(0, 0, 0, 0.07);
            text-align: center;
            position: absolute;
            top: 70px;
            right: 32.5%;
            left: 32.5%;
            box-sizing: border-box;
            display: none;
        }
            #payment header{
                padding: 25px 50px 0px 50px;
                position: relative;
                text-align: left;
            }
                #payment img{
                    margin-right: 20px;
                }
                #payment i{
                    position: absolute;
                    right: 20px;
                    top: 20px;
                }
            #payment main{
                padding: 20px;
            }
                #payment h3{
                    text-align: left;
                }
                #payment input{
                    width: 90%;
                    height: 50px;
                    border-radius: 10px;
                    border: 1;
                    border: 1px solid rgba(156, 137, 255, 1);
                    background: rgba(255, 255, 255, 1);
                    margin: 10px 0;
                    padding: 0 20px;
                }
                #payment div{
                    position: relative;
                    width: 99%;
                    height: 70px;
                }
                    #payment #expiration, #payment #cvc{
                        width: 39%;
                        position: absolute;
                    }
                    #payment #expiration{
                        left: 0;
                    }
                    #payment #cvc{
                        right: -2px;
                    }
                
            #payment footer{
                margin-bottom: 20px;
            }
                #payment p{
                    color: rgba(184, 184, 184, 1);
                    text-align: right;
                    margin-right: 50px;
                }
                #payment span{
                    color: rgba(156, 137, 255, 1);
                    font-size: 22px;
                }
                #payment input[type="submit"]{
                    background: rgba(156, 137, 255, 1);
                    color: white;
                    width: 90%;
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
    </style>
    <script>
        $(document).ready(function()
        {
            /*FOR LOGOUT*/
            var logout_modal = document.getElementById('logout_modal');
            $('#expand_more').click(function()
            {
                if(logout_modal.style.display === 'none')
                {
                    logout_modal.style.display = 'block';
                }
                else
                {
                    logout_modal.style.display = 'none';
                }
            });

            /*FOR MODAL*/
            $('.remove-button').click(function() {
                let cartId = $(this).data('cart-id');
                $('#product' + cartId).css('zIndex', '2');
                $('#remove_modal' + cartId).css({
                    'visibility': 'visible',
                    'zIndex': '2'
                });
                $('#gray_background').css('display', 'block');
            });

            $('.cancel-button').click(function() {
                let cartId = $(this).data('cart-id');
                $('#product' + cartId).css('zIndex', '');
                $('#remove_modal' + cartId).css('visibility', 'hidden');
                $('#gray_background').css('display', 'none');
            });
            $('.btn_remove').click(function(e) {
                e.preventDefault();
                /*update total items*/
                let currentTotalItems = $(this).data('total-amount');
                let totalItems = parseInt($("input[name='total_items']").val());
                let updatedTotalItems = totalItems - currentTotalItems;
                if(updatedTotalItems === null){
                    updatedTotalItems = 0;
                }
                $("#total_items").text(updatedTotalItems);
                $("input[name='total_items']").val(updatedTotalItems);
                /*update shipping fee*/
                let shippingFee = parseInt($("input[name='shipping_fee']").val()) - 35;
                $("#shipping_fee").text("$" + shippingFee);
                $("input[name='shipping_fee']").val(shippingFee);
                /*update total*/
                let total_fee = updatedTotalItems + shippingFee;
                $("#total_amount").text("$" + total_fee);
                $("input[name='total_fee']").val(total_fee);

                let cartId = $(this).data('cart-id');
                $.ajax({
                    url: "<?php echo base_url("/products/remove_cart_by_id/") ?>" + cartId,
                    type: "GET",
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
                $('#product' + cartId).remove(); /*remove cart item*/
                $('#gray_background').css('display', 'none');
                /*decrement the cart value*/
                let currentTotal = parseInt($("#total_cart").text()) - 1;
                $("#total_cart").text(currentTotal);
                $("input[name='num_items']").val(currentTotal);
                /*display no cart message if the currrent total is zero*/
                if(currentTotal === 0){
                    $(".no_cart").css('display', 'block');
                }
            });
            /*FOR NO CART MESSAGE*/
            let totalCart = parseInt($("#total_cart").text()); /*display no cart message if the currrent total is zero*/
            if(totalCart === 0){
                $(".no_cart").css('display', 'block');
            }

            /*FOR SHIPPING AND BILLING*/
            $("input[type='checkbox']").on('change', function() {
                let isChecked = $(this).is(':checked');
                
                if(!isChecked){
                    /*show the billing information form*/
                    $("#billing_info").css("display", "block");
                }
                else{
                    $("#billing_info").css("display", "none");
                }
            });

            function handleTotalItems(){
                $.ajax({
                    url: "<?php echo base_url("/products/get_total_items")?>",
                    type: "GET",
                    success: function(data){
                        if(data['total_items'] === null){
                            data['total_items'] = 0;
                        }
                        /*update total total items*/
                        $("#total_items").text("$" + data['total_items']);
                        $("input[name='total_items']").val(data['total_items']);
                        /*update total fee*/
                        let total_fee = parseInt(data['total_items']) + parseInt($("input[name='shipping_fee']").val());
                        $("#total_amount").text("$" + total_fee);
                        $("input[name='total_fee']").val(total_fee);
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                })
            }
            handleTotalItems();

            /*FOR PAYMENT*/
            $("#close_payment").click(function(){
                $("#payment").css("display", "none");
                $("#gray_background").css("display", "none");
            })
            $("#proceed_checkout").click(function(e){
                e.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow"); /*scroll up*/
                if(totalCart !== 0){
                    $("#payment").css({
                        "display": "block",
                        "zIndex": "2"
                    });
                    $("#gray_background").css({"display": "block"});
                }
            });

            $("#submit_payment").click(function(){
                
                $("#payment").css("display", "none");
                $("#gray_background").css("display", "none");
            
                /*collect the shipping information*/
                let formData = {};
                formData.mainImage = $(".main_image").first().attr("src");

                let isChecked = $("input[type='checkbox']").is(":checked");
                if(isChecked){
                    formData.shippingData = $("#shipping_info").serializeArray();
                    formData.billingData = $("#shipping_info").serializeArray();
                    formData.orderSummary = $("#order_summary").serializeArray();
                }
                else{
                    formData.shippingData = $("#shipping_info").serializeArray();
                    formData.billingData = $("#billing_info").serializeArray();
                    formData.orderSummary = $("#order_summary").serializeArray();
                }
                $.ajax({
                    url: "<?php echo base_url("/products/add_order"); ?>",
                    type: "POST",
                    data: formData,
                    success: function(response){
                        console.log(response);
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                })
            });
        });
    </script>
</head>
<body>