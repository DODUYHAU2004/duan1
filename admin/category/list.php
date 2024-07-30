<style>
    table tr th{
        border-bottom: 3px solid brown;
        padding: 7px 20px;
    }
    table tr td{
        border-bottom: 1px solid brown;
        padding: 7px 20px;
    }
</style>

<div>
    <div>
        <h1>Danh sách danh mục</h1>
    </div>
    <div>
        <form action="index.php?act=listcate" method="POST">
            <input type="text" name="keyw">
            <input type="submit" name="clickok" value="GO" style="background-color: blue; color: white">
        </form>
        <table>
            <tr>
                <th></th>
                <th>Id danh mục</th>
                <th>Tên danh mục</th>
                <th>Thao tác</th>
            </tr>
            <tr>
                <?php
                    foreach($listcategory as $category){
                        extract($category);
                        
                        $editcate="index.php?act=editcate&idcate=".$id;
                        $deletecate="index.php?act=deletecate&idcate=".$id;
                        echo '
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>
                                <a href="'.$editcate.'"><input type="button" style="background-color: blue;color: white" value="Sửa"></a>
                                <a href="'.$deletecate.'"><input type="button" onclick="return confirm(\'Bạn có muốn xóa không\')" style="background-color: red;color: white"value="Xóa"></a>
                            </td>
                        </tr>';
                    }
                ?>
            </tr>
        </table>
        <div>
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa tất cả danh mục đã chọn">
            <a href="index.php?act=addcate"><input type="submit" value="Thêm danh mục"></a>
        </div>
    </div>
</div>