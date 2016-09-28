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

    class BookTest extends PHPUnit_Framework_TestCase
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
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($id, $title, $genre);

            //Act
            $result = $test_book->getId();

            //Assert
            $this->assertEquals(1, $result);
        }

        function test_getTitle()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($id, $title, $genre);

            //Act
            $result = $test_book->getTitle();

            //Assert
            $this->assertEquals($title, $result);
        }

        function test_getGenre()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($id, $title, $genre);

            //Act
            $result = $test_book->getGenre();

            //Assert
            $this->assertEquals($genre, $result);
        }

        function test_setTitle()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($id, $title, $genre);

            //Act
            $new_title = "City Book";
            $test_book->setTitle($new_title);
            $result = $test_book->getTitle();

            //Assert
            $this->assertEquals($new_title, $result);
        }

        function test_setGenre()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($id, $title, $genre);

            //Act
            $new_genre = "Awesome";
            $test_book->setGenre($new_genre);
            $result = $test_book->getGenre();

            //Assert
            $this->assertEquals($new_genre, $result);
        }




//End Test
    }
?>
