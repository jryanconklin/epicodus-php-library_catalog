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

    class CheckoutTest extends PHPUnit_Framework_TestCase
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
            $status = "Available";
            $due_date = "2017-01-31";
            $patron_id = 1;
            $copy_id = 2;
            $id = 1;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);

            //Act
            $result = $checkout->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_getPatronId()
        {
            //Arrange
            $status = "Available";
            $due_date = "2017-01-31";
            $patron_id = 3;
            $copy_id = 2;
            $id = 1;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);

            //Act
            $result = $checkout->getPatronId();

            //Assert
            $this->assertEquals($patron_id, $result);
        }

        function test_getCopyId()
        {
            //Arrange
            $status = "Available";
            $due_date = "2017-01-31";
            $patron_id = 3;
            $copy_id = 2;
            $id = 1;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);

            //Act
            $result = $checkout->getCopyId();

            //Assert
            $this->assertEquals($copy_id, $result);
        }

        function test_getStatus()
        {
            //Arrange
            $status = "Available";
            $due_date = "2017-01-31";
            $patron_id = 3;
            $copy_id = 2;
            $id = 1;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);

            //Act
            $result = $checkout->getStatus();

            //Assert
            $this->assertEquals($status, $result);
        }

        function test_setStatus()
        {
            //Arrange
            $status = "Available";
            $due_date = "2017-01-31";
            $patron_id = 3;
            $copy_id = 2;
            $id = 1;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);

            $new_status = "Checked Out";

            //Act
            $checkout->setStatus($new_status);
            $result = $checkout->getStatus();

            //Assert
            $this->assertEquals($new_status, $result);
        }

        function test_setDueDate()
        {
            //Arrange
            $status = "Available";
            $due_date = "2017-12-31";
            $patron_id = 3;
            $copy_id = 2;
            $id = 1;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);

            $new_due_date = "Checked Out";

            //Act
            $checkout->setDueDate($new_due_date);
            $result = $checkout->getDueDate();

            //Assert
            $this->assertEquals($new_due_date, $result);
        }

        function test_save()
        {
            //Arrange
            $status = 'Available';
            $due_date = '2017-12-31';
            $patron_id = 3;
            $copy_id = 2;
            $id = null;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);
            $checkout->save();

            //Act
            $result = Checkout::getAll();

            //Assert
            $this->assertEquals([$checkout], $result);
        }

        function test_getAll()
        {
            //Arrange
            $status = 'Available';
            $due_date = '2017-12-31';
            $patron_id = 3;
            $copy_id = 2;
            $id = null;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);
            $checkout->save();

            $status2 = 'Unvailable';
            $due_date2 = '2018-12-31';
            $patron_id2 = 5;
            $copy_id2 = 4;
            $id = null;
            $checkout2 = new Checkout($status2, $due_date2, $patron_id2, $copy_id2, $id);
            $checkout2->save();

            //Act
            $result = Checkout::getAll();

            //Assert
            $this->assertEquals([$checkout, $checkout2], $result);
        }

        function test_delete()
        {
            //Arrange
            $status = 'Available';
            $due_date = '2017-12-31';
            $patron_id = 3;
            $copy_id = 2;
            $id = null;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);
            $checkout->save();

            $status2 = 'Unvailable';
            $due_date2 = '2018-12-31';
            $patron_id2 = 5;
            $copy_id2 = 4;
            $id = null;
            $checkout2 = new Checkout($status2, $due_date2, $patron_id2, $copy_id2, $id);
            $checkout2->save();

            //Act
            $checkout->delete();
            $result = Checkout::getAll();

            //Assert
            $this->assertEquals([$checkout2], $result);
        }

        function test_update()
        {
            //Arrange
            $status = 'Available';
            $due_date = '2017-12-31';
            $patron_id = 3;
            $copy_id = 2;
            $id = null;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);
            $checkout->save();

            $new_status = 'Unavailable';
            $checkout->setStatus($new_status);
            $checkout->update();

            //Act
            $result = Checkout::getAll();

            //Assert
            $this->assertEquals([$checkout], $result);
        }

        function test_findById()
        {
            //Arrange
            $status = 'Available';
            $due_date = '2017-12-31';
            $patron_id = 3;
            $copy_id = 2;
            $id = null;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);
            $checkout->save();

            $status2 = 'Unvailable';
            $due_date2 = '2018-12-31';
            $patron_id2 = 5;
            $copy_id2 = 4;
            $id = null;
            $checkout2 = new Checkout($status2, $due_date2, $patron_id2, $copy_id2, $id);
            $checkout2->save();

            //Act
            $search_id = $checkout->getId();
            $result = Checkout::findById($search_id);

            //Assert
            $this->assertEquals($checkout, $result);
        }

        function test_getAllOverdueBooks()
        {
            //Arrange
            $status = 'string cheese';
            $due_date = '2012-02-01';
            $patron_id = 3;
            $copy_id = 2;
            $id = null;
            $checkout = new Checkout($status, $due_date, $patron_id, $copy_id, $id);
            $checkout->save();


            //Act
            $result = Checkout::getAllOverdueBooks();
            var_dump($result);

            //Assert
            $this->assertEquals([$checkout], $result);
        }


//End Test
    }
?>
