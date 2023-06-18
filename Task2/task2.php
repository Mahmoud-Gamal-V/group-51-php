<?php


$x = ['M' , 'a' , 'h' , 'm' , 'o' , 'u' , 'd'];
$y = ['' , '' , '' , '' , '' , '' , '' , 'G' , 'a' , 'm' , 'a' , 'l'];

var_dump($x + $y);  

print_r($x+$y);

$r = 50;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lec2</title>
</head>
<body>
  <?php if($r >=85) : ?>
    
    <h1> A </h1>

<?php elseif($r >= 70) : ?>

    <h1> B </h1>

<?php elseif($r >= 60) : ?>

    <h1> C </h1>

<?php elseif($r >= 50) : ?>

    <h1> D </h1>

<?php else : ?>
    
    <h1> F </h1>

 <?php endif ?>   

</body>
</html>
</html>