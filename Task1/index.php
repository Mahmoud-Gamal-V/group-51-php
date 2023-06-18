<?php

$name = 'Mahmoud';
$age = 60 ;

$parag =<<<comparison

an interpreter translates the source code line by line or statement by statement into machine code during execution. <br>
This means that the source code is interpreted every time it is executed, and the resulting machine code is executed immediately without being saved to a separate file. <br>
The interpretation process includes similar stages to those used in compilation, but they are performed during execution instead of beforehand. <br>

comparison;


echo "My name is $name"; 
echo '<br>' ;
echo "My age is $age";
var_dump($name,$age);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <h1> Compiler </h1>
    
</head>
<body>
A compiler translates the entire source code into machine code before execution. <br>
This means that the source code is compiled once and the resulting executable file can be executed many times without requiring re-compilation. <br>
The compilation process includes multiple stages, such as lexical analysis, syntax analysis, semantic analysis, code optimization, and code generation. <br>
Once the code is compiled, the resulting executable file can be executed directly by the computer's processor. <br>
</body>

</html>

<head>
<h1> Interpreter </h1>
</head>

<body><?= $parag ?>

</body>
</html>