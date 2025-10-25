<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
$user = $_SESSION['user'];
require_once __DIR__ . '/db.php';
$pdo = getDB();
$orders = $pdo->query('SELECT * FROM orders ORDER BY date DESC')->fetchAll();
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Dashboard - CellphoneS</title>
  <link rel="stylesheet" href="assets/styles.css">
  <style> .sidebar{width:220px;float:left} .main{margin-left:240px;padding:24px}</style>
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div class="brand small">CellphoneS</div>
      <nav>
        <a href="products.php">Quản lý sản phẩm</a>
        <a href="dashboard.php" class="active">Quản lý đơn hàng</a>
        <a>Quản lý khách hàng</a>
        <a>Báo cáo & Thống kê</a>
      </nav>
      <div class="logout"><a href="logout.php">Đăng xuất</a></div>
    </aside>

    <main class="main">
      <h2>Xin chào, <?=$user['name']?></h2>
      <h3>Quản lý đơn hàng</h3>
      <div class="card">
        <input class="search" placeholder="Tìm kiếm đơn hàng...">
        <table class="orders">
          <thead>
            <tr><th></th><th>Mã đơn</th><th>Khách hàng</th><th>Ngày đặt</th><th>Tổng tiền</th><th>Số SP</th><th>Trạng thái</th><th>Thao tác</th></tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $o): ?>
              <tr>
                <td><input type="checkbox"></td>
                <td><?=htmlspecialchars($o['id'])?></td>
                <td><?=htmlspecialchars($o['customer'])?></td>
                <td><?=htmlspecialchars($o['date'])?></td>
                <td><?=htmlspecialchars($o['total'])?></td>
                <td><?=htmlspecialchars($o['count'])?></td>
                <td><?=htmlspecialchars($o['status'])?></td>
                <td><a href="#">👁️</a> <a href="#">✏️</a> <a href="#">🗑️</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
  <script src="assets/app.js"></script>
</body>
</html>
