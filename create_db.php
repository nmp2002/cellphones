<?php
// Run from project root: php create_db.php
require_once __DIR__ . '/db.php';
$pdo = getDB();

// Create users table
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    name TEXT,
    role TEXT DEFAULT 'user',
    created_at TEXT DEFAULT CURRENT_TIMESTAMP
)");

// Create products table
$pdo->exec("CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    sku TEXT,
    name TEXT,
    category TEXT,
    price TEXT,
    stock INTEGER,
    status TEXT,
    created_at TEXT DEFAULT CURRENT_TIMESTAMP
)");

// Create orders table
$pdo->exec("CREATE TABLE IF NOT EXISTS orders (
    id TEXT PRIMARY KEY,
    customer TEXT,
    date TEXT,
    total TEXT,
    count INTEGER,
    status TEXT
)");

// Seed admin user if not exists
$stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
$stmt->execute([':email' => 'admin@cellphones.com']);
if (!$stmt->fetchColumn()) {
    $hash = password_hash('password', PASSWORD_DEFAULT);
    $i = $pdo->prepare('INSERT INTO users (email, password, name, role) VALUES (:email, :password, :name, :role)');
    $i->execute([':email' => 'admin@cellphones.com', ':password' => $hash, ':name' => 'Admin', ':role' => 'admin']);
    echo "Inserted default admin (admin@cellphones.com / password)\n";
} else {
    echo "Admin user already exists.\n";
}

// Seed products from data/products.json
$prodFile = __DIR__ . '/data/products.json';
if (file_exists($prodFile)) {
    $contents = file_get_contents($prodFile);
    $items = json_decode($contents, true);
    if (is_array($items)) {
        $count = 0;
        $check = $pdo->prepare('SELECT COUNT(*) FROM products WHERE sku = :sku');
        $ins = $pdo->prepare('INSERT INTO products (sku,name,category,price,stock,status) VALUES (:sku,:name,:category,:price,:stock,:status)');
        foreach ($items as $p) {
            $check->execute([':sku' => $p['sku']]);
            if (!$check->fetchColumn()) {
                $ins->execute([
+                    ':sku'=>$p['sku'],
+                    ':name'=>$p['name'],
+                    ':category'=>$p['category'],
+                    ':price'=>$p['price'],
+                    ':stock'=>isset($p['stock']) ? (int)$p['stock'] : 0,
+                    ':status'=>isset($p['status']) ? $p['status'] : 'Còn hàng'
+                ]);
+                $count++;
+            }
+        }
+        echo "Seeded $count products\n";
+    }
+}
+
+// Seed orders from data/orders.json
+$ordersFile = __DIR__ . '/data/orders.json';
+if (file_exists($ordersFile)) {
+    $contents = file_get_contents($ordersFile);
+    $items = json_decode($contents, true);
+    if (is_array($items)) {
+        $count = 0;
+        $check = $pdo->prepare('SELECT COUNT(*) FROM orders WHERE id = :id');
+        $ins = $pdo->prepare('INSERT INTO orders (id,customer,date,total,count,status) VALUES (:id,:customer,:date,:total,:count,:status)');
+        foreach ($items as $o) {
+            $check->execute([':id' => $o['id']]);
+            if (!$check->fetchColumn()) {
+                $ins->execute([
+                    ':id' => $o['id'],
+                    ':customer' => $o['customer'],
+                    ':date' => $o['date'],
+                    ':total' => $o['total'],
+                    ':count' => isset($o['count']) ? (int)$o['count'] : 0,
+                    ':status' => isset($o['status']) ? $o['status'] : ''
+                ]);
+                $count++;
+            }
+        }
+        echo "Seeded $count orders\n";
+    }
+}
+
+echo "Database initialized at data/app.db\n";
+
*** End Patch