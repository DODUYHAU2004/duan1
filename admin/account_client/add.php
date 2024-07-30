<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="boxcenter">
        <div>
            <h1>Thêm mới tài khoản</h1>
        </div>
        <div>
            <form action="" method="POST" enctype="multipart/form-data">

                <div>
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Nhập vào email">
                </div>

                <div>
                    <label for="">User</label>
                    <input type="text" name="user" placeholder="Nhập vào tên tài khoản">
                </div>

                <div>
                    <label for="">Pass</label>
                    <input type="text" name="pass" placeholder="Nhập vào mật khẩu">
                </div>

                <div>
                    <label for="">Tell</label>
                    <input type="text" name="tel" placeholder="Nhập vào số điện thoại">
                </div>

                <div>
                    <label for="">Address</label>
                    <input type="text" name="address" placeholder="Nhập vào địa chỉ">
                </div>

                <div>
                    <label for="">Role</label>
                    <input type="text" name="role" placeholder="Nhập vào vai trò">
                </div>

                <div>
                    <input class="" type="submit" name="addaccount" id="" value="Thêm mới">
                    <input class="" type="reset" name="" id="" value="Nhập lại">
                    <a href="index.php?act=account_client"><input type="button" name="" id="" value="Danh sách tài khoản"></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>