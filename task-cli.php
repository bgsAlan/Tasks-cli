<?php 
date_default_timezone_set("Asia/Jakarta");
require "main-todo.php";

$command = $argv[1] ?? null;

switch($command) {
    case "add":
        $description = $argv[2] ?? null;
        addTodo($description);
        break;
    case "update":
        $id = $argv[2] ?? null;
        $status = $argv[3] ?? null;
        updateStatus($id,$status);
}
?>