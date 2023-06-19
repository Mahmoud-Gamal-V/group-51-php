<?php

// Merges both arrays
$array1 = array('Mahmoud', 'Mohamed', 'Ahemd');
$array2 = array(50, 21, 44);

$result = array_merge($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";

#_____________________________________________________________________

//Checks if orange is in the array
$fruits = array('apple', 'banana', 'orange', 'pear');

if (in_array('orange', $fruits)) {
    echo "orange is in the array";
} else {
    echo "Didn't find orange in the array";
}


#_____________________________________________________________________

// finds whats in array1 and not in array2 (only values)
$array1 = array(1, 2, 3, 4, 5);
$array2 = array(3, 4, 5, 6, 7);

$result = array_diff($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";

#_____________________________________________________________________

//finds whats in array1 and not in array2 (comapres key and value)
$array1 = array(
    'Mahmoud' => 25,
    'Mohamed' => 20,
    'Ahmed' => 30
);
$array2 = array(
    'Mahmoud' => 25,
    'Mohamed' => 233,
    'Ahmed' => 30
);

$result = array_diff_assoc($array1, $array2);

echo "<pre>";
print_r($result);
echo "</pre>";
