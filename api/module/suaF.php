<?php
$connect = mysqli_connect('localhost', 'root', '', 'qlsp');
$id = $_GET['id'];
$sql_maloai = "SELECT * FROM defood";
$query_maloai = mysqli_query($connect, $sql_maloai);
$sql_up ="SELECT * FROM food WHERE id = $_GET[id]";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_array($query_up);

if (isset($_POST['submit'])) {
   
        $food = $_POST['food'];
    if($_FILES['hinhSp']['name'] == ''){
        $hinhSp = $row_up['hinhSp'];
    }else{
        $hinhSp = $_FILES['hinhSp']['name'];
        $hinh_tmp = $_FILES['hinhSp']['tmp_name'];
        move_uploaded_file($hinh_tmp, 'api/img/'.$hinh);
    }
    
    $giaSp1 = $_POST['giaSp1'];
   
    $maLoai = $_POST['maLoai'];

    
   
    $soLuong1= $_POST['soLuong1'];

    $sql = "UPDATE food set  food = '$food',giaSp1 = '$giaSp1', maLoai = '$maLoai', hinhSp = '$hinhSp', soLuong1 = '$soLuong1'  WHERE id = $_GET[id]";
    $query = mysqli_query($connect, $sql);
    
    header('Location:/PHP/api/module/danhsachF.php');
    exit();
}
?>

<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-header text-center bg-primary text-white">
            <h2>Sửa Sản Phẩm</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
               
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="food" class="form-control" value="<?php echo $row_up['food']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="">Giá Sản phẩm</label>
                    <input type="number" name="giaSp1" class="form-control" value="<?php echo $row_up['giaSp1']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    <select class="form-control" required name="maLoai">
                        <?php
                        while ($row = mysqli_fetch_array($query_maloai)) { ?>
                            <option value="<?php echo $row['maLoai']; ?>">
                                <?php echo $row['tenLoai']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh sản phẩm</label>
                    <input type="file" name="hinhSp" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" name="soLuong1" value="<?php echo $row_up['soLuong1']; ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>
