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
                    <h1>Chi tiết đơn hàng</h1>
                </div><br>
                <input type="text" name="keyw" placeholder="Tìm kiếm mã đơn hàng">
                <input type="submit" name="listok" value="GO" style="background-color: blue; color: white"><br><br>
                <div>
                    <a href="index.php?act=bill"><input type="button" value="Danh sách đơn hàng"></a>
                </div><br>

                <table>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Khách hàng</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng hàng</th>
                        <th>Thanh toán</th>
                        <th>Ngày đặt hàng</th>
                        <th>Giá trị một sản phẩm</th>
                        <th>Gia trị các sản phẩm</th>
                        <th>Mã bill</th>
                    </tr>
                    <?php
                    foreach ($list_detail as $bill) {
                        extract($bill);
                        $client = '
                            <br>Iduser:' . $iduser . '
                            <br>Email:' . $email . '
                            <br>Tên: ' . $name . '
                            <br>Địa chỉ:' . $address . '
                            <br>Số điện thoại: ' . $tel;
                        $imgpath = "../upload/" . $img;
                        if (is_file($imgpath)) {
                            $imgpath = "<img src='" . $imgpath . "' width='100px' height='100px'>";
                        } else {
                            $imgpath = "Không có ảnh";
                        }
                        // $status = get_status($status);
                        $pay = get_pay($pay);
                        $tongdh=$quantity*$total_money;

                        echo '<tr>
                            <td>STT - ' . $id . '</td>            
                            <td>' . $client . '</td>                       
                            <td>' . $imgpath . '</td>
                            <td>' . $quantity . '</td>                         
                            <td>' . $pay . '</td>
                            <td>' . $date . '</td>                                                   
                            <td><strong style="font-size: 20px; color:red">' . $total_money . '</strong></td>
                            <td><strong style="font-size: 25px; color:red">'.$tongdh.'</strong></td>                      
                            <td>Ma-' . $idbill . '</td>
                            </tr>';
                    }
                    ?>

                </table>
                <form action="index.php?act=update_status" method="POST" style="text-align: center">
                    <div>
                        <label>ID USER:
                            <?= $onebill['iduser'] ?>
                        </label>

                    </div>
                    <div>
                        <label>Email:
                            <?= $onebill['email'] ?>
                        </label>

                    </div>
                    <div>
                        <label>Tên khách hàng:
                            <?= $onebill['name'] ?>
                        </label>

                    </div>
                    <div>
                        <label>Địa chỉ:
                            <?= $onebill['address'] ?>
                        </label>

                    </div>

                    <div>
                        <label>Điện thoại:
                            <?= $onebill['tel'] ?>
                        </label>

                    </div>
                    <div>
                        <label>Tổng giá trị các sản phẩm: <strong style="font-size: 30px; color:red">
                                <?= $onebill['total_money'] ?>
                            </strong></label>

                    </div>
                    <div>
                        <input type="hidden" name="id" value=<?= $onebill['id'] ?>>
                        <select name="status" id="">
                            <?php foreach ($status_bill as $key => $value): ?>
                                <option value="<?= $key ?>" <?= $key == $onebill['status'] ? 'selected' : '' ?>>

                                    <?= $value ?>
                                </option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <button type="submit" name="capnhat">Cập nhật</button><br><br><br><br><br><br>
                </form>
            </div>
        </div>
</body>

</html>