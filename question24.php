<?php
function convertLastThreeToUpper($str) {
    
    if (strlen($str) < 3) {
        return strtoupper($str);
    }

   
    $frontPart = substr($str, 0, -3);
    $lastThree = substr($str, -3);


    return $frontPart . strtoupper($lastThree);
}


$string = "brainrot";

$result = convertLastThreeToUpper($string);
echo "Result: $result";  
?>
