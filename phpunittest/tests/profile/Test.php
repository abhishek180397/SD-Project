<?php

use PHPUnit\Framework\TestCase;

class Ninththtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login-home when profile successfully saved
    public function test_complete_profile_true_redirect(){
        $_SESSION['username'] = 'kganta@uh.edu';
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST["fname"] = "Keerthana ";
        $_POST["address1"] = "Holly hall st";
        $_POST["address2"] = "";
        $_POST["city"] = "Houston";
        $_POST["state"] = "TX";
        $_POST["zip"] = "122345";
        ob_start();
        include_once('sd-project/profile.php');
        $output = ob_get_flush();
        $this->assertContains('location: login-home.php', xdebug_get_headers());
    }
}

class Tenthtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we redirect to profile when a mandatory field is missing
    public function test_incomplete_profile_true_redirect(){
        $_SESSION['username'] = 'kganta@uh.edu';
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST["fname"] = "Keerthana ";
        $_POST["address1"] = "";
        $_POST["address2"] = "";
        $_POST["city"] = "Houston";
        $_POST["state"] = "TX";
        $_POST["zip"] = "122345";
        ob_start();
        include_once('sd-project/profile.php');
        $output = ob_get_flush();
        $this->assertContains('location: profile.html', xdebug_get_headers());
    }
}

?>