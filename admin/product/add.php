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
            <h1>Thêm sản phẩm</h1>
        </div>
        <div>
            <form action="index.php?act=addpro" method="POST" enctype="multipart/form-data">
                <div>
                <div>
                    <label for="">Loại sản phẩm</label><br>
                </div>
                <select name="idcategory" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach($listcategory as $cate){
                            extract($cate);
                            echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                    ?>
                </select>
                </div><br>

                <div>
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="namepro" placeholder="Nhập tên sản phẩm">
                </div><br>
                <div>
                    <label for="">Hình ảnh</label>
                    <input type="file" name="imgpro">
                </div><br>
                <div>
                    <label for="">Giá sản phẩm</label>
                    <input type="text" name="pricepro" placeholder="Nhập giá sản phẩm">
                </div><br>
                <div>
                    <label for="">Mô tả sản phẩm</label>
                    <textarea type="text" name="describepro" placeholder="Nhập mô tả sản phẩm" style="width:200px; height:100px"></textarea>
                </div><br>

                <div>
                    <input type="submit"  name="addpro" value="Thêm mới">
                    <input type="reset" value="Nhập lại">

                    <a href="index.php?act=listpro"><input type="button" value="Danh sách"></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>