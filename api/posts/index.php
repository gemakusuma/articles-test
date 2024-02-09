<?php
include '../../databaseConnection.php';
include '../../validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validationResult = validateArticleData();

    if ($validationResult === true) {
        $title = $_POST['title'];
        $summary = $_POST['summary'];
        $position = $_POST['position'];
        $author = $_POST['author'];

        $stmt = $pdo->prepare("INSERT INTO articles (title, summary, position, author) VALUES (:title, :summary, :position, :author)");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_INT);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->execute();

        $response = [
            'article_id' => $pdo->lastInsertId(),
            'created_at' => date('Y-m-d H:i:s')
        ];


        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        foreach ($validationResult as $error) {
            echo $error . "\n";
        }
    }
}


// Assuming database_connection.php is already included

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    $validationResult = validateArticleData();

    if ($validationResult === true) {
        $title = $put_vars['title'];
        $summary = $put_vars['summary'];
        $position = $put_vars['position'];
        $author = $put_vars['author'];
        $article_id = $put_vars['article_id'];

        $stmt = $pdo->prepare("UPDATE articles SET title = :title, summary = :summary, position = :position, author = :author WHERE id = :id");
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
        $stmt->bindParam(':position', $position, PDO::PARAM_INT);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':id', $article_id, PDO::PARAM_INT); // Jika tipe data ID adalah integer
        $stmt->execute();

        header('Content-Type: application/json');
        $response = [
            'article_id' => $article_id,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        echo json_encode($response);
    } else {
        foreach ($validationResult as $error) {
            echo $error . "\n";
        }
    }
}
?>
