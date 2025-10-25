<?php
// Simulate forgot password flow
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}
$email = isset($_POST['email']) ? $_POST['email'] : '';
// In real app you'd send an email. Here we just redirect with a message.
header('Location: index.php?error=' . urlencode('Nếu email tồn tại trong hệ thống, chúng tôi đã gửi liên kết đặt lại đến: ' . $email));
exit;
