<?php
    class Animal
    {
        private $name;
        private $type;
        private $admit_date;
        private $id;

        function __construct($name, $type_id, $admit_date, $id = null)
        {
            $this->name = $name;
            $this->type_id = $type_id;
            $this->admit_date = $admit_date;
            $this->id = $id;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getName()
        {
            return $this->name;
        }

        function setAdmitDate($new_admit_date)
        {
            $this->admit_date = (string) $new_admit_date;
        }

        function getAdmitDate()
        {
            return $this->admit_date;
        }

        function getTypeId()
        {
            return $this->type_id;
        }


        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO all_animals (name, type_id, admit_date) VALUES ('{$this->getName()}', {$this->getTypeId()}, '{$this->getAdmitDate()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_animals = $GLOBALS['DB']->query("SELECT * FROM all_animals;");
            $all_animals = array();
            foreach($returned_animals as $animal) {
                $name = $animal['name'];
                $type_id = $animal['type_id'];
                $admit_date = $animal['admit_date'];
                $id = $animal['id'];
                $new_animal = new Animal($name, $type_id, $admit_date, $id);
                array_push($all_animals, $new_animal);
            }
            return $all_animals;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM all_animals;");
        }

        // static function find($search_id)
        // {
        //     $found_task = null;
        //     $tasks = Task::getAll();
        //     foreach($tasks as $task) {
        //         $task_id = $task->getId();
        //         if ($task_id == $search_id) {
        //           $found_task = $task;
        //         }
        //     }
        //     return $found_task;
        // }
    }
?>
