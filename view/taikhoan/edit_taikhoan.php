
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

        .row {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .boxtitle {
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

        .dnn{
            width: 190%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;s
            transition: border-color 0.3s;
        }
        .dnt {
            width: 190%;
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
            width: 190%;
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
    <div class="row">
     <?php 
                        if(isset($_SESSION['user'])&&(is_array($_SESSION['user']))){
                            extract($_SESSION['user']);
                        }
                    ?>
        
        <form action="index.php?act=edit_taikhoan" method="post" class="dn">
            <input type="text" name="user" placeholder="Tên "value="<?=$user?>"class="dnt">
            <br>
            <input type="password" name="pass" placeholder="Mật Khẩu"value="<?=$pass?>"class="dnt">
            <br>
            <input type="text" name="email" placeholder="Email"value="<?=$email?>"class="dnt">
            <br>
            <input type="text" name="tel" placeholder="Tel"value="<?=$tel?>"class="dnt">
            <br>
            <input type="text" name="address" placeholder="Địa Chỉ"value="<?=$address?>"class="dnt">
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="Cập Nhật " name="capnhat"class="dnn">
            <input type="reset" value="Nhập Lại "class="dnn">
            <h3 style="color:red;">
                         <?php
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }  
                         ?>
                   </h3>
        </form>
       
    </div>
