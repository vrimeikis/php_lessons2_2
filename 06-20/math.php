<?php

$num1 = 4.755;
$num2 = -4.750;

echo abs($num1);

echo '<br/>';

echo abs($num2);
echo '<br/>';

echo ceil($num1);

echo '<br/>';
echo ceil($num2);


echo '<br/>';
echo floor($num1);
echo '<br/>';
echo floor($num2);

$array = [
    4,
    6,
    23,
    3,
    -56,
    -34,
    1,
];

echo '<br>';

echo max($array);
echo '<br/>';
echo max($num1, $num2);
echo '<br />';
echo min($array);
echo '<br />';
echo getrandmax();
echo '<br />';
echo rand(-50, 50);
echo '<br />';
echo mt_rand(-50, 50);
echo '<br />';
echo pi();
echo '<br />';
echo round($num2, 5);
echo '<br />';
echo sqrt($num1);
echo '<br/>';
echo time();
