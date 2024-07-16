<?php 
    require 'config.php';
    require 'dao/TaskDAOMySQL.php';

    $taskDao = new TaskDaoMySQL($pdo);

    $id= filter_input(INPUT_GET,'id');

    if($id){
        $taskDao->delete($id);
    }
    header("Location: index.php");
    exit;
?>