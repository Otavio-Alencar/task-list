<?php 
    require 'models/Task.php';
    class TaskDaoMySQL implements TaskDAO{
        private $pdo;
        public function __construct(PDO $driver){
            $this->pdo = $driver;
        }
        public function add(Task $t){
            $sql = $this->pdo->prepare('INSERT INTO task_list_table (task) VALUES (:task)');
            $sql->bindValue(':task',$t->getTask());
            $sql->execute();

            $t->setId($this->pdo->lastInsertId());
            return $t;
        }
        public function findAll(){
            $array = [];
            $sql = $this->pdo->query('SELECT * FROM task_list_table ');
            if($sql->rowCount() > 0 ){
                $data = $sql->fetchAll();
            }

            foreach($data as $item){
                $t = new Task();
                $t->setId($item['id']);
                $t->setTask($item['task']);

                $array[] = $t;

            }

            return $array;
        }
        public function findById($id){
            $sql = $this->pdo->prepare("SELECT * FROM task_list_table WHERE id = :id");
            $sql->bindValue(':id',$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch();

                $t = new Task();
                $t->setId($data['id']);
                $t->setTask($data['task']);
                return $t;
            }else{
                return false;
            }
        }
        public function findByTask($task){
            $sql = $this->pdo->prepare("SELECT * FROM task_list_table WHERE task = :task");
            $sql->bindValue(':task',$task);
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetch();

                $t = new Task();
                $t->setId($data['id']);
                $t->setTask($data['task']);
                return $t;
            }else{
                return false;
            }
        }
        public function delete($id){
            $sql = $this->pdo->prepare("DELETE FROM task_list_table WHERE id = :id");
            $sql->bindValue(':id',$id);
            $sql->execute();
        }
    }


?>