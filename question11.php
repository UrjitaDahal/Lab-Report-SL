<?php
function isDivisible($number) {
   
    return $number % 5 === 0;
}


$number = 25;
$result = isDivisible($number);
echo $result ? "True" : "False"; 
?>
