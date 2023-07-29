<?php

session_start();

require_once "config.php";

$query = mysqli_query($con , 'select * from users');
while($user = mysqli_fetch_assoc($query)){
    if($user['password'] == 'Admin123' && $user['email'] == 'admin@hti.com'){
        $adminFlag = true ;
    }else{
        $adminFlag = false;
    }
}
if($adminFlag == false){

    $check = mysqli_query($con, "SELECT * FROM users WHERE name='admin.hti' AND email='admin@hti.com' AND password='Admin123'");

if(mysqli_num_rows($check) == 0) {

    $query = mysqli_query($con, "INSERT INTO users (name, email, password) VALUES ('admin.hti', 'admin@hti.com', 'Admin123')");
}
}
if( isset($_POST['email'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $redirectflag = 0;
    $flag = 0;
    $all_errors = [];

    if(! empty($email)) {
        if(strlen($email) > 7) {
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
        if(strlen($password) > 7) {
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
    
}


if(isset($flag) && $flag == 2 ) {


    
    $q = 'select email , password from users';
    $result = mysqli_query($con, $q);
    $match = false;
    while($user = mysqli_fetch_assoc($result)) {
        if($user['email'] == $email && $user['password'] == $password) {
            $redirectflag = 1;
            $_SESSION['email'] = $email;
            $match = true;
            break;
        }
    }
    if(!$match) {
        $all_errors['login'] = 'Incorrect email or password';
    }

}


if(isset($redirectflag) && $redirectflag == 1) {
    if($_SESSION['email'] == 'admin@hti.com') {

        header('location:Dashboard/index.php');
    } else {

        header('location:PetShop/index.php');
    }
} 


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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
                    <h2>Sign in </h2>

                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit submit" value="Sign in"/>
                        <a href="registeration.php" class="submit-link submit">Sign Up</a>
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

