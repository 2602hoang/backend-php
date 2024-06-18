<?php
$connect = mysqli_connect('localhost', 'root', '', 'qlsp');
$sql_maloai = "SELECT * FROM loaisp";
$query_maloai = mysqli_query($connect, $sql_maloai);

if (isset($_POST['submit'])) {
    $maSp = $_POST['maSp'];
    $tenSp = $_POST['tenSp'];
    $giaSp = $_POST['giaSp'];
   
    $maloai = $_POST['maloai'];

    $hinh = $_FILES['hinh']['name'];
    $hinh_tmp = $_FILES['hinh']['tmp_name'];
    $soLuong = $_POST['soLuong'];

    $sql = "INSERT INTO sanpham(maSP, tenSp, giaSp, maloai, hinh,soLuong) VALUES('$maSp', '$tenSp', '$giaSp', '$maloai', '$hinh', '$soLuong')";
    $query = mysqli_query($connect, $sql);
    move_uploaded_file($hinh_tmp, 'api/img/' . $hinh);
    header('Location:/PHP/api/module/danhsach.php');
}
?>

<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-header text-center bg-primary text-white">
            <h2>Thêm Sản Phẩm Nước</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Mã Sản phẩm</label>
                    <input type="text" name="maSp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="tenSp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Giá Sản phẩm</label>
                    <input type="number" name="giaSp" class="form-control" required>
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
                    <input type="file" name="hinh" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" name="soLuong" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
