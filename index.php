<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
        <?php 
            require 'config.php';
            require 'dao/TaskDAOMySQL.php';
        
            $taskDao = new TaskDaoMySQL($pdo);
            $lista = $taskDao->findAll();
        
        ?>
        <div class="card">
            <div class="send-task">
                <h1>Lista de tarefas</h1>
                <form action="adicionar_task.php" method="GET">
                    <label for="task-input">
                        <input type="text" name="task-input" placeholder="Sua tarefa" class="input-task">
                    </label>
                    <input type="submit" value=">" class="submit-button">
                </form>
            </div>

            <div class="container-task">
                <div class="tasks">
                    <?php 
                    
                        foreach($lista as $item):?>
                            <div class="task">
                                <p class="task-text"><?php  
                                    echo $item->getTask();
                                    ?>
                                </p>
                                <div class="actions">
                                <a href="excluir_task.php?id=<?=$item->getId()?>" class="close">X</a>
                                </div>
                            </div> 
                   <?php endforeach; ?>
                </div>
            </div>
        </div>
   
</body>
</html>