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
        /* Login and Sign Up Modal */
        .login-background, .signup-background{
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .login{
            width: 700px;
            box-shadow: 0px 4.373316764831543px 14.869999885559082px 0px rgba(0, 0, 0, 0.57);
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 1);
            font-size: 16px;
            position: absolute;
            overflow: hidden;
            top: 5%;
            right: 25%;
            left: 25%;
        }
            .login header, .login label, #logo-login{
                padding: 0 50px;
            }
            #logo-login{
                padding-top: 50px;
            }
                .login header img, .login header h3, .login header a{
                    display: inline-block;
                    vertical-align: middle;
                }
                .login header h3{
                    font-size: 18px;
                    color: rgba(125, 125, 125, 1);
                    margin-left: 20px;
                }
                .login header a{
                    font-size: 16px;
                    color: rgba(156, 137, 255, 1);
                    background-color: rgba(255, 255, 255, 1);
                    width: 55%;
                    border-radius: 0;
                    padding: 0;
                    margin: 0;
                    text-align: right;
                }
            .login label{
                display: block;
                position: relative;
                margin: 20px 0;
            }
                .login input{
                    border: 1px solid rgba(156, 137, 255, 1);
                    width: 80%;
                    height: 50px;
                    border-radius: 10px;
                    padding-left: 20px;
                }
            .login footer{
                border-top: 1px solid rgba(226, 226, 226, 1);
                padding: 50px;
                margin-top: 50px;
            }
                .login footer input{
                    width: 83.9%;
                    background-color: rgba(156, 137, 255, 1);
                    color: rgba(255, 255, 255, 1);
                }
                #login-side-logo, .fa-circle-xmark{
                    position: absolute;
                }
                #login-side-logo{
                    height: 100%;
                    right: 0;
                    top: 0;
                }
                .fa-circle-xmark{
                    position: absolute;
                    right: 10px;
                    top: 10px;
                    visibility: visible;
                    color: rgba(255, 255, 255, 1);
                    z-index: 1;
                    font-size: 20px;
                }
                #first_name, #last_name{
                    display: inline-block;
                    padding: 0;
                    margin-right: 0;
                    width: 37.8%;
                    margin-bottom: 0;
                }
                #first_name{
                    margin-left: 50px;
                }
                .login-background, .signup-background{
                    display: none;
                }
    </style>
    <script>
        $(document).ready(function()
        {
            var login_background = document.getElementsByClassName('login-background')[0];
            var signup_background = document.getElementsByClassName('signup-background')[0];
            $('#login').click(function()
            {
                login_background.style.display = 'block';

            });
            $('#close-login').click(function()
            {
                login_background.style.display = 'none';
            });
            $('#signup').click(function()
            {
                signup_background.style.display = 'block';

            });
            $('#close-signup').click(function()
            {
                signup_background.style.display = 'none';
            });
        });
    </script>
</head>
<body>
    