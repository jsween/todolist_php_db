<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Animal.php";
    require_once "src/Type.php";

    $server = 'mysql:host=localhost;dbname=shelter_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TypeTest extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
        {
          Type::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Cat";
            $test_Type = new Type($name);

            //Act
            $result = $test_Type->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        // function test_getId()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = 1;
        //     $test_Category = new Category($name, $id);
        //
        //     //Act
        //     $result = $test_Category->getId();
        //
        //     //Assert
        //     $this->assertEquals(true, is_numeric($result));
        // }
        //
        function test_save()
        {
            //Arrange
            $name = "dog";
            $id = null;
            $test_type = new Type($name, $id);
            $test_type->save();


            //Act
            $result = Type::getAll();
            //Assert
            $this->assertEquals($test_type, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $type = "dog";
            $type2 = "cat";
            $test_type = new Type($type);
            $test_type->save();
            $test_type2 = new Type($type2);
            $test_type2->save();

            //Act
            $result = type::getAll();

            //Assert
            $this->assertEquals([$test_type, $test_type2], $result);
        }

        // function test_deleteAll()
        // {
        //     //Arrange
        //     $type = "dog";
        //     $type2 = "cat";
        //     $test_type = new Type($type);
        //     $test_type->save();
        //     $test_type2 = new Type($type2);
        //     $test_type2->save();
        //
        //     //Act
        //     Type::deleteAll();
        //     $result = Type::getAll();
        //
        //     //Assert
        //     $this->assertEquals([], $result);
        // }
        //
        // function test_find()
        // {
        //     //Arrange
        //     $name = "Wash the dog";
        //     $name2 = "Home stuff";
        //     $test_Category = new Category($name);
        //     $test_Category->save();
        //     $test_Category2 = new Category($name2);
        //     $test_Category2->save();
        //
        //     //Act
        //     $result = Category::find($test_Category->getId());
        //
        //     //Assert
        //     $this->assertEquals($test_Category, $result);
        // }
        //
        // function testGetTasks()
        // {
        //     //Arrange
        //     $name = "Work stuff";
        //     $id = null;
        //     $test_category = new Category($name, $id);
        //     $test_category->save();
        //
        //     $test_category_id = $test_category->getId();
        //
        //     $description = "Email client";
        //     $due_date = "2016-2-24";
        //     $test_task = new Task($description, $test_category_id, $due_date, $id);
        //     $test_task->save();
        //
        //     $description2 = "Meet with boss";
        //     $due_date2 = "2019-9-04";
        //     $test_task2 = new Task($description2, $test_category_id, $due_date2, $id);
        //     $test_task2->save();
        //
        //     //Act
        //     $result = $test_category->getTasks();
        //
        //     //Assert
        //     $this->assertEquals([$test_task, $test_task2], $result);
        // }
    }

?>
