<?php

function findLargest($num1, $num2, $num3)
{
  $largest = $num1;

  if ($num2 > $largest) {
    $largest = $num2;
  }

  if ($num3 > $largest) {
    $largest = $num3;
  }

  return $largest;
}


$num1 = 6;
$num2 = 2;
$num3 = 21;
$largestNumber = findLargest($num1, $num2, $num3);
echo "Among the Numbers $num1, $num2, and $num3. <br> The largest number is: $largestNumber";
?>