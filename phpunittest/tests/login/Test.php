<?php

use PHPUnit\Framework\TestCase;


class Firsttest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login-home when username and password are right
    public function test_true_Login_true_redirect(){
        $_POST['username'] = 'kganta@uh.edu';
        $_POST['password'] = 'uh12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/login.php');
        $output = ob_get_flush();
        $this->assertContains('location: login-home.php', xdebug_get_headers());
    }
}

class Secondtest extends TestCase{
        /**
     * @runInSeparateProcess
     */

    //Test if we are not reaching login-home when username is wrong
    public function test_wrong_uname_Login_false_redirect(){
        header_remove();
        $_POST['username'] = 'kgaanta@uh.edu';
        $_POST['password'] = 'uh12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/login.php');
        $output = ob_get_flush();
        $this->assertNotContains('location: login-home.php', xdebug_get_headers());
    }
}

class ThirdTest extends TestCase{
    /**
     * @runInSeparateProcess
     */

     //Test if we are not reaching login-home when username is right and password is wrong
    public function test_wrong_pass_Login_false_redirect(){
        $_POST['username'] = 'kganta@uh.edu';
        $_POST['password'] = 'dsddsd12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/login.php');
        $output = ob_get_flush();
        $this->assertNotContains('location: login-home.php', xdebug_get_headers());
        header_remove();
    }
}
class FourthTest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    // //Test if we reach the right page(login.html) when username is incorrect
    public function test_false_uname_Login_true_redirect(){
        $_POST['username'] = 'kgaanta@uh.edu';
        $_POST['password'] = 'uh12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/login.php');
        $output = ob_get_flush();
        $this->assertContains('location: login.html', xdebug_get_headers());
    }
}

class FifthTestCase extends TestCase{
    /**
     * @runInSeparateProcess
     */
    // //Test if we reach the right page(login.html) when username is correct and password is incorrect
    public function test_false_pwd_Login_true_redirect(){
        $_POST['username'] = 'kgaanta@uh.edu';
        $_POST['password'] = 'uh12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/login.php');
        $output = ob_get_flush();
        $this->assertContains('location: login.html', xdebug_get_headers());
    }
    
}

?>