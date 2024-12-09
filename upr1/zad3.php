<?php
$text="Любимото ми животно е мишка. Няма по-добър домашен любимец от мишка.";
$favorite_animal="котка";

$text = str_replace("мишка", $favorite_animal, $text);
echo $text; 


?>