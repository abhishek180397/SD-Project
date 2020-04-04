<?php

use PHPUnit\Framework\TestCase;

class Twelvethtest extends TestCase{
    /**
     * @runInSeparateProcess
     */

    //Test if we reach login-home when username and password are right
    public function test_complete_profile_true_redirect(){
        ob_start();
        session_start();
        include_once('sd-project/logout.php');
        $output = ob_get_flush();
        $this->assertContains('location: index2.html', xdebug_get_headers());
    }
}


?>