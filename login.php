<?php
session_start();
// Very small demo auth. In production replace with secure checks.
$posted = $_POST;
$email = isset($posted['email']) ? $posted['email'] : '';
$pass = isset($posted['password']) ? $posted['password'] : '';

$validUser = [
    'email' => 'admin@cellphones.com',
    'password' => 'password',
    'name' => 'Admin'
];

if ($email === $validUser['email'] && $pass === $validUser['password']) {
    $_SESSION['user'] = ['email' => $validUser['email'], 'name' => $validUser['name']];
    header('Location: dashboard.php');
    exit;
}
header('Location: index.php?error=' . urlencode('Email hoặc mật khẩu không đúng'));
exit;
