<?php

if(!empty($_POST)) {

    $a = (int)$_POST['firstNumber'];
    $b = (int)$_POST['secondNumber'];
    $operation = $_POST['operation'];

    $result = mathOperation($a, $b, $operation);

    $res = [
        "status" => true,
        "a" => (int)$_POST['firstNumber'],
        "b" => (int)$_POST['secondNumber'],
        "operation" => $_POST['operation'],
        "result" => $result
    ];
    echo json_encode($res);
}


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
    return $b == 0 ? "Делить на ноль нельзя" : $a / $b;
}


function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'addition':
            return addition($arg1, $arg2);
        case 'subtraction':
            return subtraction($arg1, $arg2);
        case 'multiplication':
            return multiplication($arg1, $arg2);
        case 'division':
            return division($arg1, $arg2);
    }
}