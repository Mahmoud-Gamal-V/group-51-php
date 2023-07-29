<?php
session_start();

if(isset($_SESSION['email']) && ($_SESSION['email'] == 'admin@hti.com')){
}else {
    header('location:../Petshop/index.php');
}

require_once '../config.php';

$flag = 0;
$all_errors = [];

if(isset($_POST['name']) && ($_POST['email']) && ($_POST['password'])) {
    
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    
    
    
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
        header('location:table.php');
    }
}

?>








<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Users</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <span></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="table.php" class="nav-item nav-link"><i class="fa fa-table"></i>Users</a>
                    <a href="chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <a href="../PetShop/index.php" class="nav-item nav-link"><i class="fa fa-cloud"></i>Main web</a>
                    <a href="adduser.php" class="nav-item nav-link active"><i class="fa fa-user-edit"></i>Add User</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                    <?php if(isset($_SESSION['email'])):?>
                    
                    <a href= "../logout.php" class="d-none d-lg-inline-flex">Logout</a>
            <?php else : ?>
                <a href= "../login.php" class="d-none d-lg-inline-flex">Login</a>

            <?php endif ;?>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link Admin" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>

                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <form action="adduser.php" method="post">

                <div class="bg-secondary rounded h-100 p-4">
                    
                    <h6 class="mb-4">ADD USER</h6>
                    <?php if(!empty($all_errors)) : ?>
                    <?php foreach($all_errors as $error)  : ?>
                        <div class="alert  alert-danger">
                            <?=$error ?>
                        </div>
                        <?php endforeach ?>
                        <?php endif ?>
                    <div class="form-floating mb-3">  
                                <input type="text" name='name' class="form-control" id="floatingInput" placeholder="Username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">  
                                <input type="email" name='email' class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name='password' class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                        
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Mahmoud Gamal</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>