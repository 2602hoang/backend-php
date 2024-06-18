<?php   
$connect = mysqli_connect('localhost', 'root', '', 'qlsp');
 $id = $_GET['id'];
 $sql = "DELETE FROM sanpham WHERE id = $id";
 $query = mysqli_query($connect, $sql);
 header('Location: /PHP/api/module/danhsach.php');
 exit();
?>