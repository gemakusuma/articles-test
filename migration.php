<?php
include 'databaseConnection.php';

$sql = "
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    summary TEXT,
    position INT,
    author VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
";

try {
    if ($pdo->exec($sql) === false) {
        echo "Error creating table: " . $pdo->error;
    } else {
        echo "Table 'articles' created successfully.\n";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
