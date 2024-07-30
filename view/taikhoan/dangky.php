


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
        
        <form action="#" method="post" class="dn">
            <div class="boxtitle">ĐĂNG KÝ </div>
            <input type="text" name="user" placeholder="Tên Đăng Nhập" class="dnt">
            <br>
            <input type="email" name="email" placeholder="Email" class="dnt">
            <br>
            <input type="password" name="pass" placeholder="Mật Khẩu" class="dnt">
            <br>
            <input type="checkbox" name="remember"> Ghi Nhớ Tài Khoản?
            <br>
            <input type="submit" value="Đăng ký" name="dangky" class="dnn">
            <br>
            
            <h3 style="color:red;">
                         <?php
                        if(isset($thongbao)&&($thongbao!="")){
                            echo $thongbao;
                        }  
                         ?>
            </h3>
            
        </form>
       
    </div>
