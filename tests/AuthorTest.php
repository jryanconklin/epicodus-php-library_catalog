<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../inc/ConnectionTest.php";
    require_once __DIR__."/../src/Author.php";
    require_once __DIR__."/../src/Book.php";
    require_once __DIR__."/../src/Patron.php";
    require_once __DIR__."/../src/Copy.php";
    require_once __DIR__."/../src/Checkout.php";


    class AuthorTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Author::deleteAll();
            // Book::deleteAll();
            // Copy::deleteAll();
            // Patron::deleteAll();
            // Checkout::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $id = 1;
            $name = "JRR Tolkien";
            $test_author = new Author($id, $name);

            //Act
            $result = $test_author->getId();

            //Assert
            $this->assertEquals(1, $result);
       }

       function test_getName()
       {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($id, $name);

            //Act
            $result = $test_author->getName();

            //Assert
            $this->assertEquals($name, $result);
      }


        function test_setName()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($id, $name);

            $new_name = "Stieg Larsson";

            //Act
            $test_author->setName($new_name);
            $result = $test_author->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_save()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($id, $name);

            //Act
            $test_author->save();
            $result = Author::getAll();
            // var_dump($result);

            //Assert
            $this->assertEquals([$test_author], $result);
        }






//End Test
    }
?>
