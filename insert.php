<?php
    include('config.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        try{
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $profile = $_FILES['profile']['name'];
            $tmp = $_FILES['profile']['tmp_name'];
            $path = './upload/'.$profile;
            move_uploaded_file($tmp,$path);
            $insert = "INSERT INTO `tb_users` (`name`,`gender`,`address`,`profile`)
            values ('$name','$gender','$address','$profile')";
            $res = $con->query($insert);
            if($res){
                echo "success";
            }else{
                echo "failse";
            }
        }catch(Exception $e){
            echo "".$e->getMessage();
        }
    }
?>