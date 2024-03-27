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
        main .products-dashboard{
            padding: 0;
        }
            .categories, .products{
                display: inline-block;
                vertical-align: top;
            }
                .categories h3, .products h3{
                    font-size: 16px;
                    color: rgba(161, 161, 161, 1);
                }
            .categories{
                width: 100px;
                margin-right: 50px;
            }
                .categories figure{
                    width: 100px;
                    height: 100px;
                    display: block;
                    margin-bottom: 10px;
                    background: #FFFFFF;
                    box-shadow: 0px 3.17949px 11.9231px rgba(201, 201, 201, 0.2);
                    border-radius: 15.8974px;
                    text-align: center;
                    margin-left: 0;
                    position: relative;
                }
                .categories #active-category{
                    border: 2px solid rgba(207, 198, 255, 1);
                    height: 96px;
                    width: 96px;
                }
                .categories figure:hover{
                    box-shadow: 0px 3px 11px 0px rgba(156, 137, 255, 0.45);
                    height: 100px;
                }
                    figure h5{
                        color: rgba(153, 135, 250, 1);
                        background-color: rgba(237, 233, 255, 1);
                        width: 15px;
                        height: 15px;
                        border-radius: 100%;
                        padding: 4px 4px 4px 4px;
                        line-height: 17px;
                        font-size: 12px;
                        position: absolute;
                        right: 0;
                        top: 0;
                        margin: 5px 5px 0 0;
                    }
                    figure div{
                        width: 44px;
                        height: 44px;
                        position: relative;
                        margin: 0 auto;
                        top: 25px;
                        overflow: hidden;
                    }
                        figure figcaption{
                            color: rgba(161, 161, 161, 1);
                            margin-top: 30px;
                            font-size: 14px;
                        }
                        figure #all_products{
                            position: absolute;
                            left: -485px;
                            top: -185px;
                            width: 800px;
                        }
                        figure #vegetables{
                            position: absolute;
                            left: -558px;
                            top: -183px;
                            width: 800px;
                        }
                        figure #fruits{
                            position: absolute;
                            left: -630px;
                            top: -184px;
                            width: 800px;
                        }
                        figure #pork{
                            position: absolute;
                            left: -629px;
                            top: -243px;
                            width: 800px;
                        }
                        figure #beef{
                            position: absolute;
                            left: -700px;
                            top: -184px;
                            width: 800px;
                        }
                        figure #chicken{
                            position: absolute;
                            left: -629px;
                            top: -300px;
                            width: 800px;
                        }
            .products{
                width: 80%;
            }
                .products figure{
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
                .products figure:hover{
                    box-shadow: 0px 3px 11px 0px rgba(156, 137, 255, 0.45);
                }
                    .products figure img{
                        width: 220px;
                        height: 220px;
                        position: absolute;
                        left: 0;
                        top: -20px;
                    }
                    .products figure figcaption{
                        height: 70px;
                        position: absolute;
                        bottom: 0;
                        width: 220px;
                        background-color: white;
                    }
                        .products figure figcaption p{
                            display: inline-block;
                            vertical-align: bottom;
                            font-size: 11px;
                        }
                        .products .description{
                            width: 65%;
                            text-align: left;
                        }
                            .products .description span{
                                display: block;
                                font-size: 16px;
                                padding: 5px 0;
                            }
                            .products .description i{
                                display: inline-block;
                                padding-right: 1px;
                            }
                                .description .rated{
                                    color: rgba(255, 201, 63, 1);
                                }
                                .description .unrated{
                                    color: rgba(232, 232, 232, 1);
                                }
                        .products .price{
                            font-size: 16px;
                            color: rgba(121, 113, 217, 1);
                            background-color: rgba(241, 241, 241, 1);
                            border-radius: 34px;
                            padding: 5px 10px;
                        }
                .products ul{
                    text-align: right;
                }
                    .products ul li{
                        list-style: none;
                        display: inline-block;
                        border-radius: 5px;
                        background-color: rgba(255, 255, 255, 1);
                        width: 30px;
                        height: 30px;
                        text-align: center;
                        line-height: 33px;
                        color: rgba(176, 176, 176, 1);
                        font-size: 14px;
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
         $(document).ready(function() {
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
        });
    </script>
</head>
<body>
    