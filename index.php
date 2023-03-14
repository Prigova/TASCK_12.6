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
    $patronomyc = getPatronomyc ($stringFIO);

    getFullnameFromParts ($surname, $name, $patronomyc);
    getPartsFromFullname ($stringFIO);
    print_r(getPartsFromFullname ($stringFIO)); // Array ( [surname] => Иванов [name] => Иван [patronomyc] => Иванович )
    getShortName ($stringFIO);
    getGenderFromName ($stringFIO);
}

function getFullnameFromParts ($surname, $name, $partonomyc) {
    $fullName = $surname . ' ' . $name . ' ' . $partonomyc;
    echo  var_dump($fullName); //string(38) "Иванов Иван Иванович"
 }

function getPartsFromFullname ($stringFIO) {
    $arrKeyFIO = ['surname', 'name', 'partonomyc'];
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
    echo $shortName; //Иван И.
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

function getPatronomyc ($stringFIO) {
    $stringPartsName = explode(' ', $stringFIO);
    $partonomyc = $stringPartsName[2];
    return $partonomyc;
}

function getGenderFromName ($stringFIO) {
    $arrStringFIO = getPartsFromFullname ($stringFIO);
    $gensum = 0;
    $surname1 =  $arrStringFIO['surname'];
    $name1 =  $arrStringFIO ['name'];
    $patronomyc1 =  $arrStringFIO ['partonomyc'];
    if (mb_substr($panronomyc1, -3) == 'вна' 
    || mb_substr($name1, -1) == 'а' 
    || mb_substr($surname1, -2) =='ва') {
        $gensum --;
    } elseif (mb_substr($panronomyc1, -2) == 'ич'  
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
    echo $gensum;
    return $getsum;
}
?>