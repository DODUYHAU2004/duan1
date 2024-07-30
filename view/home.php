 <h1class="box_title">DANH MỤC</h1>
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
        <h3>Sản phẩm bán chạy</h3>
    </div>
    <div class="container">
        <div class="show_product">
            <?php
          
           $counter = 0; 
           foreach ($spnew as $sp) {
               extract($sp);
               $linksp = "index.php?act=sanphamct&idsp=" . $id;
               $hinh = $img_path . $img;
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





<section class="body_product discount">
    <div class="title">
        <h3>Sản phẩm khuyến mãi</h3>
    </div>
    <div class="container">

        <div class="show_product"><?php 
                    $counter = 0; 
                    foreach ($spnew1 as $sp) {
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=" . $id;
                        $hinh = $img_path . $img;
                    echo'
            <div class="card">
                <div class="items">
                    
                       <div class="image">
                           <img src="'.$hinh.'" alt="">
                       </div>
                       <div class="text">
                       <a href="'.$linksp.'" style="text-decoration: none;"><h3>'.$name.'</h3></a>
                           <span><s>200.000đ</s></span>
                           <span>'.$price.'đ</span>
                       </div>
                       <span class="discount">25%</span>
                       <div class="color">
                           <span></span>
                           <span></span>
                           <span></span>
                           <span></span>
                       </div>
                      <div class="button">
                      <form action="index.php?act=addtocart"  method="post">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="name" value="'.$name.'">
                  
                      <input type="hidden" name="img" value="'.$img.'">
                  
                      <input type="hidden" name="price" value="'.$price.'">
                     
                  
                       <input type="submit" name="addtocart" value="Thêm vào Giỏ Hàng" >
                       </div>
                       </div>
                       </div>
                       
                       ';
                       $counter++;
                       if ($counter % 5 == 0) {
                           echo '</div><div class="show_product">'; 
                       }
                   }
                      
?>

            </div>
        </div>

    </div>
    </div>
</section>