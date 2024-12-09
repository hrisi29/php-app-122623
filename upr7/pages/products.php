<?php
    // страница продукти
    $products = [];

    $search = $_GET['search'] ?? '';
    // заявка към базата данни
    $sql = 'SELECT * FROM products WHERE title LIKE :search';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['search' => '%' . $search . '%']);

    while ($row = $stmt->fetch()) {
        $products[] = $row;
    }

    if (mb_strlen($search) > 0) {
        setcookie('last_search', $search, time() + 3600, '/', '', false, false);
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
            $fav_button = '';
            if (isset($_SESSION['username'])) {
                $fav_button = '
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-sm btn-primary add-favorite" data-product="' . $product['id'] . '">Добави в любими</button>
                    </div>
                ';
            }

            echo '
                <div class="card mb-4" style="width: 18rem;">
                    <img src="' . htmlspecialchars($product['image']) . '" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($product['title']) . '</h5>
                        <p class="card-text">' . htmlspecialchars($product['price']) . '</p>
                    </div>
                    ' . $fav_button . '
                </div>
            ';
        }
    ?>
</div>