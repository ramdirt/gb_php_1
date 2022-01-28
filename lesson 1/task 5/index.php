<?php
$a = 1;
$b = 2;

echo "До изминения: a = $a";
echo "<br>";
echo "До изминения: b = $b";

$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

echo "<br><br>";
echo "После изминения: a = $a";
echo "<br>";
echo "После изминения: b = $b";
