
<?php

$integer = 42; // Integer
$float = 3.14159; // Float
$string = "URJITA PROJECT"; // String
$boolean = true; // Boolean
$array = ["Apple", "Banana", "Cherry"]; // Array


echo "Integer: $integer\n";echo "<br>";
echo "Float: $float\n";echo "<br>";
echo "String: $string\n";echo "<br>";
echo "Boolean: " . ($boolean ? "true" : "false") . "\n";
echo "<br>";
print "\nUsing print:\n";
print "Integer: $integer\n";
print "Float: $float\n";
print "String: $string\n";
print "Boolean: " . ($boolean ? "true" : "false") . "\n";echo "<br>";

// b. Display content of array using print_r and var_dump
print "\nArray content using print_r:\n";
print_r($array);echo "<br>";

print "\nArray content using var_dump:\n";
var_dump($array);echo "<br>";


print "\nData type checks:\n";echo "<br>";
echo "\$integer is " . (is_int($integer) ? "an integer" : "not an integer") . "\n";echo "<br>";
echo "\$float is " . (is_float($float) ? "a float" : "not a float") . "\n";echo "<br>";
echo "\$string is " . (is_string($string) ? "a string" : "not a string") . "\n";echo "<br>";
echo "\$boolean is " . (is_bool($boolean) ? "a boolean" : "not a boolean") . "\n";echo "<br>";

?>
