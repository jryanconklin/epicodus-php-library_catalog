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
            Book::deleteAll();
            Copy::deleteAll();
            Patron::deleteAll();
            Checkout::deleteAll();
        }

        function test_getId()
        {
            //Arrange
            $id = 1;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);

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
            $test_author = new Author($name, $id);

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
            $test_author = new Author($name, $id);

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
            $test_author = new Author($name, $id);

            //Act
            $test_author->save();
            $result = Author::getAll();
            // var_dump($result);

            //Assert
            $this->assertEquals([$test_author], $result);
        }

        function test_getAll()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $name2 = "Katy Henning";
            $test_author2 = new Author($name2, $id);
            $test_author2->save();

            //Act
            $result = Author::getAll();

            //Assert
            $this->assertEquals([$test_author, $test_author2], $result);
        }

        function test_findById()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $name2 = "Katy Henning";
            $test_author2 = new Author($name2, $id);
            $test_author2->save();

            //Act
            $search_id = $test_author2->getId();
            $result = Author::findById($search_id);

            //Assert
            $this->assertEquals($test_author2, $result);
        }

        function test_update()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $new_name = "Katy Henning";
            $test_author->setName($new_name);

            //Act

            $test_author->update();
            $result = Author::getAll();

            //Assert
            $this->assertEquals([$test_author], $result);
        }

        function test_delete()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            // Act
            $test_author->delete();
            $result = Author::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

        function test_getBookList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            $title2 = "The Hobbit";
            $genre2 = "Fantasy";
            $test_book2 = new Book($title2, $genre2, $id);
            $test_book2->save();

            //Act
            $test_author->addToBookList($test_book);
            $test_author->addToBookList($test_book2);
            $result = $test_author->getBookList();

            //Assert
            $this->assertEquals([$test_book, $test_book2], $result);
        }

        function test_addToBookList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            //Act
            $test_author->addToBookList($test_book);
            $result = $test_author->getBookList();

            //Assert
            $this->assertEquals([$test_book], $result);
        }

        function test_deleteBookList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            $title2 = "The Hobbit";
            $genre2 = "Fantasy";
            $test_book2 = new Book($title2, $genre2, $id);
            $test_book2->save();

            //Act
            $test_author->addToBookList($test_book);
            $test_author->addToBookList($test_book2);

            $test_author->deleteAllBookList();
            $result = $test_author->getBookList();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_deleteFromBookList()
        {
            //Arrange
            $id = null;
            $name = "JRR Tolkien";
            $test_author = new Author($name, $id);
            $test_author->save();

            $title = "Lord of the Rings";
            $genre = "Fantasy";
            $test_book = new Book($title, $genre, $id);
            $test_book->save();

            $title2 = "The Hobbit";
            $genre2 = "Fantasy";
            $test_book2 = new Book($title2, $genre2, $id);
            $test_book2->save();

            //Act
            $test_author->addToBookList($test_book);
            $test_author->addToBookList($test_book2);

            $test_author->deleteFromBookList($test_book2);
            $result = $test_author->getBookList();

            //Assert
            $this->assertEquals([$test_book], $result);
        }


//End Test
    }
?>
