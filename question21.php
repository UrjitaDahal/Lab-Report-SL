<?php
function addLastChar($str) {
    
    if (strlen($str) < 1) {
        return "Invalid input";
    }

  
    $lastChar = substr($str, -1);

    
    return $lastChar . $str . $lastChar;
}


$inputString = "brainrot";

$result = addLastChar($inputString);
echo "Result: $result";  
?>
