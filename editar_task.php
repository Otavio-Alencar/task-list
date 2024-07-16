<?php 
    require 'config.php';
    require 'dao/TaskDAOMySQL.php';

    $taskDao = new TaskDaoMySQL($pdo);

?>