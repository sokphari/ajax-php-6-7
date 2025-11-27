<?php
include("config.php");
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $profile = $_FILES['profile']['name'];
    $tmp = $_FILES['profile']['tmp_name'];
    $path = './upload/' . $profile;
    move_uploaded_file($tmp, $path);
    $update = "UPDATE tb_users SET name='$name',gender='$gender',address='$address',profile='$profile'WHERE id='$id'";
    $res = $con->query($update);
    if($res){
        echo "success";
    }
}
?>
