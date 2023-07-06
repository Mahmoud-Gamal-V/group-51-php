<?php

var_dump($_FILES);

$myimg = $_FILES['myimg'] ;

$img_name = uniqid() . $myimg['name'];
$img_type = $myimg['type'];
$tmp_name = $myimg['tmp_name'];
$img_error = $myimg['error'];
$img_size = $myimg['size'];

$ext = ['jpg' , 'png' , 'jpeg'];

$explode = explode('.', $img_name); 
$end_of  = end($explode);
$final_ext = strtolower($end_of);

if(isset($myimg)) {
    if($img_error != 4) {
        if($img_size <= 524288) {
            if(in_array($final_ext, $ext)) {
                move_uploaded_file($tmp_name, 'uploads/uploadedimages/' . $img_name);
            }else {
                echo 'Extention Error';
            }
        }else {
            echo 'Size Error';
        }
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">

        <input type="file" name="myimg" id="">

        <button>Upload</button>

    </form>
</body>
</html>