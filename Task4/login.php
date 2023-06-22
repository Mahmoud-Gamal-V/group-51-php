<?php 
require_once "data.php";



if( isset($_POST['username'])) {

$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];


$flag = 0;
$all_errors = [];


if(! empty($username)) {
    if(strlen($username) > 8) {
        if(preg_match('/senior$/', $username)) {
            $flag++ ;
        } else {
            $all_errors['usernameRegx'] = 'it must end with senior';
        }
    } else {
        $all_errors['usernamelen'] = 'length > 8';
    }
} else {
    $all_errors['usernamef'] = 'enter username';
}

if(! empty($password)) {
    if(strlen($password) > 8) {
        if(preg_match('@[A-Z]@', $password)) {
            $flag++ ;
        } else {
            $all_errors['passRegx'] = 'there must be at least 1 capital letter';
        }
    } else {
        $all_errors['passlen'] = 'length > 8';
    }
} else {
    $all_errors['passf'] = 'enter password';
}

if(! empty($email)) {
    if(strlen($email) > 8) {
        if(preg_match('/.com$/', $email)) {
            $flag++;
        } else {
            $all_errors['emailRegx'] = 'it must end with .com';
        }
    } else {
        $all_errors['emaillen'] = 'length > 8';
    }
} else {
    $all_errors['emailf'] = 'enter email';
}

session_start();

foreach ($users as $user) {
    if ($user['name'] == $username && $user['password'] == $password && $user['email'] == $email) {
        if ($user['name'] == 'admin.senior' && $user['password'] == 'Admin123' && $user['email'] == 'admin@web.com') {
            $_SESSION['username'] = $username;
            $flag += 2;
        } else {
            $_SESSION['username'] = $username;
            $flag++;
        }
        break;
    }
}


if ($flag == 4) {
    if ($user['name'] == 'admin.senior') {
        header('location:dashboard.php?username=' . $username);
    } else {
        header('location:index.php?username=' . $username);
    }
} elseif ($flag == 5) {
    header('location:dashboard.php');
} else {
    echo "Failed try again";
}
}

?>

<style>
body{margin: 0;padding: 0;background: url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;height: 100vh;font-family: sans-serif;background-size: cover;background-repeat: no-repeat;background-position: center;overflow: hidden}@media screen and (max-width: 600px;){body{background-size: cover;: fixed}}#particles-js{height: 100%}.loginBox{position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 350px;min-height: 200px;background: #000000;border-radius: 10px;padding: 40px;box-sizing: border-box}.user{margin: 0 auto;display: block;margin-bottom: 20px}h3{margin: 0;padding: 0 0 20px;color: #59238F;text-align: center}.loginBox input{width: 100%;margin-bottom: 20px}.loginBox input[type="text"], .loginBox input[type="password"]{border: none;border-bottom: 2px solid #262626;outline: none;height: 40px;color: #fff;background: transparent;font-size: 16px;padding-left: 20px;box-sizing: border-box}.loginBox input[type="text"]:hover, .loginBox input[type="password"]:hover{color: #42F3FA;border: 1px solid #42F3FA;box-shadow: 0 0 5px rgba(0,255,0,.3), 0 0 10px rgba(0,255,0,.2), 0 0 15px rgba(0,255,0,.1), 0 2px 0 black}.loginBox input[type="text"]:focus, .loginBox input[type="password"]:focus{border-bottom: 2px solid #42F3FA}.inputBox{position: relative}.inputBox span{position: absolute;top: 10px;color: #262626}.loginBox input[type="submit"]{border: none;outline: none;height: 40px;font-size: 16px;background: #59238F;color: #fff;border-radius: 20px;cursor: pointer}.loginBox a{color: #262626;font-size: 14px;font-weight: bold;text-decoration: none;text-align: center;display: block}a:hover{color: #00ffff}p{color: #0000ff} 
</style>
<form action="" method= "post">

    <div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
            <h3>Sign in here</h3>
                <div class="inputBox"> <input id="username" type="text" required name="username" placeholder="Username">
                <input id="email" type="text" required name="email" placeholder="Email">
                 <input id="pass" type="password" required name="password" placeholder="Password">
                </div> <input type="submit" name="login" value="Login"> 
          
        </div>
</form>