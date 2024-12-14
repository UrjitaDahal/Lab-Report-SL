<?php
function getStringIndex($array, $string) {
    $index = array_search($string, $array);
    return $index !== false ? $index : -1;
}
$array = ["apple", "banana", "cherry", "headphones"];
$string = "cherry";
$result = getStringIndex($array, $string);
echo $result !== -1 
    ? "The index of '$string' is: $result" 
    : "the string is not found";
?>
