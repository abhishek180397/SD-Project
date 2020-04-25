<?php

use PHPUnit\Framework\TestCase;

class Eleventhtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we Calculate the right value for price and amount
    public function test_get_price(){
        $_SESSION["username"] = 'kganta@uh.edu';
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST["gallons"] = "1500";
        $_POST["date"] = "12/2/2020";
        $_POST["price_btn"] = TRUE;
        ob_start();
        include_once('sd-project/Get_Price.php');
        $output = ob_get_flush();
        $this -> assertEquals($_SESSION['sug_price'], 1.74);
        $this -> assertEquals($_SESSION['tot_amt'], 2610);   
        
    }
}


class Thirteenthtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if quote save is successful
    public function test_get_price(){
        $_SESSION["username"] = 'kganta@uh.edu';
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST["gallons"] = "1500";
        $_POST["date"] = "12/2/2020";
        $_POST["address1"] = "Cullen Oaks";
        $_POST["submit_btn"] = TRUE;
        ob_start();
        include_once('sd-project/Get_Price.php');
        $output = ob_get_flush();
        $this->assertContains('location: login-home.php', xdebug_get_headers());
        $this->assertNotContains('location: fuel-quote.php', xdebug_get_headers());
        
    }
}


?>