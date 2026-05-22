<?php 
require "main-todo.php";

$command = $argv[1] ?? null;

if ($command === "add") {

    $description = $argv[2] ?? null;

    addTodo($description);
}
?>