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
        });
    </script>
</head>
<body>