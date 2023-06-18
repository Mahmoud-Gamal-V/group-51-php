<?php 

$x = 'Mahmoud';
$$x = 42020143;

print_r($x);
echo ('<br>');

print ($$x) . '<br>';
print($Mahmoud) . '<br>' .'<br>';

echo PHP_INT_MAX . '<br>';
echo PHP_INT_MIN . '<br> <br>';

echo ceil((0.2+0.1) * 10);



$parag =<<<'comparison'

1 - Syntax: echo is a language construct and doesn't require parentheses, while print is a function and requires parentheses. <br> <br>

Example: <br> 
echo "Hello World!" <br>
print("Hello World!") <br> <br>

2 - Return Value: echo does not return any value, while print returns 1. <br>
This means that print can be used as part of an expression and returns a value of 1, indicating success. <br> <br>
Example: <br>

$sum = 1 + print("Hello World!"); // $sum will be 2 <br>
$sum = 1 + echo "Hello World!"; // This produces a syntax error because echo does not return a value. <br> <br>

3 - Performance: echo is slightly faster than print because it doesn't return any value. However, the difference in speed is typically negligible. <br> <br>

4 - Usage: echo is more commonly used than print because it's shorter and easier to type. <br> 
However, some developers prefer to use print because it's more consistent with other programming languages.<br>


comparison;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahmoud</title>
    <h1> Echo vs print </h1>
</head>
<body><?= $parag ?>
    
</body>
</html>
