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
        #listed_items{
            margin-top: 20px;
            
        }
            #listed_items div{
                display: inline-block;
                vertical-align: top;
            }
            #listed_items figure{
                padding: 0;
                margin: 0;
                margin-bottom: 20px;
                width: 750px;
                height: 119px;
                border-radius: 20px;
                background: rgba(255, 255, 255, 1);
                box-shadow: 0px 0px 14.869999885559082px 0px rgba(156, 137, 255, 0.33);
                position: relative;
            }
                #listed_items img{
                    height: 100%;
                }
                #listed_items img, #listed_items figcaption, #listed_items .fa-xmark{
                    display: inline-block;
                    vertical-align: middle;
                    margin: 0;
                    padding: 0;
                }
                #listed_items span, label select{
                    display: block;
                    text-align: center;
                }
                    label select{
                        border: 1px solid rgba(212, 225, 236, 1);
                        width: 110px;
                        height: 55px;
                        border-radius: 10px;
                        color: rgba(161, 161, 161, 1);
                    }
                #listed_items label, #listed_items p{
                    height: 80px;
                    display: inline-block;
                    vertical-align: middle;
                }
                #listed_items figcaption{
                    font-size: 16px;
                    color: rgba(125, 125, 125, 1);
                    line-height: 30px;
                    height: 100%;
                    width: 75%;
                    padding-left: 20px;
                    border-right: 1px solid rgba(241, 241, 241, 1);
                }
                    #listed_items p{
                        width: 50%;
                    }
                    #listed_items .total_amount, #listed_items label{
                        width: 20%;
                    }
                        #listed_items p span{
                            color: rgba(121, 113, 217, 1);
                            background: rgba(241, 241, 241, 1);
                            padding: 5px 10px;
                            border-radius: 34px;
                            width: 40px;
                            text-align: center;
                        }
                #listed_items .total_amount span{
                    width: 110px;
                    height: 45px;
                    border-radius: 10px;
                    background: rgba(246, 246, 246, 1);
                    font-size: 18px;
                    color: rgba(156, 137, 255, 1);
                    line-height: 45px;
                }
                #listed_items .fa-xmark{
                    padding: 15px;
                    color: rgba(202, 220, 237, 1);
                }
            #shipping_info{
                width: 35%;
                margin-left: 10px;
            }
                #shipping_info h3{
                    margin-top: 0;
                }
                #shipping_info div{
                    width: 100%;
                    display: block
                }
                    #shipping_info label{
                        width: 100%;
                    }
                        #shipping_info label input{
                            width: 91.5%;
                            height: 50px;
                            padding-left: 20px;
                            border-radius: 10px;
                            border: 1px solid rgba(156, 137, 255, 1);
                            background: rgba(243, 248, 253, 1);
                        }
                    #shipping_info div .name{
                        width: 49%;
                    }
                        #shipping_info .name input{
                            width: 85%;
                        }
                    #shipping_info .city_state_zipcode{
                        width: 32.5%;
                    }
                        #shipping_info .city_state_zipcode input{
                            width: 74.5%;
                        }
                #shipping_info p{
                    display: block;
                    width: 100%;
                    text-align: right;
                    padding: 10px 0;
                    margin: 0;
                    height: 30px;
                }
                #shipping_info p span{
                    display: inline-block;
                    border-radius: none;
                    background-color: none;
                    width: 45%;
                    text-align: left;
                    background: rgba(243, 248, 253, 1);
                    color: rgba(184, 184, 184, 1);
                }
                #shipping_info p .fees{
                    text-align: right;
                }
                #shipping_info #total_fee{
                    border-top: 1px solid rgba(226, 226, 226, 1);
                }
                    #shipping_info #total_amount{
                        color: rgba(156, 137, 255, 1);
                        font-size: 22px;
                    }
                #shipping_info input[type="submit"]{
                    width: 98%;
                    height: 55px;
                    border-radius: 10px;
                    border: none;
                    background: rgba(156, 137, 255, 1);
                    color: #ffff;
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
            top: 0;
            margin-left: 20px;
            color: rgba(184, 184, 184, 1);
            text-align: center;
            padding: 0 20px;
            text-align: left;
            visibility: hidden;
        }
            #listed_items .remove_modal p{
                display: block;
                height: 0;
                width: 100%;
                padding: 10px 0 15px 0;
            }
            #listed_items .remove_modal button, #listed_items .remove_modal a{
                width: 80px;
                height: 34px;
                border-radius: 10px;
                border: 1px;
                background: rgba(255, 255, 255, 1);
            }
            #listed_items a{
                text-decoration: none;
            }
            #listed_items .remove_modal .btn_cancel, .btn_cancel a{
                border: 1px solid rgba(230, 240, 249, 1);
                color: rgba(161, 161, 161, 1);
            }
            #listed_items .remove_modal .btn_remove, .btn_remove a{
                border: 1px solid rgba(233, 141, 141, 1);
                color: rgba(233, 141, 141, 1);
            }
    </style>
    <script>
        $(document).ready(function()
        {
            var background = document.getElementById('gray_background');
<?php       for($i = 1; $i <= 4; $i++)
            {   ?>
            $('#remove_product<?=$i?>').click(function()
            {
                var product<?=$i?> = document.getElementById('product<?=$i?>');
                var remove_modal<?=$i?> = document.getElementById('remove_modal<?=$i?>');
                product<?=$i?>.style.position = "absolute";
                product<?=$i?>.style.zIndex = 2;
                remove_modal<?=$i?>.style.visibility = "visible";
                background.style.display = "block";
            });
<?php       }   ?>
            // var btn_cancel = document.getElementsClassName('btn_cancel')[0];
            $('.btn_cancel').click(function()
            {
                console.log('hellow');
            });
        });
    </script>
</head>
<body>