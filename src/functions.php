<?php

function getRandomName($num)
{
    switch ($num) {
        case $num == 1:
            return 'Василий';
        case $num == 2:
            return 'Ольга';
        case $num == 3:
            return 'Иннокентий';
        case $num == 4:
            return 'Марина';
        case $num == 5:
            return 'Петр';
        default:
            return 'Error';
    }
}

function task1()
{
    // Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age

    $array = [];

    for ($i = 1; $i <= 50; $i++) {
        $array[] = ['id' => $i, 'name' => getRandomName(mt_rand(1, 5)), 'age' => mt_rand(18, 45)];
    }

    // Преобразуйте массив в json и сохраните в файл users.json

    $result = json_encode($array);
    file_put_contents('users.json', $result);
}

function task2()
{
    // Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР
    $json = file_get_contents('users.json');
    $arrayWasReturned = json_decode($json, true);

    // Посчитайте количество пользователей с каждым именем в массиве
    $countVasya = 0;
    $countOlga = 0;
    $countInnokenti = 0;
    $countMarina = 0;
    $countPetr = 0;

    foreach ($arrayWasReturned as $user) {
        if ($user['name'] === 'Василий') {
            $countVasya += 1;
        } elseif ($user['name'] === 'Ольга') {
            $countOlga += 1;
        } elseif ($user['name'] === 'Иннокентий') {
            $countInnokenti += 1;
        } elseif ($user['name'] === 'Марина') {
            $countMarina += 1;
        } elseif ($user['name'] === 'Петр') {
            $countPetr += 1;
        } else {
            echo 'Что-то пошло не так';
        }
    }

    echo 'Васей: ' . $countVasya . ', ' .
        'Оль: ' . $countOlga . ', ' .
        'Иннокентиев: ' . $countInnokenti . ', ' .
        'Марин: ' . $countMarina . ', ' .
        'Петров: ' . $countPetr . '.';

    // Посчитайте средний возраст пользователей
    echo '<br>';
    $averageAge = 0;

    foreach ($arrayWasReturned as $user) {
        $averageAge += $user['age'];
    }

    echo 'Средний возраст пользователей: ' . $averageAge / sizeof($arrayWasReturned);

}







