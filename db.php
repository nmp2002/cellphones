<?php
// Simple DB helper using SQLite (PDO)
function getDB() {
    static $db = null;
    if ($db) return $db;
    $dir = __DIR__ . '/data';
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    $path = $dir . '/app.db';
    $dsn = 'sqlite:' . $path;
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $db = new PDO($dsn, null, null, $options);
    return $db;
}

function tableExists(PDO $pdo, $name) {
    $stmt = $pdo->prepare("SELECT name FROM sqlite_master WHERE type='table' AND name = :name");
    $stmt->execute([':name' => $name]);
    return (bool)$stmt->fetchColumn();
}
