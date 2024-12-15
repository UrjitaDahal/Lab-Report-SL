<?php
function addfront($str) {
 
    $firstThree = strlen($str) < 3 ? $str : substr($str, 0, 3);

    
    return $firstThree . $str . $firstThree;
}


$inputString = "brainrot";

$result = addfront($inputString);
echo "Result: $result";  
?>
