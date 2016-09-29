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

    class CopyTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            // Author::deleteAll();
            // Book::deleteAll();
            // Copy::deleteAll();
            // Patron::deleteAll();
            // Checkout::deleteAll();
        }

        function test_getId()
        {
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);

            //Act
            $result = $test_copy->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_getAvailable()
        {
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);

            //Act
            $result = $test_copy->getAvailable();

            //Assert
            $this->assertEquals(true, $result);
        }

        function test_getBookId()
        {
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);

            //Act
            $result = $test_copy->getBookId();

            //Assert
            $this->assertEquals(2, $result);
        }

        function test_setAvailable()
        {
            //Arrange
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);

            $new_available = false;

            //Act
            $result = $test_copy->setAvailable($new_available);

            //Assert
            $this->assertEquals($new_available , $result);
        }

        function test_save()
        {
            //Arrange
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);
            $test_copy->save();

            //Act
            $result = Copy::getAll();

            //Assert
            $this->assertEquals([$test_copy] , $result);
        }

        function test_getAll()
        {
            //Arrange
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);
            $test_copy->save();

            $available2 = true;
            $book_id2 = 2;
            $test_copy2 = new Copy($available2, $book_id2, $id);
            $test_copy2->save();

            //Act
            $result = Copy::getAll();

            //Assert
            $this->assertEquals([$test_copy, $test_copy2], $result);
        }

        function test_update()
        {
            //Arrange
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);
            $test_copy->save();

            $new_available = false;
            $test_copy->setAvailable($new_available);

            //Act
            $test_copy->update();
            $result = Copy::getAll();

            //Assert
            $this->assertEquals([$test_copy], $result);
        }

        function test_delete()
        {
            //Arrange
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);
            $test_copy->save();

            $available1 = true;
            $book_id1 = 2;
            $id1 =1;
            $test_copy2 = new Copy($available1, $book_id1, $id1);
            $test_copy2->save();

            //Act
            $test_copy->delete();
            $result = Copy::getAll();

            //Assert
            $this->assertEquals([$test_copy2], $result);
        }


        function test_findById()
        {
            //Arrange
            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);
            $test_copy->save();

            $available1 = true;
            $book_id1 = 2;
            $id1 =1;
            $test_copy2 = new Copy($available1, $book_id1, $id1);
            $test_copy2->save();

            $search_id = $test_copy2->getId();

            //Act
            $result = Copy::findById($search_id);

            //Assert
            $this->assertEquals($test_copy2, $result);
        }

//Start New Tests
        // function test_getPatronList()
        // {
        //     //Arrange
        //     $available = true;
        //     $book_id = 2;
        //     $id =1;
        //     $test_copy = new Copy($available, $book_id, $id);
        //     $test_copy->save();
        //
        //     $id = null;
        //     $name = "Bilbo Baggins";
        //     $test_patron = new Patron($name, $id);
        //     $test_patron->save();
        //
        //     $name2 = "Frodo Baggins";
        //     $test_patron2 = new Patron($name2, $id);
        //     $test_patron2->save();
        //
        //     //Act
        //     $test_copy->addToPatronList($test_patron);
        //     $test_copy->addToPatronList($test_patron2);
        //     $result = $test_copy->getPatronList();
        //
        //     //Assert
        //     $this->assertEquals([$test_patron, $test_patron2], $result);
        // }
        //
        // function test_addToPatronList()
        // {
        //     //Arrange
        //     $available = true;
        //     $book_id = 2;
        //     $id =1;
        //     $test_copy = new Copy($available, $book_id, $id);
        //     $test_copy->save();
        //
        //     $id = null;
        //     $name = "Bilbo Baggins";
        //     $test_patron = new Patron($name, $id);
        //     $test_patron->save();
        //
        //     //Act
        //     $test_copy->addToPatronList($test_patron);
        //
        //     //Assert
        //     $this->assertEquals([$test_patron], $result);
        // }
        //
        // function test_deleteAllPatronList()
        // {
        //     //Arrange
        //     $available = true;
        //     $book_id = 2;
        //     $id =1;
        //     $test_copy = new Copy($available, $book_id, $id);
        //     $test_copy->save();
        //
        //     $id = null;
        //     $name = "Bilbo Baggins";
        //     $test_patron = new Patron($name, $id);
        //     $test_patron->save();
        //
        //     $name2 = "Frodo Baggins";
        //     $test_patron2 = new Patron($name2, $id);
        //     $test_patron2->save();
        //
        //     //Act
        //     $test_copy->addToPatronList($test_patron);
        //     $test_copy->addToPatronList($test_patron2);
        //
        //     $test_copy->deleteAllPatronList();
        //     $result = $test_copy->getPatronList();
        //
        //     //Assert
        //     $this->assertEquals([], $result);
        // }
        //
        // function test_deleteFromPatronList()
        // {
        //     //Arrange
        //     $available = true;
        //     $book_id = 2;
        //     $id =1;
        //     $test_copy = new Copy($available, $book_id, $id);
        //     $test_copy->save();
        //
        //     $id = null;
        //     $name = "Bilbo Baggins";
        //     $test_patron = new Patron($name, $id);
        //     $test_patron->save();
        //
        //     $name2 = "Frodo Baggins";
        //     $test_patron2 = new Patron($name2, $id);
        //     $test_patron2->save();
        //
        //     //Act
        //     $test_copy->addToPatronList($test_patron);
        //     $test_copy->addToPatronList($test_patron2);
        //
        //     $test_copy->deleteFromCopyList($test_copy2);
        //     $result = $test_copy->getPatronList();
        //
        //     //Assert
        //     $this->assertEquals([$test_patron], $result);
        // }



//End Test
    }
?>
