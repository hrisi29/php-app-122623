<?php
function celsiusToFahrenheit($celsius)
{
    $fahrenheit = round($celsius * 1.8 + 32, 2);
    echo $celsius . "°C = " . $fahrenheit . "°F." . "<br>";
}

celsiusToFahrenheit(16);
celsiusToFahrenheit(127);
celsiusToFahrenheit(52.7778);
celsiusToFahrenheit(1576);
celsiusToFahrenheit(123);
celsiusToFahrenheit(15555);
celsiusToFahrenheit(29);
celsiusToFahrenheit(22);
?>