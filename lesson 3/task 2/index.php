<?php
/*
2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.
 */
$number = 0;
$max = 10;
do {
    if ($number == 0) {
        echo "$number - ноль<br>";
    } elseif ($number % 2) {
        echo "$number - нечетное число<br>";
    } else {
        echo "$number - четное число<br>";
    }
    $number++;
} while ($number <= $max);