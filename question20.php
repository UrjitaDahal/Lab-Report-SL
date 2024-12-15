<?php
function repeatFrontTwo($str) {
   
    if (strlen($str) < 2) {
        return $str; 
    }

   
    $frontTwo = substr($str, 0, 2);

   
    return str_repeat($frontTwo, 4);
}


$inputString = "door";

$result = repeatFrontTwo($inputString);
echo "Result: $result"; 
?>
