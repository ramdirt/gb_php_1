<?php
/*
4. Реализовать функцию с тремя параметрами:
function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 */
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


function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case '+':
            return addition($arg1, $arg2);
        case '-':
            return subtraction($arg1, $arg2);
        case '*':
            return multiplication($arg1, $arg2);
        case '/':
            return division($arg1, $arg2);
    }
}

echo mathOperation(3, 4, '+');
echo '<br>';
echo mathOperation(3, 4, '-');
echo '<br>';
echo mathOperation(3, 4, '*');
echo '<br>';
echo mathOperation(3, 0, '/');
echo '<br>';