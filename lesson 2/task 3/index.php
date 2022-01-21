<?php
/*
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return.
В делении проверьте деление на 0 и верните текст ошибки.
 */

$a = 5;
$b = 10;

function addition($a, $b) {
    return $a + $b;
}
function subtraction($a, $b) {
    return $a - $b;
}
function multiplication($a, $b) {
    return $a * $b;
}
function division($a, $b) {
    if ($b == 0) {
        echo "Делить на ноль нельзя";
    } else {
        return $a / $b;
    }
}

echo addition($a, $b);
echo '<br>';
echo subtraction($a, $b);
echo '<br>';
echo multiplication($a, $b);
echo '<br>';
echo division($a, $b);
echo '<br>';
echo division($a, 0);