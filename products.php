<?php
session_start();
if (!isset($_SESSION['user'])) { header('Location: index.php'); exit; }
require_once __DIR__ . '/db.php';
$pdo = getDB();
$products = $pdo->query('SELECT * FROM products ORDER BY id DESC')->fetchAll();
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Quản lý sản phẩm - CellphoneS</title>
  <link rel="stylesheet" href="assets/styles.css">
  <style>.main{margin-left:240px;padding:24px}.topbar{display:flex;justify-content:space-between;align-items:center}</style>
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div class="brand small">CellphoneS</div>
      <nav>
        <a class="active">Quản lý sản phẩm</a>
        <a href="dashboard.php">Quản lý đơn hàng</a>
        <a>Quản lý khách hàng</a>
        <a href="reports.php">Báo cáo & Thống kê</a>
      </nav>
      <div class="logout"><a href="logout.php">Đăng xuất</a></div>
    </aside>
    <main class="main">
      <h2>Quản lý sản phẩm</h2>
      <p class="muted">Quản lý danh sách sản phẩm trong cửa hàng</p>
      <div class="card">
        <div class="topbar">
          <input class="search" placeholder="Tìm kiếm sản phẩm...">
          <div><button class="btn">Tất cả trạng thái</button> <button class="btn primary">+ Thêm sản phẩm</button></div>
        </div>
        <table class="orders">
          <thead><tr><th></th><th>Mã SP</th><th>Tên sản phẩm</th><th>Danh mục</th><th>Giá</th><th>Tồn kho</th><th>Trạng thái</th><th>Thao tác</th></tr></thead>
          <tbody>
            <?php foreach($products as $p): ?>
              <tr>
                <td><input type="checkbox"></td>
                <td><?=htmlspecialchars($p['sku'])?></td>
                <td><?=htmlspecialchars($p['name'])?></td>
                <td><span class="tag"><?=htmlspecialchars($p['category'])?></span></td>
                <td><?=htmlspecialchars($p['price'])?></td>
                <td><?=htmlspecialchars($p['stock'])?></td>
                <td><?=htmlspecialchars($p['status'])?></td>
                <td><a href="#">👁️</a> <a href="#">✏️</a> <a href="#">🗑️</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
