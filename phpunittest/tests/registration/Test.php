<?php
use PHPUnit\Framework\TestCase;


class Sixthtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login page after successful registration
    public function test_true_register_redirect(){
        $_POST['username'] = 'kganrta@uh.edu';
        $_POST['password'] = 'uh12345';
        $_POST['confirm_password'] = 'uh12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/register.php');
        $output = ob_get_flush();
        $this->assertContains('location: login.html', xdebug_get_headers());
    }
}

class Seventhtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we are redirected back to register page when username is taken
    public function test_unametaken_Login_true_redirect(){
        $_POST['username'] = 'kganta@uh.edu';
        $_POST['password'] = 'uh1445';
        $_POST['confirm_password'] = 'uh1445';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/register.php');
        $output = ob_get_flush();
        $this->assertContains('location: register.html', xdebug_get_headers());
    }
}

class Eighthtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login-home when passwords dont match
    public function test_true_Login_true_redirect(){
        $_POST['username'] = 'kganrta@uh.edu';
        $_POST['password'] = 'uh12345';
        $_POST['confirm_password'] = 'uh199345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/register.php');
        $output = ob_get_flush();
        $this->assertContains('location: register.html', xdebug_get_headers());
    }
}

?>