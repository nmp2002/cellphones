<?php
session_start();
if (!isset($_SESSION['user'])) { header('Location: index.php'); exit; }
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Báo cáo - CellphoneS</title>
  <link rel="stylesheet" href="assets/styles.css">
  <style>.main{margin-left:240px;padding:24px}</style>
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div class="brand small">CellphoneS</div>
      <nav>
        <a href="products.php">Quản lý sản phẩm</a>
        <a href="dashboard.php">Quản lý đơn hàng</a>
        <a>Quản lý khách hàng</a>
        <a class="active">Báo cáo & Thống kê</a>
      </nav>
      <div class="logout"><a href="logout.php">Đăng xuất</a></div>
    </aside>
    <main class="main">
      <h2>BÁO CÁO ĐƠN HÀNG</h2>
      <p class="muted">Tất cả thời gian</p>
      <div class="card">
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px">
          <div class="stat">Tổng đơn hàng<br><strong>9</strong></div>
          <div class="stat">Tổng doanh thu<br><strong>13.038.000 đ</strong></div>
          <div class="stat">Giá trị TB<br><strong>1.448.667 đ</strong></div>
          <div class="stat">Vận chuyển<br><strong>3</strong></div>
        </div>
        <div style="margin-top:18px">
          <h4>Doanh thu theo ngày</h4>
          <table class="orders"><thead><tr><th>Ngày</th><th>Doanh thu</th><th>Số đơn</th><th>Trung bình</th></tr></thead>
            <tbody>
              <tr><td>26/04</td><td>12.620.000 đ</td><td>1</td><td>12.620.000 đ</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
