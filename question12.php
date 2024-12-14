<?php
function getStringLength($string) {
   
    if ($string === "") {
        return 0;
    }
   
    return 1 + getStringLength(substr($string, 1));
}


$string = "Baekhyun";
$result = getStringLength($string);
echo "The length of the string is: $result"; 
?>
