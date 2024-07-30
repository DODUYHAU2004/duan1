<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table tr th {
        border-bottom: 3px solid brown;
        padding: 7px 20px;
    }

    table tr td {
        border-bottom: 1px solid brown;
        padding: 7px 20px;
    }
</style>

<body>
    <div>
        <div>
            <h1>Danh sách tài khoản</h1>
        </div>
        <div>
            <form action="index.php?act=account_client" method="POST">
                <input type="text" name="keyw">
                <input type="submit" name="clickok" value="GO" style="background-color: blue; color: white">
            </form>
        </div>
        <table>
            <tr>
                <th></th>
                <th>ID tài khoản</th>
                <th>Email</th>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Role</th>
                <th>Thao tác</th>
            </tr>
            <tr>
                <?php
                foreach ($listaccount as $acount) {
                    extract($acount);
                    $deleteaccount = "index.php?act=deleteaccount&idaccount=" . $id;
                    echo '   <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $id . '</td>
                            <td>' . $email . '</td>
                            <td>' . $user . '</td>
                            <td>' . $pass . '</td>
                            <td>' . $tel . '</td>
                            <td>' . $address . '</td>
                            <td>' . $role . '</td>
                            <td><a href="' . $deleteaccount . '"><input type="button" onclick="return confirm(\'Bạn có muốn xóa không\')" style="background-color: red;color: white"value="Xoá"></a></td>
                        </tr>';
                }
                ?>
            </tr>
        </table>
        <div>
            <input class="" type="button" name="" id="" value="Chọn tất cả">
            <input class="" type="button" name="" id="" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa tài khoản đã chọn">
            <a href="index.php?act=addaccount"><input type="button" name="" id="" value="Nhập thêm"></a>
        </div>
    </div>
</body>

</html>