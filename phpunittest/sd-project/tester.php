<?php 
function test(){
    global $link;
    if($link){
        echo "Link Accessible";
    }else{
        echo "Link Not Accessible";
    }
}


test();


?>