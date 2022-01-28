<?php
/*
6. В имеющемся шаблоне сайта заменить статичное меню (ul – li)
на генерируемое через PHP. Необходимо представить пункты меню
как элементы массива и вывести их циклом. Подумать,
как можно реализовать меню с вложенными подменю?
Попробовать его реализовать.
Важное, при желании можно сделать на движке 3. ВАЖНОЕ!
<ul>
	<li><a href='#'>Меню1</a></li>
	<li><a href='#'>Меню2</a></li>
	<li><a href='#'>Меню3</a></li>
	<li><a href='3'>Меню4</a></li>
</ul>
 */

$menu = [
    'Главная' => [['./', 'Главная']],
    'Дополнительно' => [["#", "подменю 0"], ['#', 'подменю 1']]
];

function renderMenu($arr) {
    $result[] = '<ul>';

    function li($link, $name) {
        return "<li><a href='$link'>$name</a></li>";
    }

    foreach ($arr as $key => $values) {
        if(count($values) == 1) {
            foreach ($values as $key => $value) {
                $result[] = li($value[0], $value[1]);
            }
        } else {
            $result[] = li('#', $key);
            $result[] = '<ul>';
            foreach ($values as $key => $value) {
                $result[] = li($value[0], $value[1]);
            }
            $result[] = '</ul>';
        }
    }

    $result[] = '</ul>';
    return join($result);
}

echo renderMenu($menu);