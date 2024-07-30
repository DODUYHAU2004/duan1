

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .row1 {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .boxtitle1 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .dn{
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .dnn,
        .dnt {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;s
            transition: border-color 0.3s;
        }

        .dnn:focus,
        .dnt:focus {
            border-color: #333;
            outline: none;
        }

        input[type="checkbox"] {
            margin-bottom: 15px;
        }

        .dnn {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dnn:hover {
            background-color: #555;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }

        ul li a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }

        ul li a:hover {
            color: #555;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="row1">
    <?php
    if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
        
        
extract($_SESSION['user']);
    
        ?>
   <div class="boxtitle1">Cài Đặt Tài Khoản</div>
                       <div class="row mb10">
                            Trạng Thái : Đã Đăng Nhập <br>
                            <?= $user ?>
                       </div>
                       <li class="form_li1"><a href="index.php?act=mybill">Đơn Hàng Của tôi</a></li>
                          <li class="form_li1"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                          <li class="form_li1"><a href="index.php?act=edit_taikhoan">Cập nhật tài khoản</a></li>
                          <?php if($role == 1){?>
                          <li class="form_li1"><a href="admin/index.php">Đăng nhập admin</a></li>
                          <?php } ?>
                          <li class="form_li1"><a href="index.php?act=thoat">Thoát</a></li>
                      
                  <?php
                  }else {
                  ?>
        <div class="boxtitle">ĐĂNG NHẬP</div>
        <form action="index.php?act=dangnhap" method="post" class="dn">
            <input type="text" name="user" placeholder="Tên Đăng Nhập"class="dnt">
            <br>
            <input type="password" name="pass" placeholder="Mật Khẩu" class="dnt">
            <br>
            <input type="checkbox" name="remember"> Ghi Nhớ Tài Khoản?
            <br>
            <input type="submit" value="Đăng Nhập" name="dangnhap" class="dnn">
            <h3 style="color:red;">
                         <?php
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }  
                         ?>
            </h3>
            <li><a href="index.php?act=quenmk">Quên Mật Khẩu</a></li>
            <li><a href="index.php?act=dangky">Đăng Ký Thành Viên</a></li>
        </form>
        <?php
                  }
                  ?>
        <ul>
           
        </ul>
    </div>
