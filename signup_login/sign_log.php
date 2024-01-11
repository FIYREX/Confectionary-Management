<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<link rel="stylesheet" href="../style/sign.css">

<br>
<br>
    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome</h2>
            <label>
                <span>Email</span>
                <input type="email" />
            </label>
            <label>
                <span>Password</span>
                <input type="password" />
            </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="button" class="submit">Sign In</button>
         
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Create your Account</h2>
                <label>
                    <span>username</span>
                    <input type="text" name="username" size="15" maxlength="15" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" />                
                </label>
                <label>
                <label>
                    <span>First Name</span>
                    <input type="text" name="first_name" size="15" maxlength="15" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"/>                
                </label>
                <label>
                <label>
                    <span>Last Name</span>
                    <input type="text" name="last_name" size="15" maxlength="30" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"/>                
                </label>
                <label>
                <label>
                    <span>Email</span>
                    <input type="text" name="email" size="20" maxlength="40" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />                
                </label>
                <label>
                <label>
                    <span>phone Number</span>
                    <input type="text" name="phone_number" size="15" maxlength="15" value="<?php if (isset($_POST['phone_number'])) echo $_POST['phone_number']; ?>" />
                </label>
                <label>
                    <span>Email</span>
                    <input type="email" />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" />
                </label>
                <button type="button" class="submit">Sign Up</button>
                
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>