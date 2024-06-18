<?php
  require_once "api/config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin php</title>
</head>
<body>
    <?php
        if(isset($_GET['page'])){
        switch($_GET['page']){
           case "danhsach":
              require_once "api/module/danhsach.php";
              break;
           case "them":
              require_once "api/module/them.php";
              break;
           case "sua":
              require_once "api/module/sua.php";
              break;
           case "xoa":
              require_once "api/module/xoa.php";
              break;
           case "danhsachF":
              require_once "api/module/danhsachF.php";
              break;
           case "themF":
              require_once "api/module/themF.php";
              break;
           case "suaF":
              require_once "api/module/suaF.php";
              break;
           case "xoaF":
              require_once "api/module/xoaF.php";
              break;
           default: 
           require_once "api/module/danhsach.php";
           require_once "api/module/danhsachF.php"; 
            break;

        }
        
        }
        else{
          require_once "api/module/danhsach.php";
          require_once "api/module/danhsachF.php";
      }
   
      
    ?>
  
</body>
</html>