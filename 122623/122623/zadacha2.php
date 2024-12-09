<?php

$countries = [
    ["country" => "България", "capital" => "София", "population" => 7000000, "is_eu_member" => true],
    ["country" => "Гърция", "capital" => "Атина", "population" => 10000000, "is_eu_member" => true],
    ["country" => "Сърбия", "capital" => "Белград", "population" => 7000000, "is_eu_member" => false],
    ["country" => "Северна Македония", "capital" => "Скопие", "population" => 2000000, "is_eu_member" => false],
    ["country" => "Румъния", "capital" => "Букурещ", "population" => 20000000, "is_eu_member" => true],
    ["country" => "Словения", "capital" => "Любляна", "population" => 2000000, "is_eu_member" => true],
    ["country" => "Хърватия", "capital" => "Загреб", "population" => 4000000, "is_eu_member" => true],
    ["country" => "Словакия", "capital" => "Братислава", "population" => 5000000, "is_eu_member" => true],
    ["country" => "Чехия", "capital" => "Прага", "population" => 10000000, "is_eu_member" => true],
    ["country" => "Унгария", "capital" => "Будапеща", "population" => 9000000, "is_eu_member" => true],
];
?>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table>
    <tr>
        <th>Държава</th>
        <th>Столица</th>
        <th>Население</th>
        <th>Членка на ЕС</th>
    </tr>
    
    <?php
        foreach($countries as $country){
            echo "<tr>";
            echo "<td>" . $country["country"] . "</td>";
            echo "<td>" . $country["capital"] . "</td>";
            echo "<td>" . $country["population"] . "</td>";
            echo "<td>" . ($country["is_eu_member"] == 1 ? "да" : "не") . "</td>";
            echo "</tr>";
        }
    ?>

</table>