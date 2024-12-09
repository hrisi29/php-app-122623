<?php

$fruit = ['ябълка', 'круша', 'банан', 'портокал', 'лимон', 'мандарина', 'праскова', 'кайсия', 'пъпеш', 'диня'];
$names = ['Георги', 'Димитър', 'Мария', 'Петя', 'Иван', 'Гергана', 'Стефан', 'Марин', 'Атанас', 'Васил'];
$tools = ['чук', 'отвертка', 'клещи', 'тресчотка', 'секач', 'пила', 'трион', 'тесла', 'брадва'];


function analyzeArray($array, $length) {
    $longestWord = '';
    $count = 0;
foreach($array as $word){
    if(mb_strlen($word)>=$length){
        $count++;
        if(mb_strlen($word)>mb_strlen($longestWord)){
            $longestWord=$word;
        }
    }
}
    return ['longestWord' => $longestWord, 'count' => $count];
}

echo("Най-дългата дума в масива с плодове е: " . analyzeArray($fruit, 6)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($fruit, 6)['count'] . "<br>");
echo("Най-дългата дума в масива с имена е: " . analyzeArray($names, 7)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($names, 7)['count'] . "<br>");
echo("Най-дългата дума в масива с инструменти е: " . analyzeArray($tools, 5)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($tools, 5)['count'] . "<br>");

echo("Най-дългата дума в масива с плодове е: " . analyzeArray($fruit, 1)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($fruit, 1)['count'] . "<br>");
echo("Най-дългата дума в масива с имена е: " . analyzeArray($names, 2)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($names, 2)['count'] . "<br>");
echo("Най-дългата дума в масива с инструменти е: " . analyzeArray($tools, 8)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($tools, 8)['count'] . "<br>");

echo("Най-дългата дума в масива с плодове е: " . analyzeArray($fruit, 4)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($fruit, 4)['count'] . "<br>");
echo("Най-дългата дума в масива с имена е: " . analyzeArray($names, 4)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($names, 4)['count'] . "<br>");
echo("Най-дългата дума в масива с инструменти е: " . analyzeArray($tools, 4)['longestWord'] . ". Броят на думите, по-големи или равни на зададеното число е " . analyzeArray($tools, 4)['count'] . "<br>");