<?php
    try{
        $con = new mysqli('127.0.0.1','root','','ajax');
    }catch(Exception $e){
        echo "".$e->getMessage();
    }
?>