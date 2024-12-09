<?php
    // страница продукти
    $products = [];

    $sql="SELECT * FROM products";
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch()) {
        $products[] = $row;
    }

    $search = $_GET['search'] ?? '';
    if (mb_strlen($search) > 0) {
        $products = array_filter($products, function($product) use ($search) {
            return str_contains(mb_strtolower($product['title']), mb_strtolower($search));
        });

        setcookie('last_search',$search,time() + 3600, '/', '', false, true);
    }
?>

<div class="row">
    <form class="mb-4" method="GET">
        <div class="input-group">
            <input type="hidden" name="page" value="products">
            <input type="text" class="form-control" placeholder="Търси продукт" name="search" value="<?php echo $search ?>">
            <button class="btn btn-primary" type="submit">Търсене</button>
        </div>
    </form>
    <div class="alert alert-info">
        Последно търсене: <?php echo $_COOKIE['last_search'] ?? 'няма' ?>
    </div>
</div>
<div class="d-flex flex-wrap justify-content-between">
    <?php
        foreach ($products as $product) {
            echo '
                <div class="card mb-4" style="width: 18rem;">
                    <img src="' . $product['image'] . '" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">' . $product['title'] . '</h5>
                        <p class="card-text">' . $product['price'] . '</p>
                    </div>
                </div>
            ';
        }
    ?>
</div>