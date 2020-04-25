<?php
use PHPUnit\Framework\TestCase;


class Fifthtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach registration page when password is less than 6 characters
    public function test_true_register_redirect(){
        $_POST['username'] = 'kganrta@uh.edu';
        $_POST['password'] = 'uh12';
        $_POST['confirm_password'] = 'uh12';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        #include_once('sd-project/config.php'); 
        include_once('sd-project/registeruser.php');
        $output = ob_get_flush();
        $headers = xdebug_get_headers();
        $this->assertStringContainsString('location: register.php', $headers[0]);
        $this->assertStringNotContainsString('location: login.php', $headers[0]);
    }
}


class Sixthtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login page after successful registration
    public function test_true_register_redirect(){
        $_POST['username'] = 'vanamala4';
        $_POST['password'] = 'uh12345';
        $_POST['confirm_password'] = 'uh12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/registeruser.php');
        $output = ob_get_flush();
        $headers = xdebug_get_headers();
        $this->assertStringContainsString('location:login.php', $headers[0]);
        $this->assertStringNotContainsString('location:register.php', $headers[0]);
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
        include_once('sd-project/registeruser.php');
        $output = ob_get_flush();
        $headers = xdebug_get_headers();
        $this->assertStringContainsString('location: register.php', $headers[0]);
        $this->assertStringNotContainsString('location: login.php', $headers[0]);
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
        include_once('sd-project/registeruser.php');
        $output = ob_get_flush();
        $headers = xdebug_get_headers();
        $this->assertStringContainsString('location: register.php', $headers[0]);
        $this->assertStringNotContainsString('location: login.php', $headers[0]);
    }
}

?>