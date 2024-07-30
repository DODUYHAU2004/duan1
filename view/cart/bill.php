<br>
<div class="card">
  <div class="row">
    <div class="col-md-8 cart1">
      <form action="index.php?act=billcomfirm" method="post">
        <?php
          // ... (previous code)

          $tong=0;
          foreach ($_SESSION['mycart'] as $cart) {
            $hinh = $img_path . $cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
          }

          if(isset($_SESSION['user'])){
            $name=$_SESSION['user']['user'];
            $tel=$_SESSION['user']['tel'];
            $address=$_SESSION['user']['address'];
            $email=$_SESSION['user']['email'];
          }else{
            $name="";
            $tel="";
            $address="";
            $email="";
          }
        ?>

        <div><input type="text" name="name" placeholder="Tên" value="<?=$name?>" class="c"></div><br>
        <div><input type="text" name="address" placeholder="Địa Chỉ " value="<?=$address?>"class="c"></div><br>
        <div> <input type="text" name="tel" placeholder="Số Điện Thoại" value="<?=$tel?>"class="c"></div><br>
        <div> <input type="text" name="email" placeholder="Email " value="<?=$email?>"class="c"></div>


        <div>
          <p>Phương thức thanh toán:</p>
          <div>
            <input type="radio" id="huey" name="pay" value="1" checked />
            <label for="1">Thanh Toán Khi Nhận Hàng</label>
          </div>
          <div>
            <input type="radio" id="huey" name="pay" value="2"  />
            <label for="2">Chuyển Khoản Ngân Hàng</label>
          </div>
          
        </div>

        <div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
      </div>

      <div class="col-md-4 summary">
        <div>
          <h5><b>Summary</b></h5>
        </div>
        <hr>
        <div class="row">
          <div class="col" style="padding-left:0;">Tổng Tiền</div>
          <?php
            echo '<div class="col text-right"> '.$tong.'đ</div>';
          ?>
        </div>
        <p>SHIPPING</p>
        <select>
          <option class="text-muted">Phí Vận Chuyển - 5.00 đ</option>
        </select>
        <input type="submit" class="btn" value="Đặt Hàng" name="dongydathang"></input>
      </div>
    </div>
  </div>
</div>
</body>
</html>
