<?php
session_start();
include 'includes/db.php';
include 'includes/header.php';

// 確保購物車存在
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

// 如果購物車是空的，顯示消息並結束執行
if (empty($cart)) {
    echo "<p>購物車是空的，請先添加產品。</p>";
    exit();
}

// 檢查是否有提交訂單
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 插入訂單到資料庫
    $user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;
    $total = 0;

    // 插入訂單記錄
    $sql = "INSERT INTO orders (user_id) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // 插入訂單商品記錄
    foreach ($cart as $product_id => $quantity) {
        $sql = "SELECT price FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $product = $stmt->get_result()->fetch_assoc();

        $subtotal = $product['price'] * $quantity;
        $total += $subtotal;

        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $product['price']);
        $stmt->execute();
    }

    // 更新訂單總價
    $sql = "UPDATE orders SET total = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $total, $order_id);
    $stmt->execute();

    // 清空購物車
    unset($_SESSION['cart']);

    // 顯示成功消息
    echo "<script>alert('訂單已成功下單！'); window.location.href='products.php';</script>";
} else {
    echo "<p>請使用 POST 方法提交訂單。</p>";
}
?>

<?php include 'includes/footer.php'; ?>

