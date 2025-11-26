<?php
    include('config.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = "DELETE FROM `tb_users`WHERE id = '$id'";
        $res=$con->query($delete);
        if($res){
            echo "success";
        }else{
            echo "delete not found";
        }
    }
?>