<?php
    class Type
    {
        private $name;
        private $id;

        function __construct($name, $id = null)
        {
            $this->name = $name;
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

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO types (animal_type) VALUES ('{$this->getName()}')");
            $this->id= $GLOBALS['DB']->lastInsertId();
        }

        // function getTasks()
        // {
        //     $tasks = Array();
        //     $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks WHERE category_id = {$this->getId()} ORDER BY due_date;");
        //     foreach($returned_tasks as $task) {
        //         $description = $task['description'];
        //         $category_id = $task['category_id'];
        //         $due_date = $task['due_date'];
        //         $id = $task['id'];
        //         $new_task = new Task($description, $category_id, $due_date, $id);
        //         array_push($tasks, $new_task);
        //     }
        //     return $tasks;
        // }
        //
        static function getAll()
        {
            $returned_types = $GLOBALS['DB']->query("SELECT * FROM types;");
            $types = array();
            foreach($returned_types as $type) {
                $name = $type['animal_type'];
                $id = $type['id'];
                $new_type = new Type($name, $id);
                array_push($types, $new_type);
            }
            return $types;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM types;");
        }
        //
        // static function find($search_id)
        // {
        //     $found_category = null;
        //     $categories = Category::getAll();
        //     foreach($categories as $category) {
        //         $category_id = $category->getId();
        //         if ($category_id == $search_id) {
        //           $found_category = $category;
        //         }
        //     }
        //     return $found_category;
        // }
    }
?>
