<?php
function calculation($n) {
   
    if ($n <= 0) {
      return 0;
    }

   
    return ceil($n / 5);
}


$number = 13;
$cars= calculation($number);
echo "Number of cars needed: $cars";
?>
