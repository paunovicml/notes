<?php

require "Validator.php";

$config = require "config.php";
$db = new Database($config['database']);

$heading = "Create Note";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $errors = [];

    $validator = new Validator();


    if (strlen($_POST['body']) === 0) {
        $errors['body'] = "A body is required";
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = "Must be less then 1.000 characters";
    }


    if (empty($errors['body'])) {
        $db->query("INSERT INTO notes (body, user_id) VALUES (:id, :user_id)", [
            ':id' => $_POST['body'],
            ':user_id' => 1
        ]);
    }
}

require "views/note-create.view.php";

