<?php 
//Name file Json
define("FILE_PATH", "task-save.json");
/* 
Check file JSON exist
if not make a new file
read again JSON file
change json to array php
return array tasks
*/

function readTasks(): array
{
    //If file doesn't exist
    if(!file_exists(FILE_PATH)){
        //create file JSON blank
        file_put_contents(FILE_PATH,json_encode([]));
    }
    //Take file JSON
    $json = file_get_contents(FILE_PATH);
    //Change JSON file to array php
    $tasks = json_decode($json, true);

    //IF JSON CORRUPT/NULL
    if(!$tasks) {
        $tasks = [];
    }

    return $tasks;
}

/* 
function to 
change array php to json
save json file
*/

function saveTasks(array $tasks): void {
    file_put_contents(
        FILE_PATH,
        json_encode($tasks, JSON_PRETTY_PRINT)
    );
}

/*Generate ID
function to
find id bigger
add +1
*/

function generateID(array $tasks): int {
    //if tasks doesn't exist
    if(!$tasks) {
        return 1;
    }
    //Take All ID
    $ids = array_column($tasks,"id");
    //find id bigger
    $maxID = max($ids);

    return $maxID + 1;
}

?>