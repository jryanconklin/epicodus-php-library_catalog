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

    class PatronTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Author::deleteAll();
            Book::deleteAll();
            Copy::deleteAll();
            Patron::deleteAll();
            Checkout::deleteAll();
        }

//         function test_getId()
//         {
//             //Arrange
//             $id = 1;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//
//             //Act
//             $result = $test_patron->getId();
//
//             //Assert
//             $this->assertEquals(1, $result);
//         }
//
//         function test_getName()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//
//             //Act
//             $result = $test_patron->getName();
//
//             //Assert
//             $this->assertEquals($name, $result);
//         }
//
//
//         function test_setName()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//
//             $new_name = "Frodo Baggins";
//
//             //Act
//             $test_patron->setName($new_name);
//             $result = $test_patron->getName();
//
//             //Assert
//             $this->assertEquals($new_name, $result);
//         }
//
//         function test_save()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//
//             //Act
//             $test_patron->save();
//             $result = Patron::getAll();
//
//             //Assert
//             $this->assertEquals([$test_patron], $result);
//         }
//
//         function test_getAll()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//             $test_patron->save();
//
//             $name2 = "Frodo Baggins";
//             $test_patron2 = new Patron($name2, $id);
//             $test_patron2->save();
//
//             //Act
//             $result = Patron::getAll();
//
//             //Assert
//             $this->assertEquals([$test_patron, $test_patron2], $result);
//         }
//
//         function test_findById()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//             $test_patron->save();
//
//             $name2 = "Frodo Baggins";
//             $test_patron2 = new Patron($name2, $id);
//             $test_patron2->save();
//
//             //Act
//             $search_id = $test_patron2->getId();
//             $result = Patron::findById($search_id);
//
//             //Assert
//             $this->assertEquals($test_patron2, $result);
//         }
//
//         function test_update()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//             $test_patron->save();
//
//             $new_name = "Frodo Baggins";
//             $test_patron->setName($new_name);
//
//             //Act
//
//             $test_patron->update();
//             $result = Patron::getAll();
//
//             //Assert
//             $this->assertEquals([$test_patron], $result);
//         }
//
//         function test_delete()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//             $test_patron->save();
//
//             // Act
//             $test_patron->delete();
//             $result = Patron::getAll();
//
//             // Assert
//             $this->assertEquals([], $result);
//         }
// //Start New Tests
//         function test_getCopyList()
//         {
//             //Arrange
//             $id = null;
//             $name = "Bilbo Baggins";
//             $test_patron = new Patron($name, $id);
//             $test_patron->save();
//
//             $available = true;
//             $book_id = 2;
//             $id =1;
//             $test_copy = new Copy($available, $book_id, $id);
//             $test_copy->save();
//
//             $available2 = true;
//             $book_id2 = 2;
//             $test_copy2 = new Copy($available2, $book_id2, $id);
//             $test_copy2->save();
//
//             //Act
//             $test_patron->addToCopyList($test_copy);
//             $test_patron->addToCopyList($test_copy2);
//             $result = $test_patron->getCopyList();
//
//             //Assert
//             $this->assertEquals([$test_copy, $test_copy2], $result);
//         }

        function test_addToCopyList()
        {
            //Arrange
            $id = null;
            $name = "Bilbo Baggins";
            $test_patron = new Patron($name, $id);
            $test_patron->save();

            $available = true;
            $book_id = 2;
            $id =1;
            $test_copy = new Copy($available, $book_id, $id);
            $test_copy->save();

            //Act
            $test_patron->addToCopyList($test_copy);
            $result = $test_patron->getCopyList();

            //Assert
            $this->assertEquals([$test_copy], $result);
        }

        // function test_deleteAllCopyList()
        // {
        //     //Arrange
        //     $id = null;
        //     $name = "Bilbo Baggins";
        //     $test_patron = new Patron($name, $id);
        //     $test_patron->save();
        //
        //     $available = true;
        //     $book_id = 2;
        //     $id =1;
        //     $test_copy = new Copy($available, $book_id, $id);
        //     $test_copy->save();
        //
        //     $available2 = true;
        //     $book_id2 = 2;
        //     $test_copy2 = new Copy($available2, $book_id2, $id);
        //     $test_copy2->save();
        //
        //     //Act
        //     $test_patron->addToCopyList($test_copy);
        //     $test_patron->addToCopyList($test_copy2);
        //
        //     $test_patron->deleteAllCopyList();
        //     $result = $test_patron->getCopyList();
        //
        //     //Assert
        //     $this->assertEquals([], $result);
        // }
        //
        // function test_deleteFromCopyList()
        // {
        //     //Arrange
        //     $id = null;
        //     $name = "Bilbo Baggins";
        //     $test_patron = new Patron($name, $id);
        //     $test_patron->save();
        //
        //     $available = true;
        //     $book_id = 2;
        //     $id =1;
        //     $test_copy = new Copy($available, $book_id, $id);
        //     $test_copy->save();
        //
        //     $available2 = true;
        //     $book_id2 = 2;
        //     $test_copy2 = new Copy($available2, $book_id2, $id);
        //     $test_copy2->save();
        //
        //     //Act
        //     $test_patron->addToCopyList($test_copy);
        //     $test_patron->addToCopyList($test_copy2);
        //
        //     $test_patron->deleteFromCopyList($test_copy2);
        //     $result = $test_patron->getCopyList();
        //
        //     //Assert
        //     $this->assertEquals([$test_copy], $result);
        // }
        //
        //

//End Test
    }
?>
