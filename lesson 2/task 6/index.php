<?php
/*
6. *С помощью рекурсии организовать функцию возведения числа в степень.
Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 */
echo power(5,5);

function power($val, $pow) {
    if($pow != 0) {
        return $val * power($val, $pow - 1);
    }
    return 1;
}