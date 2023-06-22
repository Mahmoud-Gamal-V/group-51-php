<?php 
require_once "data.php";

var_dump($_POST);

if( isset($_POST['username'])) {

$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];

}

?>


<form action="" method= "post">

    <div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
            <h3>Sign in here</h3>
                <div class="inputBox"> <input id="username" type="text" required name="username" placeholder="Username">
                <input id="email" type="text" required name="email" placeholder="Email">
                 <input id="pass" type="password" required name="password" placeholder="Password">
                 <input type="color" name="color" id="color">
                 <input type="date" name="date" id="date">
                 <input type="radio" name="radio" id="">
                 <select name="select" id="gender">
                    <option value="male">male</option>
                    <option value="male">female</option>
                 </select>
                 <input type="checkbox" name="checkbox" id="">
                 <textarea name="textarea" id="" cols="30" rows="10"></textarea>
                </div> <input type="submit" name="login" value="Login"> 
          
        </div>
</form>