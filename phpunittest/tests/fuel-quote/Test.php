<?php

use PHPUnit\Framework\TestCase;

class Eleventhtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login-home.php if fuel-quote successfully saved
    public function test_complete_profile_true_redirect(){
        $_SESSION['username'] = 'kganta@uh.edu';
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST["gallons"] = "12";
        $_POST["date"] = "12/2/2020";
        ob_start();
        include_once('sd-project/fuel_quote.php');
        $output = ob_get_flush();
        $this->assertContains('location: login-home.php', xdebug_get_headers());
    }
}


?>