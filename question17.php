<?php
function computeSum($a, $b) {
    if ($a == $b) {
        return 3 * ($a + $b); 
    } else {
        return $a + $b; 
    }
}


$a = 7;
$b = 5;

$result = computeSum($a, $b);
echo "The result is: $result";  
?>
