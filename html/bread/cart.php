<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

// 初始化購物車
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// 處理表單提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        // 更新數量
        foreach ($_POST['quantity'] as $product_id => $quantity) {
            $product_id = intval($product_id);
            $quantity = intval($quantity);

            // 確保數量為正數
            if ($quantity > 0) {
                $_SESSION['cart'][$product_id] = $quantity;
            } else {
                unset($_SESSION['cart'][$product_id]);
            }
        }
    } elseif (isset($_POST['add'])) {
        // 添加到購物車
        $product_id = intval($_POST['product_id']);
        $quantity = intval($_POST['quantity']);

        // 確保數量為正數
        if ($quantity > 0) {
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        }
    }

    // 跳轉到購物車頁面
    header("Location: cart.php");
    exit();
}

// 顯示購物車內容
$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車 - Bread</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main class="container mt-4">
    <h1 class="mb-4">購物車</h1>
    <?php if (!isset($_SESSION['user_id'])): ?>
        <div class="alert alert-warning" role="alert">
            您需要登入才能下單。<a href="login.php" class="alert-link">點此登入</a>
        </div>
    <?php endif; ?>
    <?php if (empty($cart)): ?>
        <p>購物車中沒有商品。</p>
    <?php else: ?>
        <form action="cart.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>產品名稱</th>
                        <th>數量</th>
                        <th>價格</th>
                        <th>小計</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($cart as $product_id => $quantity) {
                        // 查詢產品資訊
                        $sql = "SELECT * FROM products WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $product_id);
                        $stmt->execute();
                        $product = $stmt->get_result()->fetch_assoc();
                        $subtotal = $product['price'] * $quantity;
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['title']); ?></td>
                            <td>
                                <input type="number" name="quantity[<?php echo htmlspecialchars($product_id); ?>]" value="<?php echo htmlspecialchars($quantity); ?>" min="1">
                            </td>
                            <td><?php echo htmlspecialchars($product['price']); ?> 元</td>
                            <td><?php echo htmlspecialchars($subtotal); ?> 元</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p>總計: <?php echo htmlspecialchars($total); ?> 元</p>
            <button type="submit" name="update" class="btn btn-primary">更新數量</button>
        </form>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="checkout.php" method="post">
                <button type="submit" class="btn btn-primary">下單</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>
</main>

<!-- 引入 Bootstrap JS 和依賴的 Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include 'includes/footer.php'; ?>
</body>
</html>


