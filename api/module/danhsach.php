<?php
    $connect = mysqli_connect('localhost', 'root', '', 'qlsp');
    $sql = "SELECT * FROM `sanpham` INNER JOIN loaisp ON sanpham.maloai = loaisp.maloai";
    $query = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin php</title>
</head>
<body>

<div class="container-fluid">
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0 text-center">Danh sách sản phẩm Nước</h2>
        </div>

        <div class="card-body">
              
        <div class="form-group row">
                <label for="tenSpInput" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-4">
                    <input type="text" id="tenSpInput" class="form-control filter-input" placeholder="Tìm kiếm theo tên sản phẩm...">
                </div>
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr class="text-center gap-4" >
                        <th scope="col">#</th>
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Tên sản phẩm</th>
                        <!-- <th scope="col">Hình ảnh</th> -->
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col"> loại</th>

                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">hành động</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) { ?>
                            <tr class="text-center">
                                <td><?php echo $i++; ?></td>
                                <!-- <td><?php echo $row['id']; ?></td> -->
                                <td><?php echo $row['maSp']; ?></td>
                                <td><?php echo $row['tenSp']; ?></td>
                                <td><?php echo $row['giaSp']; ?></td>
                                <td><?php echo $row['soLuong']; ?></td>
                                <td><?php echo "(".$row['tenLoai'] .")". 'với mã loại là:(' . $row['maLoai'].")"; ?></td>
                                <td>
                                    <img class="img-thumbnail img-custom" src="/PHP/api/img/<?php echo $row['hinh']; ?>"/>
                                </td>
                                
                                <td>
                                    <a href="/PHP/index.php?page=them" class="btn btn-success btn-sm">Thêm</a>
                                    <a href="/PHP/index.php/?page=sua&id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                    <a onclick="return Del('<?php echo $row['tenSp'];?>')" href="/PHP/index.php/?page=xoa&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Xóa</a>
                                </td>
                                
                            </tr>
                    <?php } ?>  
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script>
    // JavaScript function to filter table rows based on input
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("tenSpInput");
        filter = input.value.toUpperCase();
        table = document.querySelector("table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // index 2 is the column for Tên sản phẩm
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Attach the filter function to the input field's keyup event
    document.getElementById("tenSpInput").addEventListener("keyup", filterTable);
</script>



<script>
     function Del(name){
        return confirm("Bạn có muốn xóa sản phẩm "+name+" không?");
     }
</script>
<style>
    .img-custom {
        max-width: 75px; /* Set the max width for the image */
        max-height: 75px; /* Set the max height for the image */
        object-fit: cover; /* Ensure the image covers the element's content box */
        margin: auto; /* Center the image horizontally */
    }
</style>
