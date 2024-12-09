<?php

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

<html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
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
        foreach ($products as $product) {
            //drug variant   
            // if ($product['count'] == 0) {
            //     echo '<tr style="background-color:red;">';
            // } else {
            //     echo '<tr>';
            // }
        
            $bg_color = $product['count'] == 0 ? 'red' : 'white';
            $dds = $product['price'] * 0.20;
            $price_with_dds = $product['price'] * 1.20;

            echo '
            <tr style="background-color:' . $bg_color . ';";>
                <td>' . $product['name'] . '</td> 
                <td>' . $product['count'] . '</td>
                <td>' . $product['price'] . '</td>
                <td>' . $dds . '</td>
                <td>' . $price_with_dds . '</td>
            </tr>
            ';

        }

        ?>
    </tbody>
</table>

</html>