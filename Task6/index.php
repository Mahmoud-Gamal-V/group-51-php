<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multi Files</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="test">
    <input type="file" name="myimages[]" id="" multiple >
    <button>upload</button>
  </form>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $all_Errors = [];
    $file_Count = count($_FILES['myimages']['name']);
    $allowed_ext = ['pdf' , 'word' , 'jpg' ];
    

    for($i = 0 ; $i < $file_Count  ; $i++) {
        $explode = explode('.', $_FILES['myimages']['name'][$i]); 
        $endOf = end($explode); 
        $file_ext = strtolower($endOf);
        $fileName = uniqid() . $_FILES['myimages']['name'][$i];
        $tmpPath = $_FILES['myimages']['tmp_name'][$i];
        $size = $_FILES['myimages']['size'][$i];
        $error = $_FILES['myimages']['error'][$i];

        if($error == 4) {
            $all_Errors['noFile'] = '<div> Please choose file </div>';
        } else {
            if($size > 8388608) { 
                $all_Errors['fileSize'] = '<div> Please choose file less than 8 MB </div>';
            } else {
                if(!in_array($file_ext, $allowed_ext)) {
                    $all_Errors['fileExt'] = '<div> Please choose File that is pdf , word , jpg </div>';
                } else{
                    move_uploaded_file($tmpPath, $_SERVER['DOCUMENT_ROOT'] . '/Backend/Lec6/upload/' . $fileName);

                    }
                }
            }
        }
        
        if(isset($all_Errors) && !empty($all_Errors)) {
            foreach ($all_Errors as $value) {
                echo $value ;
            }
        }
        
    }
?>
