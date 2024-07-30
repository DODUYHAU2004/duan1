<div class="box_title">DANH MỤC</div>
<div class="box_content2 product_portfolio">
    <ul>
        <?php
                        foreach ($dsdm as $dm) {
                            extract($dm);
                            $linkdm = "index.php?act=sanpham&iddm=".$id;
                            echo '<li>
                                    <a href="'.$linkdm.'">'.$name.'</a>
                                  </li>';

                        }
                    ?>
    </ul>
    
    

</div>

<section class="body_product">
    <div class="title">
        <h3>Sản Phẩm Tìm Kiếm </h3>
    </div>
    <div class="container">
        <div class="show_product">
            <?php
          
           $counter = 0; 
           foreach ($dssp as $sp) {
            extract($sp);
            $linksp ="index.php?act=sanphamct&idsp=".$id;
            $hinh=$img_path.$img;
            echo '
               <div class="card">
                   <div class="items">
                       <div class="image">
                           <img src="' . $hinh . '" alt="">
                       </div>
                       <div class="text">
                           <a href="' . $linksp . '" style="text-decoration: none;"><h3>' . $name . '</h3></a>
                           <p>' . $price . 'đ</p>
                       </div>
                       <div class="color">
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                       </div>
                       <div class="button">
           
                            <form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="id" value="' . $id . '">
                                <input type="hidden" name="name" value="' . $name . '">
                                <input type="hidden" name="img" value="' . $img . '">
                                <input type="hidden" name="price" value="' . $price . '">
                                <input type="submit" name="addtocart" value="Thêm vào Giỏ Hàng">
                            </form>
                        </div>
                    </div>
                </div>';

                $counter++;
                if ($counter % 5 == 0) {
                    echo '</div><div class="show_product">'; 
                }
            }
            ?>
        </div>
    </div>
</section>
