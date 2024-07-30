
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



th {
    background-color: #f2f2f2;
    font-size: 20px;
    font-weight: bold;
    color: #333;
}

a.detail-link {
    color: red; 
    text-decoration: none; 
}

a.detail-link:hover {
    text-decoration: underline; 
}

    </style>
<br>

<h2>Bảng Đơn Hàng</h2>

<table>
    <thead>
        <tr>
            
            <th>Mã Đơn Hàng</th>
            <th>Ngày Đặt Hàng </th>
            <th>Đại CHỉ  </th>
            <th>Người nhận </th>
            <th>Số điện thoại</th>
            <th>Số  Sản Phẩm</th>
            <th>Tổng Giá Trị Đơn Hàng</th>
            <th>Tình Trạng Đơn Hàng</th>
            <th>Chi Tiết Đơn Hàng</th>
        </tr>
    </thead>
    
<?php
foreach ($listbill as $cart) {
    extract($cart);
    $n = $cart['status'];
    $tt = get_ttdh($n);
    $linkct = "index.php?act=billct&id=" . $cart['id'];
    $countsp = loadall_cart_count($cart['id']);
    
    
    echo '<tr>
            <td>'.$cart['id'].'</td>
            <td>'.$cart['date'].'</td>
            <td>'.$cart['address'].'</td>
            <td>'.$cart['name'].'</td>
            <td>'.$cart['tel'].'</td>
            <td>'.$countsp.'</td>
            <td>'.$cart['total_money'].'đ</td>
            <td>'.$tt.'</td>
            <td>
            <a class="detail-link" href="'.$linkct.'">Xem chi tiết</a>
            <form method="post" action="index.php?act=billct1&id='.$cart['id'].'">
            
                <input type="submit" value="HỦY" name="huydonhang">
            </form>
            </td>
            
            
          </tr>';
}
?>