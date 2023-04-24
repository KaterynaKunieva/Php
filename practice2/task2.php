<?php
//  Завдання 2: Інформація про товари в кошику
//  Написати функцію для отримання підсумків (загальної інформації) про кошику покупок. Функція приймає масив з інформацією про обрані товари приблизно такого вигляду:
//  $ Products = array (
//  array ('name' => 'Ноутбук', 'price' => '8000', 'quantity' => 1),
//  array ('name' => 'Смартфон', 'price' => '3000', 'quantity' => 3),
//  array ('name' => 'Кросівки', 'price' => '1500', 'quantity' => 2),
//  );
//  Повертає масив, який містить:
//  • Загальну суму покупок
//  • Загальну кількість обраних товарів

$Products = array(
    array('name' => 'Ноутбук', 'price' => '8000', 'quantity' => 1),
    array('name' => 'Смартфон', 'price' => '3000', 'quantity' => 3),
    array('name' => 'Кросівки', 'price' => '1500', 'quantity' => 2),
);

function getResults($Products)
{
    $resultArr = array('sum of quantities' => getTotalQuantity($Products), 'total price' => getTotalPrice($Products));
    return $resultArr;
}
print_r(getResults($Products));

function getTotalQuantity($Products)
{
    $arr = array_map(function ($a) {
        return $a['quantity'];
    }, $Products);

    return array_sum($arr);
}
function getTotalPrice($Products)
{
    $arr = array_map(function ($a) {
        return $a['quantity'] * $a['price'];
    }, $Products);

    return array_sum($arr);
}
