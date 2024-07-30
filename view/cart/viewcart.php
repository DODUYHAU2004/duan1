<br>

    <div class="card">
        <div class="row">
            <div class="col-md-8 cart1">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>

                        </div>

                    </div>
                </div>
                <?php 
                                $i=0;
                                $tong = 0;
                                foreach ($_SESSION['mycart'] as $cart) {
                                $hinh=$img_path . $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                $xoasp='<a href="index.php?act=delcart&id='.$i.'">x</a>';
                                                echo'
                    
            <div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="'.$hinh.'"></div>
                    <div class="col">
                        <div class="row text-muted">'.$cart[1].'</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col">
                    
    
                     <a href="index.php?act=minuscart&id=' . $cart[0] . '">-</a><button style=" padding: 6px;">' . $cart[4] . '</button><a href="index.php?act=pluscart&id=' . $cart[0] . '">+</a>


                    </div>
                    <div class="col"> '.$ttien.' đ
                    
                    
                    </div>
                    <div>
                    '.$xoasp.'
                    </div>
                </div>
                </div>
            ';
            $i+=1;
                }
                
                ?>
                
                <div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Back
                        to shop</span></div>
            </div>

            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">Tổng Tiền</div>
                    <?php
   echo'<div class="col text-right"> '.$tong.' đ</div>';
?>
                </div>
                <form>
                    <p>SHIPPING</p>
                    <select>
                        <option class="text-muted">Phí Vận Chuyển - 5.00 đ</option>
                    </select>

                </form>
                <a href="index.php?act=bill"><input type="button" class="btn" value="Tiếp tục đặt hàng "></a>
                
            </div>
        </div>
    </div>
    </div>


    
</body>
</html>



</body>

</html>