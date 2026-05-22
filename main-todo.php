<?php 
require ("helper.php");
/* 
Make a add function to add todo
add a createdAt
*/

function addTodo(string $description) {
    //take all tasks from json
    $tasks = readTasks();
    //Generate new id
    $id = generateID($tasks);

    //create a new task
    $newTask = [
        "id" => $id,
        "description" => $description,
        "status" => "todo",
        "createdAt" => date("Y-m-d H:i:s"),
        "updateAt" => date("Y-m-d H:i:s")
    ];
    //add task to array
    $tasks[] = $newTask;

    //save to JSON
    saveTasks($tasks);

    //output
    echo "Task success added (ID: {$id})" . PHP_EOL;
}

?>