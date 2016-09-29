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
            // Checkout::deleteAll();
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
            $due_date = "2017-01-31";
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




//End Test
    }
?>
