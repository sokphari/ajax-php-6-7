<?php
    include('config.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $edit = "SELECT * FROM `tb_users` WHERE id='$id'";
        $res=$con->query($edit);
        if($res){
            $user = mysqli_fetch_assoc($res);
            echo json_encode($user);
        }else{
            echo 'failse';
        }
    }
?>