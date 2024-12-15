<?php
function addIfToFront($str) {
   
    if (substr($str, 0, 2) === "if") {
        return $str;  
    } else {
        return "if " . $str;  
    }
}


$inputString = "example";

$result = addIfToFront($inputString);
echo "Result: $result";  
?>
