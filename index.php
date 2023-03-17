<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
];

$sum = 0;
foreach ($example_persons_array as $key) {
    $stringFIO = $example_persons_array[$sum]['fullname'];
    $sum++; 
    $surname = getSurname ($stringFIO);
    $name = getName($stringFIO);
    $patronymic = getPatronymic ($stringFIO);

    getFullnameFromParts ($surname, $name, $patronymic);
    getPartsFromFullname ($stringFIO);
    print_r(getPartsFromFullname ($stringFIO)); // Array ( [surname] => Иванов [name] => Иван [patronomyc] => Иванович )
    getShortName ($stringFIO);
    getGenderFromName ($stringFIO);
}

function getFullnameFromParts ($surname, $name, $patronymic) {
    $fullName = $surname . ' ' . $name . ' ' . $patronymic;
    echo $fullName; //string(38) "Иванов Иван Иванович" *требуется вернуть строку, у вас вардамп
    return $fullName;
 }

function getPartsFromFullname ($stringFIO) {
    $arrKeyFIO = ['surname', 'name', 'patronymic'];
    $stringPartsName = explode(' ', $stringFIO);
    $arrFIO = (array_combine( $arrKeyFIO, $stringPartsName));
    return $arrFIO;
}

function getShortName ($stringFIO) {
    $arrStringFIO = getPartsFromFullname ($stringFIO);
    $surname1 =  $arrStringFIO['surname'];
    $name1 =  $arrStringFIO ['name'];
    $shorSurname = mb_substr($surname1, 0, 1);
    $shortName = $name1 . ' ' . $shorSurname . '.';
    echo $shortName; //Иван И. *требуется вернуть строку, у вас производится вывод на печать
    return $shortName;
    }

function getSurname ($stringFIO) {
    $stringPartsName = explode(' ', $stringFIO);
    $surname = $stringPartsName[0];
    return $surname;
}

function getName($stringFIO) {
    $stringPartsName = explode(' ', $stringFIO);
    $name = $stringPartsName[1];
    return $name;
}

function getPatronymic ($stringFIO) {
    $stringPartsName = explode(' ', $stringFIO);
    $patronymic = $stringPartsName[2];
    return $patronymic;
}

function getGenderFromName ($stringFIO) {
    $arrStringFIO = getPartsFromFullname ($stringFIO);
    $gensum = 0;
    $surname1 =  $arrStringFIO['surname'];
    $name1 =  $arrStringFIO ['name'];
    $patronymic1 =  $arrStringFIO ['patronymic']; // *переменна называеися patronomic1, в условияхиспользуется panronomyc1
    if (mb_substr($patronymic1, -3) == 'вна' 
    || mb_substr($name1, -1) == 'а' 
    || mb_substr($surname1, -2) =='ва') {
        $gensum --;
    } elseif (mb_substr($patronymic1, -2) == 'ич'  
    || mb_substr($name1, -1) == 'й' 
    || mb_substr($name1, -1) == 'н' 
    || mb_substr($surname1, -1) == 'в') {
        $gensum ++;
    }
   
    $gensum = ($gensum <=> 0);
     if ($gensum > 0) {
        $gensum = 'мужской пол';
    } elseif ($gensum < 0) {
        $gensum = 'женский пол';
    } else {
        $gensum = 'неопределенный пол';
    }
    echo $gensum;//мужской пол...
    return $gensum; //*сумма признаков записвается в $gensum, функция возвращает $getsum
}


?>
