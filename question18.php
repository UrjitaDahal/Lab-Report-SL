<?php
function absoluteDifference($n) {
    $difference = abs($n - 51); 
    
    if ($n > 51) {
        return 3 * $difference;  
    } else {
        return $difference;  
    }
}


$n = 70;

$result = absoluteDifference($n);
echo "The result is: $result";  
?>
