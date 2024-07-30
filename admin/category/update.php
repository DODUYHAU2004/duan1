<?php
    if(is_array($category)){
        extract($category);
    }
?>
<div>
    <div>
        <h1>Cập nhật danh mục</h1>
    </div>
    <div>
        <form action="index.php?act=updatecate" method="POST">

            <div>
                <label for="">Tên danh mục</label>
                <input type="text" name="namecate" value="<?=$name?>">
            </div>
            <div>
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="submit" name="updatecate" value="Cập nhật">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listcate"><input type="button" value="Danh sách danh mục"></a>
            </div>
        </form>
    </div>
</div>