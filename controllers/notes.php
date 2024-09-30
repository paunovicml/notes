<?php

$heading = "My Notes";

$config = require "config.php";

$db = new Database($config['database']);
$currentUserId = 1;

$notes = $db->query("select * from notes where user_id = :id", [':id' => $currentUserId])->get();


require "views/notes.view.php";

