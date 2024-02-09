<?php
function validateArticleData()
{
    parse_str(file_get_contents("php://input"), $put_vars);

    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        if (empty($put_vars['article_id'])) {
            $errors[] = 'Articel Id is required.';
        }
    }

    if (empty($put_vars['title'])) {
        $errors[] = 'Title is required.';
    }

    if (empty($put_vars['summary'])) {
        $errors[] = 'Summary is required.';
    } elseif (strlen($put_vars['summary']) > 500) {
        $errors[] = 'Summary must be less than 500 characters.';
    }

    if (empty($put_vars['position'])) {
        $errors[] = 'Position is required.';
    } else {
        if (!is_numeric($put_vars['position']) || (int)$put_vars['position'] < 1 || (int)$put_vars['position'] > 5) {
            $errors[] = 'Position must be a number between 1 and 5.';
        }
    }

    if (empty($put_vars['author'])) {
        $errors[] = 'Author is required.';
    }

    return empty($errors) ? true : $errors;
}
