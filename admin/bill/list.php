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
            <div>
                <div>
                    <h1>Danh sách đơn hàng</h1>
                </div>
                <form action="index.php?act=bill" method="POST">
                    <input type="text" name="keyw" placeholder="Tìm kiếm mã đơn hàng">
                    <input type="submit" name="listok" value="GO" style="background-color: blue; color: white">

                </form>

                <table>
                    <tr>

                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Thanh toán</th>
                        <th>Thao tác</th>
                    </tr>
                    <tr>
                        <?php
                        foreach ($listbill as $bill) {
                            extract($bill);
                            $client = '
                            <br>Iduser: ' . $iduser . '
                            <br>Email: ' . $email . '
                            <br>Tên: ' . $name . '
                            <br>Địa chỉ:' . $address . '
                            <br>Số điện thoại: ' . $tel;
                            $status = get_status($status);
                            $pay = get_pay($pay);
                            $deletebill = "index.php?act=deletebill&idbill=" . $id;
                            $listdetail = "index.php?act=listdetail&idbill=" . $id;

                            echo '
                            <tr>

                            <td>Ma-' . $id . '</td>
                            <td>' . $client . '</td>
                            <td><strong>' . $total_money . '</strong></td>
                            <td>' . $status . '</td>
                            <td>' . $pay . '</td>
                            <td>
                                <a href="' . $deletebill . '" ><input type="button" onclick="return confirm(\'Bạn có muốn xóa không\')" style="background-color: red;color: white" value="Xóa"></a>
                                <br><br>
                                <a href="' . $listdetail . '"><input type="button" style="background-color: blue;color: white" value="Chi tiết đơn hàng"></a>
                            </td>
                            </tr>
                            ';
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
</body>

</html>