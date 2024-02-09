<?php

include 'databaseConnection.php';
$dummyData = json_decode(file_get_contents('https://cdnstatic.detik.com/internal/sample/demo.json'), true);
$articles = [];

try {
    $stmt = $pdo->query("SELECT title, position FROM articles");
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $combinedData = [];

    foreach ($dummyData as $key => $data) {
        $isExists = false;
        foreach ($articles as $article) {
            if (($key + 1) == $article['position']) {
                $combinedData[] = $article;
                $isExists = true;
                break;
            }
        }

        if (!$isExists) {
            $combinedData[] = $data;
        }
    }

    $combinedData = array_slice($combinedData, 0, 5);

    foreach ($combinedData as $data) {
        echo "Title: {$data['title']}\n";
    }
} catch (PDOException $e) {
    die("Error fetching data from database: " . $e->getMessage());
}

