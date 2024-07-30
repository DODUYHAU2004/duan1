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
    <div>
        <h1>Danh sách sản phẩm</h1>
    </div>
    <div>
        <form action="index.php?act=listpro" method="POST">
            <input type="text" name="keyw">
            <select name="idcategory">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listcategory as $cate) {
                    extract($cate);
                    echo '<option value="' . $id . '">' . $name . '</option>';
                }
                ?>

            </select>
            <input type="submit" name="clickok" value="Tìm" style="background-color: blue; color: white">
        </form>
        <table>
            <tr>
                <th></th>
                <th>ID sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>

            <?php
            foreach ($listproduct as $pro) {
                extract($pro);
                $editpro = "index.php?act=editpro&idpro=" . $id;
                $deletepro = "index.php?act=deletepro&idpro=" . $id;
                $hinhpath = "../upload/" . $img;
                if (is_file($hinhpath)) {
                    $hinhpath = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
                } else {
                    $hinhpath = "Không có ảnh";
                }
                echo
                    '<tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>' . $id . '</td>
                    <td>' . $name . '</td>
                    <td>' . $hinhpath . '</td>
                    <td>' . $price . '</td>
                    <td>' . $describe . '</td>
                    <td><a href="' . $editpro . '"><input type="button" style="background-color: blue;color: white" value="Sửa"></a></td>
                    <td><a href="' . $deletepro . '"><input type="button" onclick="return confirm(\'Bạn có muốn xóa không\')" style="background-color: red;color: white" value="Xóa"></a></td>
                </tr>';
            }
            ?>

        </table>
        <div>
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa sản phẩm đã chọn">
            <a href="index.php?act=addpro"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>