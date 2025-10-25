<?php
session_start();
if (isset($_SESSION['user'])) { header('Location: dashboard.php'); exit; }
$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // For demo, accept any registration and pretend to create a user
  header('Location: index.php?error=' . urlencode('Tạo tài khoản thành công. Bạn có thể đăng nhập.'));
  exit;
}
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Đăng ký - CellphoneS</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <div class="container">
    <div class="left">
      <div class="brand">
        <div class="logo">📱</div>
        <div>
          <h1>CellphoneS</h1>
          <div class="subtitle">Haravan Management System</div>
        </div>
      </div>

      <div class="card">
        <h2>Đăng ký</h2>
        <p class="muted">Tạo tài khoản mới để bắt đầu sử dụng hệ thống.</p>
        <?php if ($error): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
        <form method="post" class="form">
          <label>Email</label>
          <div class="input"><span class="icon">✉️</span><input type="email" name="email" required></div>
          <label>Mật khẩu</label>
          <div class="input"><span class="icon">🔒</span><input type="password" name="password" required></div>
          <label>Xác nhận mật khẩu</label>
          <div class="input"><span class="icon">🔒</span><input type="password" name="password2" required></div>
          <div class="password-req card">
            <ul>
              <li>Ít nhất 8 ký tự</li>
              <li>Có ít nhất 1 chữ hoa (A-Z)</li>
              <li>Có ít nhất 1 chữ thường (a-z)</li>
              <li>Có ít nhất 1 chữ số (0-9)</li>
            </ul>
          </div>
          <button class="btn primary" type="submit">Đăng ký</button>
          <div class="signup">Đã có tài khoản? <a href="index.php">Đăng nhập</a></div>
        </form>
      </div>
    </div>

    <div class="right">
      <div class="hero">
        <div class="icon">📱</div>
        <h2>Quản lý dễ dàng</h2>
        <p>Hệ thống quản lý toàn diện cho cửa hàng điện thoại của bạn</p>
      </div>
    </div>
  </div>
</body>
</html>
