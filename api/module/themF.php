<?php
$connect = mysqli_connect('localhost', 'root', '', 'qlsp');
$sql_maloai = "SELECT * FROM defood";
$query_maloai = mysqli_query($connect, $sql_maloai);

if (isset($_POST['submit'])) {
 
    $food = $_POST['food'];
    $soLuong1 = $_POST['soLuong1'];
    $giaSp1 = $_POST['giaSp1'];
    $hinhSp = $_FILES['hinhSp']['name'];
    $hinh_tmp = $_FILES['hinhSp']['tmp_name'];
    $maLoai = $_POST['maLoai']; 

    $sql = "INSERT INTO food( food, giaSp1, soLuong1, maLoai, hinhSp) VALUES( '$food', '$giaSp1', '$soLuong1', '$maLoai', '$hinhSp')";
    $query = mysqli_query($connect, $sql);
    move_uploaded_file($hinh_tmp, '/PHP/api/img/' . $hinh);
    header('Location:/PHP/api/module/danhsachF.php');
}
?>
<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-header text-center bg-primary text-white">
            <h2>Thêm Sản Phẩm Món ăn</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
              
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="food" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Giá Sản phẩm</label>
                    <input type="number" name="giaSp1" class="form-control" required>
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
                    <input type="file" name="hinhSp" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" name="soLuong1" class="form-control" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
