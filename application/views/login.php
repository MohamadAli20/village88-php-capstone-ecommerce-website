<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Organic Shop</title>
    <link rel="stylesheet" href="/assets/normalize.css">
    <script src="https://kit.fontawesome.com/a68fd5bcf8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/assets/styles.css">
    <style>
        form{
            width: 700px;
            box-shadow: 0px 4.373316764831543px 14.869999885559082px 0px rgba(0, 0, 0, 0.57);
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 1);
            font-size: 16px;
            position: relative;
            overflow: hidden;
            right: 25%;
            left: 25%;
        }
            .login_result{
                text-align: center;
                height: 50px;
                display: block;
            }
                header .error{
                    color: red;
                }
                header .success{
                    color: green;
                }
            .login_result p{
                display: inline-block;
                font-size: 16px;
            }
            header, label, #logo-login{
                padding: 0 50px;
            }
            #logo-login{
                padding-top: 50px;
            }
                header img, header h3, header a{
                    display: inline-block;
                    vertical-align: middle;
                }
                header h3{
                    font-size: 18px;
                    color: rgba(125, 125, 125, 1);
                    margin-left: 20px;
                }
                header a{
                    font-size: 16px;
                    color: rgba(156, 137, 255, 1);
                    background-color: rgba(255, 255, 255, 1);
                    width: 55%;
                    border-radius: 0;
                    padding: 0;
                    margin: 0;
                    text-align: right;
                }
            label{
                display: block;
                position: relative;
                margin: 20px 0;
            }
                input{
                    border: 1px solid rgba(156, 137, 255, 1);
                    width: 80%;
                    height: 50px;
                    border-radius: 10px;
                    padding-left: 20px;
                }
            footer{
                border-top: 1px solid rgba(226, 226, 226, 1);
                padding: 20px;
                margin-top: 50px;
            }
                footer input{
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
    </style>
</head>
<body>
    <header class="login_result">
<?php   $errors = $this->session->userdata('errors');
        $success = $this->session->userdata('success');
        if(!empty($errors))
        { ?>
        <div class="error"><?= $errors; ?></div>
<?php   $this->session->unset_userdata('errors');
        } 
        if(!empty($success))
        { ?>
        <p class="success"><?= $success ?></p>
<?php   $this->session->unset_userdata('success');
        } ?>
    </header>
    <form id="login-form" class="login" action="/products/verify" method="post">
        <img id="logo-login" src="/assets/logo.svg" alt="e-commerce logo of the company">
        <header>
            <img src="/assets/smiley-face.svg" alt="a smiley face">
            <h3>Login to order.</h3>
            <a href="/products/signup">New Member? Register here.</a>
        </header>
        <label>
            <input type="text" placeholder="Email" name="email">
        </label>
        <label>
            <input type="password" placeholder="Password" name="password">
        </label>
        <footer>
            <input type="submit" value="Signup">
        </footer>
        <a href="/"><i id="close-login" class="fa-solid fa-circle-xmark"></i></a>
        <img id="login-side-logo" src="/assets/login_side_logo.svg" alt="e-commerce logo with onion leaves in the background">
    </form>
</body>
</html>