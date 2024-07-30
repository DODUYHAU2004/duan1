<?php
    if(is_array($product)){
        extract($product);
    }
    
    $imgpro="../upload/".$img;
    if(is_file($imgpro)){
        $imgpro="<img src='".$imgpro."' width='100px' height='100px'>";
    }else{
        $imgpro = "Lỗi";
    }
?>
    <div>
        <div>
            <h1>Cập nhật sản phẩm sản phẩm</h1>
        </div>
        <div>
            <form action="index.php?act=updatepro" method="POST" enctype="multipart/form-data">
                <div>

                <div>
                    <label for="">Loại sản phẩm</label><br>
                </div>
                <select name="idcategory" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                        foreach($listcategory as $key=>$cate){
                            if($idcategory==$cate['id']){
                                echo '<option value="'.$cate['id'].'" selected>'.$cate['name'].'</option>';
                            }else{
                                echo '<option value="'.$cate['id'].'">'.$cate['name'].'</option>';
                            }
                        }
                    ?>
                </select>
                </div><br>

                <div>
                    <label for="">Tên sản phẩm</label>
                    <input type="text" name="namepro" value="<?=$name?>">
                </div><br>
                <div>
                    <label for="">Hình ảnh</label>
                    <input type="file" name="imgpro"><br>
                    <?php
                        echo $imgpro;
                    ?>
                </div><br>
                <div>
                    <label for="">Giá sản phẩm</label>
                    <input type="text" name="pricepro" value="<?=$price?>">
                </div><br>
                <div>
                    <label for="">Mô tả sản phẩm</label>
                    <textarea type="text" name="describepro" value="<?=$describe?>" style="width:200px; height:100px"></textarea>
                </div><br>

                <div>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit"  name="updatepro" value="Cập nhật">
                    <input type="reset" value="Nhập lại">

                    <a href="index.php?act=listpro"><input type="button" value="Danh sách"></a>
                </div>
                <?php
                    if(isset($thongbao) && ($thongbao != '')){
                        echo $thongbao;
                    }
                ?>

            </form>
        </div>
    </div>