<?php
include 'databaseConnection.php';


$articlesData = [
    [
        'title' => 'Article Position 1',
        'summary' => 'This is a summary of sample article 1.',
        'position' => 1,
        'author' => 'Gema'
    ],
    [
        'title' => 'Article Position 3',
        'summary' => 'This is a summary of sample article 3.',
        'position' => 3,
        'author' => 'Gema'
    ],
    [
        'title' => 'Article Position 5',
        'summary' => 'This is a summary of sample article 5.',
        'position' => 5,
        'author' => 'Gema'
    ]
];


try {
    // Prepare SQL statement for insertion
    $stmt = $pdo->prepare("INSERT INTO articles (title, summary, position, author) VALUES (:title, :summary, :position, :author)");

    // Bind parameters and execute for each article data
    foreach ($articlesData as $article) {
        $stmt->bindParam(':title', $article['title']);
        $stmt->bindParam(':summary', $article['summary']);
        $stmt->bindParam(':position', $article['position']);
        $stmt->bindParam(':author', $article['author']);
        $stmt->execute();
    }

    echo "Seeding completed successfully.\n";
} catch (PDOException $e) {
    echo $e->getMessage();
}
