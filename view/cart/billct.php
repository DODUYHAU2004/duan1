<?php


if(isset($_GET['act'])&&($_GET['act']=='billct')){
  $id=$_GET['id'];
  $bill=loadone_bill($id);
  $billct=Loadall_cart($id);
  
?>

<style>
 table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 12px;
    font-size: 18px;
    font-weight: bold;
}

input {
    font-size: 18px;
    padding: 12px 24px;
    
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

th {
    background-color: #f2f2f2;
    font-size: 20px;
    font-weight: bold;
    color: #333;
}
</style>
<br>
<h2>Thông tin sản phẩm chi tiết của hóa đơn</h2>
<table>
  <thead>
    <tr>
      <th>STT</th>
      <th>Tên sản phẩm</th>
      <th>Ảnh sản phẩm</th>
      <th>Số lượng</th>
      <th>Đơn giá</th>
      <th>Thành tiền</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $stt=1;
    
    foreach ($billct as $cart) {
      extract($cart);
      $total_money=$quantity*$price;
      $hinh = $img_path . $img;
      echo '<tr>
        <td>'.$stt.'</td>
        <td>'.$name.'</td>
        <td><img src="'. $hinh.'" width="50" height="50"></td>
        <td>'.$quantity.'</td>
        <td>'.$price.'</td>
        <td>'.$total_money.'</td>
      </tr>';
      $stt++;
    }
    ?>
  </tbody>
</table>



<?php
//...
}
?>
