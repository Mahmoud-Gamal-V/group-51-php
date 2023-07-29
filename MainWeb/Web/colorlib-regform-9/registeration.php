<?php
require_once "config.php";

if( isset($_POST['username'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    
    
    $flag = 0;
    $all_errors = [];
    
    if(! empty($username)) {
        if(strlen($username) >= 7) {
            if(preg_match('/hti$/', $username)) {
                $flag++ ;
            } else {
                $all_errors['usernameRegx'] = 'Username must end with hti';
            }
        } else {
            $all_errors['usernamelen'] = 'Username must have length >= 7';
        }
    } else {
        $all_errors['usernamef'] = 'Enter username';
    }

    if(! empty($email)) {
        if(strlen($email) >= 7) {
            if(preg_match('/.com$/', $email)) {
                $flag++;
            } else {
                $all_errors['emailRegx'] = 'Email must end with .com';
            }
        } else {
            $all_errors['emaillen'] = 'Email must have length >= 7';
        }
    } else {
        $all_errors['emailf'] = 'Enter email';
    }
    
    if(! empty($password)) {
        if(strlen($password) >= 7) {
            if(preg_match('@[A-Z]@', $password)) {
                $flag++ ;
            } else {
                $all_errors['passRegx'] = 'Password must have at least 1 capital letter';
            }
        } else {
            $all_errors['passlen'] = 'Password must have length >= 7';
        }
    } else {
        $all_errors['passf'] = 'Enter password';
    }
    

    $user_query = mysqli_query($con, "SELECT * FROM users WHERE name = '$username'");
    $user = mysqli_fetch_assoc($user_query);
    
    if ($user) {
        $all_errors['username'] = 'This username is already taken';
    }
    
    $email_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
    $email_user = mysqli_fetch_assoc($email_query);
    
    if ($email_user) {
        $all_errors['email'] = 'This email is already taken';
    }
    
    if (empty($all_errors)) {
        mysqli_query($con, "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')");
        header('location:login.php');
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="main">
        
        <div class="container">
            <div class="signup-content">
                <?php if(!empty($all_errors)) : ?>
                    <?php foreach($all_errors as $error)  : ?>
                        <div class="alert  alert-danger">
                            <?=$error ?>
                        </div>
                        <?php endforeach ?>
                        <?php endif ?>
                <form method="POST" id="signup-form" class="signup-form">
                    <h2>Sign up </h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="username" id="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit submit" value="Sign up"/>
                        <a href="login.php" class="submit-link submit">Sign in</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

