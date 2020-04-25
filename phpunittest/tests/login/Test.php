<?php

use PHPUnit\Framework\TestCase;

class Firsttest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login-home when username and password are right and Profile is not complete
    public function test_true_Login_true_redirect(){
        $_POST['username'] = 'sindhu';
        $_POST['password'] = '121212';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        require_once('sd-project/config.php');
        include_once('sd-project/loginuser.php');
        $output = ob_get_flush();
        $this->assertContains('location: login-home.php', xdebug_get_headers());
        $this->assertNotContains('location: profile.html', xdebug_get_headers());
        $this->assertNotContains('location: login.php', xdebug_get_headers());
    }
}

class Secondtest extends TestCase{
        /**
     * @runInSeparateProcess
     */

    //Test if we are reaching login page and nowhere else when username is wrong
    public function test_wrong_uname_Login_false_redirect(){
        header_remove();
        $_POST['username'] = 'kgaanta@uh.edu';
        $_POST['password'] = 'uh12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/config.php');
        include_once('sd-project/loginuser.php');
        $headers = xdebug_get_headers();
        echo $headers[0];
        $output = ob_get_flush();
        $this->assertStringContainsString('location: login.php', $headers[0]);
        $this->assertNotContains('location: profile.php', xdebug_get_headers());
        $this->assertNotContains('location: profile.html', xdebug_get_headers());
        $this->assertNotContains('location: login-home.html', xdebug_get_headers());
    }
}

class ThirdTest extends TestCase{
    /**
     * @runInSeparateProcess
     */

     //Test if we are not reaching login page and nowhere else when username is right and password is wrong
    public function test_wrong_pass_Login_false_redirect(){
        $_POST['username'] = 'kganta@uh.edu';
        $_POST['password'] = 'dsddsd12345';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/config.php');
        include_once('sd-project/loginuser.php');
        $output = ob_get_flush();
        $headers = xdebug_get_headers();
        $this->assertStringContainsString('location: login.php', $headers[0]);
        $this->assertNotContains('location: profile.php', xdebug_get_headers());
        $this->assertNotContains('location: profile.html', xdebug_get_headers());
        $this->assertNotContains('location: login-home.html', xdebug_get_headers());
        header_remove();
    }
}
class FourthTest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    // //Test if we reach the right page(login.html) when username and password are right and profile is inclomplete
    public function test_false_uname_Login_true_redirect(){
        $_POST['username'] = 'rsingh';
        $_POST['password'] = '121212';
        $_SERVER["REQUEST_METHOD"] = "POST";
        ob_start();
        include_once('sd-project/config.php');
        include_once('sd-project/loginuser.php');
        $output = ob_get_flush();

        $this->assertContains('location: profile.html', xdebug_get_headers());
        $this->assertNotContains('location: profile.php', xdebug_get_headers());
        $this->assertNotContains('location: login-home.php', xdebug_get_headers());
        $this->assertNotContains('location: login.php', xdebug_get_headers());
    }
}



#Test if redirected to right page after first-time login(i.e Profile not completed)



?>