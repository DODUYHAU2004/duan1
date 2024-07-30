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
<div>
    <!-- Thống kê doanh thu -->
    <div>
        <h1>Thống kê doanh thu</h1>
    </div>
    <div>
        <!-- <form action="" method="POST">
            <input type="text" name="keyw">
            <input type="submit" value="GO" style="background-color: blue; color: white">
        </form> -->

        <table>
            <tr>
                <th>Năm</th>
                <th>Tháng</th>
                <th>Tuần</th>
                <th>Tổng doanh thu</th>
            </tr>

            <tr>
                <?php
                foreach ($list_thongke_doanhthu as $doanhthu) {
                    extract($doanhthu);

                    echo '
                        <tr>
                            <td>' . $nam . '</td>
                            <td>' . $thang . '</td>
                            <td>' . $tuan . '</td>
                            <td>' . $total_money . '</td>

                        </tr>';
                }
                ?>
            </tr>
        </table>
    </div><br><br>
    <hr><br><br>

    <!-- Thống kê sản phẩm bán chạy -->
    <div>
        <h1>Thống kê sản phẩm bán ra</h1>
    </div>
    <div>
        <!-- <form action="" method="POST">
            <input type="text" name="keyw">
            <input type="submit" value="GO" style="background-color: blue; color: white">
        </form> -->

        <table>
            <tr>
                <th>Năm</th>
                <th>Tháng</th>
                <th>Tuần</th>
                <th>Sản phẩm bán ra</th>
            </tr>

            <tr>
                <?php
                foreach ($list_thongke_sanpham_ban as $sanpham_ban) {
                    extract($sanpham_ban);

                    echo '
                        <tr>

                            <td>' . $nam . '</td>
                            <td>' . $thang . '</td>
                            <td>' . $tuan . '</td>
                            <td>' . $quantity . '</td>
                        </tr>';
                }
                ?>
            </tr>
        </table>
    </div><br><br>
    <hr><br><br>

    <!-- Thống kê sản phẩm -->
    <div>
        <h1>Thống kê sản phẩm</h1>
    </div>
    <div>
        <!-- <form action="" method="POST">
            <input type="text" name="keyw">
            <input type="submit" value="GO" style="background-color: blue; color: white">
        </form> -->

        <table>
            <tr>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Tổng sản phẩm</th>
                <th>Giá nhỏ nhất</th>
                <th>Giá cao nhất</th>
                <th>Giá trung bình</th>
            </tr>

            <tr>
                <?php
                foreach ($liststatistical as $statistical) {
                    extract($statistical);

                    echo '
                        <tr>
                            <td>' . $idcategory . '</td>
                            <td>' . $namecategory . '</td>
                            <td>' . $countproduct . '</td>
                            <td>' . $minprice . '</td>
                            <td>' . $maxprice . '</td>
                            <td>' . $avgprice . '</td>
                        </tr>';
                }
                ?>
            </tr>
        </table>
        <div>
            <a href="index.php?act=map"><input type="button" value="Xem biểu đồ"></a>
        </div>
    </div><br><br>
    <hr><br><br>
</div>