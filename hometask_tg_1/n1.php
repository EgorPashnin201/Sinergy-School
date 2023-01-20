<?php
function o($A) {
    for ($A; $A > 0; $A--) {
        echo '<br>';
    }
}


// Номер 1
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 10; $j >= $i; $j -= 0.5) {
                echo '&nbsp';
            }
            for ($l = $i; $l >= 1; $l--) {
                echo '*';
            }
            echo '<br>';
        }

o(3);
// ДОДЕЛАТЬ


// Номер 2
    $massive = array('Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь');
    foreach ($massive as $i){
        echo $i.'<br>';
}

o(3);


// Номер 3
    $a = 36;
    echo (sqrt($a)), '<br>';
    echo sqrt(3).'<br>'.sqrt(4);

o(3);


// Номер 4
    function delElem($A, $B) {

        echo 'Число которое нужно удалить: '.'<br>';
        echo $A.'<br>';
        echo 'Массив: '.'<br>';
        var_dump($B);
        echo '<br>';

        foreach ($B as $i) {
            if ($i == $A) {
                unset($B[$c]);
            }
            $c += 1;
        }

        echo 'Итог: '.'<br>';
        var_dump($B);
    }

    delElem(12, array(10, 12, 4, 15, 12, 41, 14, 62, 12));

o(3);

// Номер 5
    function checkSame($A) {
        foreach ($A as $i_2) {
            if ($i_2 == $i_1) {
                $ans = 'Да';
                break;
            }
            else {
                $ans = 'Нет';
            }
            $i_1 = $i_2;
        }
        echo $ans.'<br>';
    }

    checkSame(array(1, 54, 3, 6, 9, 12, 66, 1, 32));
    checkSame(array(13, 44, 16, 83, 83, 2));
    checkSame(array(1, 2, 1, 1));
    checkSame(array(462, 412, 512, 212, 421, 421));

o(3);


// Номер 6
    function checkOdd($A) {
        $D = str_split($A);
        foreach ($D as $i) {
            if ($i % 2 != 0) {
                $c += 1;
            }
        }
        if (count($D) == $c) {
            $ans = 'Да';
            }
        else {
            $ans = 'Нет';
        }
        echo ($ans).'<br>';
    }

    checkOdd(1234);
    checkOdd(2468);
    checkOdd(24621);
    checkOdd(1357);

o(3);


// Номер 7
    function checkEven($A) {
        foreach ($A as $i) {
            if ($i % 2 == 0) {
                $c += 1;
            }
        }
        if (count($A) == $c) {
            $ans = 'Да';
        }
        else {
            $ans = 'Нет';
        }
        echo ($ans).'<br>';
    }


    checkEven(array(12, 13, 15, 8));
    checkEven(array(41, 25, 256, 9430));
    checkEven(array(2, 4, 6, 8, 10));
    checkEven(array(90, 14, 78, 97));

o(3);


// Номер 8
function sameDivisor($A, $B) {
    $a = array();
    for ($d = 1; $d < 9999; $d++) {
        if ($A % $d == 0 and $B % $d == 0 ) {
            array_push($a, $d);
        }
    }
    return $a;
}

    var_dump (sameDivisor(21,6));
    o(1);
    var_dump (sameDivisor(4, 72));
    o(1);
    var_dump (sameDivisor(123, 41));
    o(1);

o(3);


// Номер 9
    function translit($A)
    {
        $B = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
            'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
            'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
            'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch',
            'ш' => 'sh', 'щ' => 'sch', 'ь' => '', 'ы' => 'y', 'ъ' => '',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
            //imdeadinside
        );

        $A = strtr($A, $B);
        return $A;
    }

    echo translit('банановый, аллергическая, транквилизатор');

o(3);


// Номер 10
    function translitD($A) {
        $ans = '';
        $B = array(
            '1' => 'один', '2' => 'два', '3' => 'три', '4' => 'четыре',
            '5' => 'пять', '6' => 'шесть', '7' => 'семь', '8' => 'восемь', '9' => 'девять',
        );
        $C = array(
            '0' => '', '10' => 'десять', '11' => 'одиннадцать', '12' => 'двенадцать',
            '13' => 'тринадцать', '14' => 'четырнадцать', '15' => 'пятнадцать',
            '16' => 'шестнадцать', '17' => 'семнадцать', '18' => 'восемнадцать',
            '19' => 'девятнадцать', '2' => 'двадцать', '3' => 'тридцать',
            '4' => 'сорок', '5' => 'пятьдесят', '6' => 'шестьдесят',
            '7' => 'семьдесят', '8' => 'восемьдесят', '9' => 'девяносто',
        );
        $D = array(
            '0' => '', '1' => 'сто', '2' => 'двести', '3' => 'триста',
            '4' => 'четыреста', '5' => 'пятьсот', '6' => 'шестьсот',
            '7' => 'семьсот', '8' => 'восемьсот', '9' => 'девятьсот'
        );
        if ($A < 10) {
            $ans = $ans . strtr($A, $B);
            return $ans;
        }
        elseif (9 < $A and $A < 20) {
            $ans = $ans . strtr($A, $C);
            return $ans;
        }
        elseif (100 > $A and $A > 19) {
            if ($A % 10 != 0) {
                $ans = $ans . strtr(intdiv($A, 10), $C) . '&nbsp';
                $ans = $ans . strtr($A % 10, $B);
                return $ans;
            }
            else {
                $ans = $ans . strtr(intdiv($A, 10), $C);
                return $ans;
            }
        }
        elseif (1000 > $A and $A > 99) {
            if ($A % 10 != 0 and 9 < $A % 100 and $A % 100 < 20) {
                $ans = $ans . strtr(intdiv($A / 1000 * 10, 1), $D) . '&nbsp';
                $ans = $ans . strtr($A % 100, $C);
                return $ans;
            }
            elseif ($A % 100 != 0) {
                $ans = $ans . strtr(intdiv($A / 1000 * 10, 1), $D) . '&nbsp';
                $ans = $ans . strtr($A / 100 * 10 % 10, $C) . '&nbsp';
                $ans = $ans . strtr($A % 10, $B);
                return $ans;
            }
            elseif ($A % 10 != 0) {
                $ans = $ans . strtr(intdiv($A, 10), $C) . '&nbsp';
                $ans = $ans . strtr($A % 10, $B);
                return $ans;
            }
            else {
                $ans = $ans . strtr($A / 100, $D);
                return $ans;
            }
        }
    }

    echo translitD(6).o(1);
    echo translitD(17).o(1);
    echo translitD(20).o(1);
    echo translitD(62).o(1);
    echo translitD(99).o(1);
    echo translitD(100).o(1);
    echo translitD(209).o(1);
    echo translitD(279).o(1);
    echo translitD(629).o(1);
    echo translitD(917).o(1);