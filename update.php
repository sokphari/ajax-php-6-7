<?php
    if(isset($_POST['id'] ) && $_POST['name'] && $_POST['gender'] && $_POST['address']){
        $profile = $_FILES['profile']['name'];
        $tmp = $_FILES['profile']['tmp_name'];
        $path ='./upload/'.$profile;
        move_uploaded_file($tmp,$path);
        $update = "UPDATE `tb_users` SET name='$name',gender='$gender',address='$address',profile='$profile' WHERE id='$id'";
        $res=$con->query($update);
        if($res){
            echo 'success';
        }else{
            echo 'fails';
        }
    }
?>