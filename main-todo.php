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
/*Update Todo
update status
*/
function updateStatus(int $id, string $status) {
    //take task target
    $tasks = readTasks();
    $found = false;
    foreach($tasks as &$task) {
    //find id correct
    if($task["id"] == $id) {
        //Update status
        $task["status"] = $status;
        //Update Waktu
        $task["updateAt"] = date("Y-m-d H:i:s");

        $found = true;
        break;
    }
    }
    //if id not found
     if (!$found) {
        echo "Task not found" . PHP_EOL;
        return;
     }
    saveTasks($tasks);

    echo "Task updated successfully" . PHP_EOL;
}



?>