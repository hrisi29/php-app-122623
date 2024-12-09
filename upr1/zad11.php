<?php


// function f1($a)
// {

//     $isPrime = true;
//     if ($a <= 1) {
//         $isPrime = false;
//     } else {
//         for ($i = 2; $i <= sqrt($a); $i++) {
//             if ($a % $i == 0) {
//                 $isPrime = false;
//                 break;
//             }
//         }
//     }

//     if ($isPrime) {
//         echo "$a is a prime number.";
//     } else {
//         echo "$a is not a prime number.";
//     }
// }

function f1($num)
{

    if ($num == 1) {
        echo "1 не е нито просто нито сложно число." . "<br>";
    } else {
        $count = 0;
        for ($i = $num; $i >= 1; $i--) {
            if ($num % $i == 0) {
                $count++;
            }
        }

        if ($count == 2) {
            echo "$num е просто число." . "<br>";
        } else {
            echo "$num не е просто число." . "<br>";
        }
    }
}
f1(1);
f1(3);
f1(8);
f1(10);
f1(9);
f1(11);
f1(156);

?>