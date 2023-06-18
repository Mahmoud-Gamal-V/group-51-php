<?php

// Indexed Array

// $allLangs = ['php', 'js', 'pyth'] ; 

// $allLangs[2] = 'python'; // Editing value on index 2

// echo $allLangs[2] ; // print value on index 2 

// echo $allLangs[] = 'us'; // push method

// array_push($allLangs, 's', 'a'); // uncommon push method

// var_dump($allLangs);

// echo "<pre>";
// print_r($allLangs);
// echo "</pre>";

# _______________________________________________________________________________________________

// Associative Array  => assoc 

// $allProgLangs = ['laravel' => 'php' , 'spring' => 'java' , 'rails' => 'ruby'];

// echo $allProgLangs['laravel'];
// echo "<br>";
// echo $allProgLangs['spring'];
// echo "<br>";
// echo $allProgLangs['rails'];
// echo "<br>";

// $allProgLangs['js'] = 'nextJs'; //push method 

// var_dump($allProgLangs);

// $user = ['username' => 'Mahmoud' , 'password' => '123' , 'email' => 'mahmoud@gmail.com'];

# ________________________________________________________________________________________________

// Multidimensional Array

// $Products = [
    
//     ['proName' => 'glasses' , 'price' => 120],
//     ['proName' => 'watch' , 'price' => 300]
// ];

// echo "<pre>";
// print_r($Products);
// echo "<pre>";

// $employees = [

//     'employee1' => [
//         'name' => 'ahmed sayed',
//         'age' => 20 , 
//         'address' => 'cairo' ,
//         'phones' => [123,25,55]
//     ],
//     'employee2' => [
//         'name' => 'mohamed sayed',
//         'age' => 25 , 
//         'address' => 'giza' ,
//         'phones' => [777,888,69]
// ]

// ];

// var_dump($employees['employee1']);

#_________________________________________________________________________________________________

// $arrTest = [10 , 20 , 30 , 0 => 11 , 40 , 50];

// echo $arrTest[0] ; 

// var_dump($arrTest);

// $arrTest = ['a' => 'ahmed' , 'b' => 'mohamed' , 'a' => 'ayman'];

// var_dump($arrTest['a']); // = ayman because it overrides

// $arr = [true => 'sayed' , null => 'ahmed' , 1 => '1' , '1' => 'string 1' , 1.8 => 'floatNumber'];

// echo $arr['']; // ahmed 
// echo "<br>";
// echo $arr[null]; // ahmed
// echo "<br>";
// echo $arr[true]; // floatNumber


// $arr = [1 , 2 , 3 , 40 => 4 , 5 , 6];

// // $arr[] = 7; // push method 
// // $val = array_pop($arr); // removes last element
// // $val = array_shift($arr); //Reindex
// // unset($arr[2], $arr[0]); // removes key without reindex
// // var_dump($arr);
// // var_dump($val);

// var_dump(array_key_exists(0, $arr)); // Check if key exists

// var_dump(isset($arr[0])); // check if key exists (mostly used - easier)

#___________________________________________________________________________________________________

// Operators    Arithmetic Operators + - * / % **

// $x = 10 ;
// $y = 2 ;

// var_dump($x + $y);
// var_dump($x - $y);
// var_dump($x * $y);
// var_dump($x / $y);
// var_dump($x % $y);
// var_dump($x ** $y);

// $a = 10.2;
// $b = 2.8;

// var_dump($a + $b);
// var_dump($a - $b);
// var_dump($a * $b);
// var_dump($a / $b);
// var_dump($a % $b);
// var_dump($a ** $b);

// $x = '10'; // string '10'
// $x1 = -'10'; // int -10 
// $x2 = +'10'; // int 10 
// $x3 = +'10ahmed'; // int 10

// var_dump($x,$x1,$x2,$x3);

// $x = 10.6 ;
// $y = 2.8 ; 
// // $y1 = 2.0 ; 
// // $y2 = '2' ; 
// // $y3 = 0 ;

// var_dump(fdiv($x , $y3));  // infinity [allows division by zero]
// var_dump(fmod($x , $y));  // allows using remainder for float numbers

#______________________________________________________________________________________________________

// Assignment Operators = += -= **=

// $x = 10;
// $x = $y = 100; // from right to left (X = 100)

// $y = 5;
// $y = $y +5; // y$ += 5  (y =  10)

// $x = 'Mahmoud';
// $x .= ' is my name'; // it adds to to the x string

// echo $x;

#______________________________________________________________________________________________________

// Comparison Operators  == === != !== <>  > >=  < <=  (<=>  -1 0 1)

// var_dump(10 <=> 8); // = 1


// $is_user_logged_in = true;

// // if($is_user_logged_in == true) {
// //     echo "<button> logout </button>" ;
// // } else {   
// //     echo "<button> login </button>" ;
// // }

// // $status = $is_user_logged_in == true ?
// //    "<button> logout </button>"  :
// //    "<button> login </button>"  ; 

// // echo $status;

// $user = 'admin';
// $status = $is_user_logged_in == true ?(

//     $user != 'guest' ? 
//     "<button> logout </button> <button> complete your profile </button>"
//     : "<button> register guest </button>" 
// )

// : "<button> login </button>"  ; 

// echo $status;   


// $path = null ; 

// $url = $path ?: '/';  // falsy values
// $url = $path ?? '/';  // only null value

// echo $url;


// $x = 5;
// echo $x++; // post increment 5
// echo $x; // 6
// echo ++$x; // pre increment 7
// echo $x; // 7

// $j = null;
// echo ++$j; // 1

// $n = 'Mahmoud';
// echo ++$n;

#___________________________________________________________________________________________________

// Logical Operators 
// && and => must be true 
// || or => one true is enough
// xor one true but not both

// 0 => 0000 0000
// 1 => 0000 0001

// var_dump(5 & 6); // 0000 0101 (5) & 0000 0110 (6) => 0000 0100 (4)   [AND]
// var_dump(5 | 9); // 0000 0101 (5) & 0000 1001 (9) => 0000 1101 (13)  [OR ]
// var_dump(5 ^ 9); // 0000 0101 (5) & 0000 1001 (9) => 0000 1100 (12)  [XOR]

// $x = 6;  // 0110 after 011
// $y = 1;
// var_dump($x >> $y); //shift from the right

// $x = 6;  // 0110 after 0011 0000
// $y = 3;
// var_dump($x << $y); // adds 3 zeros

#________________________________________________________________________________________________

//Array Operators

// $x = ['a' , 'b' , 'c'];
// $y = ['e' , 'f' , 'g' , 'h' , 'l'];

// var_dump($x + $y);  // [a , b , c , h , l]

// $x = [ 'a' => 1, 'b' => 2, 'c' => 3];
// $y = [ 'd' => 1, 'e' => 2, 'f' => 3];

// var_dump($x == $y); // Compare key and value 

// //1
// if(condition){

// }

// //2
// if(condition){

// }else{

// }

// //3
// if(condition){

// }elseif{

// }else{

// }

// $r = 98;
// if($r){
//     echo "a";
// }elseif($r <=90 && $r > 50){
//     echo "b";
// }else{
//     echo "f";
// }





$r = 98;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php if($r >90) : ?>
    
    <h1> A </h1>

<?php elseif($r <= 90 && $r > 50) : ?>

    <h1 style="background-color: red;" > B </h1>

<?php else : ?>
    
    <h1> fail </h1>

 <?php endif ?>   

</body>
</html>