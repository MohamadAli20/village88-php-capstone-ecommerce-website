<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Dashboard - Organic Shop</title>
    <link rel="stylesheet" href="/assets/normalize.css">
    <script src="https://kit.fontawesome.com/a68fd5bcf8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/assets/styles.css">
    <link rel="stylesheet" href="/assets/partial_admin_side_nav.css">
    <link rel="stylesheet" href="/assets/admin_order.css">
    <style>
        body{
            background: rgba(33, 35, 50, 1);
        }
            .admin_side_tab #orders{
                background-color: rgba(156, 137, 255, 0.2);
                border-top-right-radius: 11px;
                border-bottom-right-radius: 11px;
            }
            /* Logout modal */
            #logout_modal{
                position: absolute;
                top: 50px;
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
        $(document).ready(function(){
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
            $(".display_product").change(function(e){
                e.preventDefault();
                
                let status = $(this).children('select').val();
                let orderId = $(this).children("input[type='hidden']").val();

                $.ajax({
                    url: "<?php echo base_url('/dashboards/update_order'); ?>",
                    type: "POST",
                    data: {status: status, orderId: orderId},
                    success: function(response){
                        console.log(response);                     
                        location.reload();
                    },
                    error: function(xhr, status, error){
                        console.error(error);
                    }
                });
            });
            $("#expand_more").click(function(){
                $("#logout_modal").css("display", "block");
            });
        });
    </script>
</head>
<body>