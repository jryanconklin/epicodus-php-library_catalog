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
            Author::deleteAll();
            Book::deleteAll();
            Copy::deleteAll();
            Patron::deleteAll();
            Checkout::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($title, $genre, $id);

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
            $test_book = new Book($title, $genre, $id);

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
            $test_book = new Book($title, $genre, $id);

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
            $test_book = new Book($title, $genre, $id);

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
            $test_book = new Book($title, $genre, $id);

            //Act
            $new_genre = "Awesome";
            $test_book->setGenre($new_genre);
            $result = $test_book->getGenre();

            //Assert
            $this->assertEquals($new_genre, $result);
        }

        function test_save()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            //Act
            $result = Book::getAll();

            //Assert
            $this->assertEquals([$test_book], $result);
        }

        function test_getAll()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            $title2 = "Lord of the Rings";
            $genre2 = "Fantasy";
            $test_book2 = new Book($title2, $genre2, $id);
            $test_book2->save();

            //Act
            $result = Book::getAll();

            //Assert
            $this->assertEquals([$test_book, $test_book2], $result);
        }

        function test_findById()
        {
            //Arrange
            $id = 1;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            $title2 = "Lord of the Rings";
            $genre2 = "Fantasy";
            $test_book2 = new Book($title2, $genre2, $id);
            $test_book2->save();

            //Act
            $search_id = $test_book2->getId();
            $result = $test_book2->findById($search_id);

            //Assert
            $this->assertEquals($test_book2, $result);
        }

        function test_update()
        {
            //Arrange
            $id = null;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            $new_title = "Lion King";
            $test_book->setTitle($new_title);

            //Act
            $test_book->update();
            $result = Book::getAll();

            //Assert
            $this->assertEquals([$test_book], $result);
        }

        function test_delete()
        {
            //Arrange
            $id = null;
            $title = "Jungle Book";
            $genre = "childrens";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();
            $test_book->delete();

            $title2 = "Lord of the Rings";
            $genre2 = "Fantasy";
            $test_book2 = new Book($title2, $genre2, $id);
            $test_book2->save();

            //Act
            $result = Book::getAll();

            //Assert
            $this->assertEquals([$test_book2], $result);
        }

        function test_getAuthorList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $id2 = null;
            $name2 = "Christopher Tolkien";
            $test_author2 = new Author($name2, $id2);
            $test_author2->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();


            //Act
            $test_book->addToAuthorList($test_author);
            $test_book->addToAuthorList($test_author2);
            $result = $test_book->getAuthorList();

            //Assert
            $this->assertEquals([$test_author, $test_author2], $result);
        }

        function test_addToAuthorList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $id2 = null;
            $name2 = "Christopher Tolkien";
            $test_author2 = new Author($name2, $id2);
            $test_author2->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();


            //Act
            $test_book->addToAuthorList($test_author);
            $result = $test_book->getAuthorList();

            //Assert
            $this->assertEquals([$test_author], $result);
        }

        function test_deleteAllAuthorList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $name2 = "JRR Tolkien";
            $test_author2 = new Author($name2, $id);
            $test_author2->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            //Act
            $test_book->addToAuthorList($test_author);
            $test_book->addToAuthorList($test_author2);

            $test_book->deleteAllAuthorList();
            $result = $test_book->getAuthorList();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_deleteFromAuthorList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $name2 = "JRR Tolkien";
            $test_author2 = new Author($name2, $id);
            $test_author2->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            //Act
            $test_book->addToAuthorList($test_author);
            $test_book->addToAuthorList($test_author2);

            $test_book->deleteFromAuthorList($test_author);
            $result = $test_book->getAuthorList();

            //Assert
            $this->assertEquals([$test_author2], $result);
        }

//End Test
    }
?>
