<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>CellphoneS - Đăng nhập</title>
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
        <h2>Đăng nhập</h2>
        <p class="muted">Chào mừng trở lại! Vui lòng đăng nhập để tiếp tục.</p>
        <?php if ($error): ?>
          <div class="error"><?=htmlspecialchars($error)?></div>
        <?php endif; ?>
        <form action="login.php" method="post" class="form">
          <label>Email</label>
          <div class="input"><span class="icon">✉️</span><input type="email" name="email" value="admin@cellphones.com" required></div>
          <label>Mật khẩu</label>
          <div class="input"><span class="icon">🔒</span><input type="password" name="password" value="password" required></div>
          <div class="row space-between">
            <label class="checkbox"><input type="checkbox" name="remember"> Ghi nhớ đăng nhập</label>
            <a href="#" id="forgotLink">Quên mật khẩu?</a>
          </div>
          <button class="btn primary" type="submit">Đăng nhập</button>
        </form>
        <div class="signup">Chưa có tài khoản? <a href="#">Đăng ký ngay</a></div>
      </div>
    </div>

    <div class="right">
      <div class="hero">
        <div class="icon">📱</div>
        <h2>Quản lý dễ dàng</h2>
        <p>Hệ thống quản lý toàn diện cho cửa hàng điện thoại của bạn</p>
        <div class="features">
          <div class="f">Quản lý sản phẩm</div>
          <div class="f">Báo cáo chi tiết</div>
          <div class="f">Quản lý khách hàng</div>
          <div class="f">Tối ưu vận hành</div>
        </div>
      </div>
    </div>
  </div>

  <div id="modal" class="modal">
    <div class="modal-card">
      <h3>Quên mật khẩu?</h3>
      <p>Nhập email của bạn và chúng tôi sẽ gửi liên kết đặt lại mật khẩu.</p>
      <form action="forgot.php" method="post">
        <label>Email</label>
        <div class="input"><span class="icon">✉️</span><input type="email" name="email" value="admin@cellphones.com" required></div>
        <div class="row">
          <button type="button" id="cancelBtn" class="btn">Hủy</button>
          <button type="submit" class="btn primary">Gửi liên kết</button>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/app.js"></script>
</body>
</html>
