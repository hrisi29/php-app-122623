<?php 
$names_bg="Християна Калчева";
$names_en="Hristiyana Kalcheva";

echo "strlen за names_bg връща: " . strlen($names_bg) . "<br>";
echo "strlen за names_en връща: " . strlen($names_en) . "<br>";
echo "mb_strlen за names_bg връща: " . mb_strlen($names_bg) . "<br>";
echo "mb_strlen за names_en връща: " . mb_strlen($names_en) . "<br>";

$city="Добрич";

echo "Казвам се $names_bg и живея в град $city.";

?>