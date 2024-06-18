<?php
$connect = mysqli_connect('localhost', 'root', '', 'qlsp');
$id = $_GET['id'];
$sql_maloai = "SELECT * FROM loaisp";
$query_maloai = mysqli_query($connect, $sql_maloai);
$sql_up ="SELECT * FROM sanpham WHERE id = $_GET[id]";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_array($query_up);

if (isset($_POST['submit'])) {
    $maSp = $_POST['maSp'];
    $tenSp = $_POST['tenSp'];
    if($_FILES['hinh']['name'] == ''){
        $hinh = $row_up['hinh'];
    }else{
        $hinh = $_FILES['hinh']['name'];
        $hinh_tmp = $_FILES['hinh']['tmp_name'];
        move_uploaded_file($hinh_tmp, 'api/img/'.$hinh);
    }
    
    $giaSp = $_POST['giaSp'];
   
    $maloai = $_POST['maloai'];

    
   
    $soLuong = $_POST['soLuong'];

    $sql = "UPDATE sanpham set maSp = '$maSp', tenSp = '$tenSp',giaSp = '$giaSp', maloai = '$maloai', hinh = '$hinh', soLuong = '$soLuong' WHERE id = $_GET[id]";
    $query = mysqli_query($connect, $sql);
    
    header('Location: /PHP/api/module/danhsach.php');
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
                    <label for="">Mã Sản phẩm</label>
                    <input value="<?php echo $row_up['maSp']; ?>" type="text" name="maSp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="tenSp" class="form-control" value="<?php echo $row_up['tenSp']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Giá Sản phẩm</label>
                    <input type="number" name="giaSp" class="form-control" value="<?php echo $row_up['giaSp']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    <select class="form-control" required name="maloai">
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
                    <input type="file" name="hinh" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" name="soLuong" value="<?php echo $row_up['soLuong']; ?>" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</div>
