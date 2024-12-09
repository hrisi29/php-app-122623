<?php

$i=0;
$count=0;

while($i <= 20){
    $odd_even=($i%2==0?"четно":"нечетно");
    echo "Числото $i е $odd_even <br>";

    if($i%5==0){
        $count++;
    }
    $i++;
}

//for
echo "Броят на числата, които се делят на 5 без остатък е: $count";
?>