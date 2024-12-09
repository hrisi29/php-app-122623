<?php

// Задача 9:
// Декларирайте асоциативен масив 2 от файла zadachi.php от репото в  GitHub: https://github.com/snVladkov/PHP-basics
// Обходете масива с цикъл foreach и създайте HTML таблица с 5 колони – продукт, налични бройки, цена без ДДС, ДДС (20% от price), цена с ДДС
// За продукти, които нямат наличност (count = 0), оцветете реда от таблицата в червено

// декларираме асоциативния масив $products
$products = [
    [
        'name' => 'HONOR MagicBook X16 Pro',
        'count' => 23,
        'price' => 889.50
    ],
    [
        'name' => 'HP Laptop 15s 12th Gen',
        'count' => 7,
        'price' => 1329.10
    ],
    [
        'name' => 'Lenovo S14',
        'count' => 0,
        'price' => 1189.99
    ],
    [
        'name' => 'ASUS Vivobook 16X',
        'count' => 37,
        'price' => 2187.40
    ],
    [
        'name' => 'Lenovo IdeaPad 1',
        'count' => 0,
        'price' => 1766.30
    ],
    [
        'name' => 'Dell XPS 13',
        'count' => 11,
        'price' => 1249.99
    ]
];

?>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table>
    <thead>
        <tr>
            <th>Продукт</th>
            <th>Налични бройки</th>
            <th>Цена без ДДС</th>
            <th>ДДС</th>
            <th>Цена с ДДС</th>
        </tr>
    </thead>
    <tbody>
        <?php

            // обхождаме масива $products с цикъл foreach
            foreach ($products as $product) {
                // проверяваме стойността на ключа count и оцветяваме реда в таблицата в червено, ако count = 0
                if ($product['count'] == 0) {
                    echo '<tr style="background-color:red;">';
                } else {
                    echo '<tr>';
                }

                // изчисляваме ДДС и цената с ДДС
                $dds = $product['price'] * 0.20;
                $price_with_dds = $product['price'] + $dds;

                // създаваме клетки(<td>) в таблицата за продукт, налични бройки, цена без ДДС, ДДС и цена с ДДС
                echo "<td>{$product['name']}</td>";
                echo "<td>{$product['count']}</td>";
                echo "<td>{$product['price']}</td>";
                echo "<td>$dds</td>";
                echo "<td>$price_with_dds</td>";
                echo '</tr>';
            }

        ?>
    </tbody>
</table>