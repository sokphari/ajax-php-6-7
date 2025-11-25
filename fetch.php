<?php
include('./config.php');
$select = "SELECT * FROM `tb_users` ORDER BY id desc";
$res = $con->query($select);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo '
                 <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['gender'].'td>
                    <td><img src="./upload/'.$row['profile'].'" style="border-radius: 50px; width: 100px; height: 100px;" alt=""></td>
                    <td>PP</td>
                    <td>
                        <button class="btn btn-warning" type="button">EDIT</button>
                        <button class="btn btn-primary" type="button">DELETE</button>
                    </td>
                </tr>
            ';
    }
}
