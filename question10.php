<?php
function areStringsEqual($string1, $string2) {
    
    return strlen($string1) === strlen($string2);
}


$string1 = "joshua";
$string2 = "vernon";

$result = areStringsEqual($string1, $string2);
echo $result ? "True" : "False"; 
?>
