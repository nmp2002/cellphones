<?php
session_start();
require_once __DIR__ . '/db.php';
$posted = $_POST;
$email = isset($posted['email']) ? trim($posted['email']) : '';
$pass = isset($posted['password']) ? $posted['password'] : '';

if ($email === '' || $pass === '') {
    header('Location: index.php?error=' . urlencode('Vui lòng nhập email và mật khẩu'));
    exit;
}

$pdo = getDB();
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
$stmt->execute([':email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user && password_verify($pass, $user['password'])) {
    // store minimal info in session
    $_SESSION['user'] = ['email' => $user['email'], 'name' => $user['name'], 'role' => $user['role']];
    header('Location: dashboard.php');
    exit;
}

header('Location: index.php?error=' . urlencode('Email hoặc mật khẩu không đúng'));
exit;
