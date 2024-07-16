<?php 
    class Task{
        private $id;
        private $task;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = trim($id);
        }

        public function getTask(){
            return $this->task;
        }

        public function setTask($task){
            $this->task = trim($task);
        }
    }

    interface TaskDAO{
        public function add(Task $t);
        public function findAll();
        public function findById($id);
        public function findByTask($task);
        public function delete($id);
    }
?>