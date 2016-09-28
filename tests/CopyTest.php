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
        // protected function tearDown()
        // // {
        // //     Author::deleteAll();
        // //     Book::deleteAll();
        // //     Copy::deleteAll();
        // //     Patron::deleteAll();
        // //     Checkout::deleteAll();
        // }

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

//End Test
    }
?>
