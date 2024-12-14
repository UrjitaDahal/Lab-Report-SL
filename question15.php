<?php
function getValueAtIndex($array, $index) {
    if (isset($array[$index])) {
        return $array[$index];
    } else {
        return "Error: Index out of bounds.";
    }
}
$array = ["apple", "banana", "cherry", "date"];
$index = 2;
$result = getValueAtIndex($array, $index);
echo $result; 
?>
