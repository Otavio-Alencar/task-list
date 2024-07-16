<?php 
    require 'config.php';
    require 'dao/TaskDAOMySQL.php';

    $taskDao = new TaskDaoMySQL($pdo);
    $task = filter_input(INPUT_GET,'task-input');

    if($task){
        $newTask = new Task();
        $newTask->setTask($task);

        $taskDao->add($newTask);
        header('Location: index.php');
        exit;
    }else{
        header('Location: index.php');
        exit;
    }
    
?>