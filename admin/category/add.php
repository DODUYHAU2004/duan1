<div class="boxcenter">
    <div>
        <h1>Thêm danh mục sản phẩm</h1>
    </div>
    <div>
        <form action="index.php?act=addcate" method="POST" enctype="multipart/form-data">

            <div>
                <label for="">Tên danh mục</label>
                <input type="text" name="namecate" placeholder="Nhập tên danh mục vào đây">
            </div>

            <div>
                <input type="submit" name="addcate" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listcate"><input type="button" value="Danh sách sản phẩm"></a>
            </div>

        </form>
    </div>
</div>