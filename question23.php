<?php
function findLargest($a, $b, $c) {
    
    if ($a >= $b && $a >= $c) {
        return $a; 
    } elseif ($b >= $a && $b >= $c) {
        return $b; 
    } else {
        return $c; 
    }
}


$num1 = 20;
$num2 = 15;
$num3 = 10;

$largest = findLargest($num1, $num2, $num3);
echo "The largest number is: $largest"; 
?>
