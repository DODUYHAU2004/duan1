


    <style>
      

.invoice {
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
}

h2 {
    color: #2c3e50;
    border-bottom: 2px solid #2c3e50;
    padding-bottom: 10px;
}

.order-info {
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #ccc;
}

.order-info p {
    margin: 0;
}

.order-info ul {
    list-style: none;
    padding: 0;
}

.order-info li {
    margin-bottom: 5px;
}

.product-list {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.product-list th, .product-list td {
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
}

.product-list th {
    background-color: #3498db;
    color: #fff;
}

.product-list tr:nth-child(even) {
    background-color: #f2f2f2;
}

.product-list tr:hover {
    background-color: #e0e0e0;
    transition: background-color 0.3s ease;
}

.total {
    margin-top: 20px;
    text-align: right;
}

.total p {
    margin: 5px 0;
}

.total strong {
    color: #e74c3c;
}

    </style>
<br>
    <div class="invoice">
        <h2>Hóa đơn bán hàng</h2>

        <div class="order-info">
            <p style="color: #e74c3c; ">Thành công! Quý khách đã đặt hàng thành công.</p>
            <?php   
            if(isset($bill)&&(is_array($bill))){
extract($bill);

            }
            
            $n = $bill['pay'];
    $tt = pay($n);
            ?>
            <!-- Update these lines in billcomfirm.php -->

<p><strong>Mã đơn hàng:</strong> <?php echo isset($bill['id']) ? $bill['id'] : ''; ?></p>
<p><strong>Thông tin đặt hàng:</strong></p>
<ul>
    <li><strong>Người đặt hàng:</strong> <?php echo isset($bill['date']) ? $bill['date'] : ''; ?></li>
    <li><strong>Ngày đặt:</strong> <?php echo isset($bill['name']) ? $bill['name'] : ''; ?></li>
    <li><strong>Địa chỉ:</strong> <?php echo isset($bill['address']) ? $bill['address'] : ''; ?></li>
    <li><strong>Email:</strong> <?php echo isset($bill['email']) ? $bill['email'] : ''; ?></li>
    <li><strong>Số điện thoại:</strong> <?php echo isset($bill['tel']) ? $bill['tel'] : ''; ?></li>
</ul>
<p><strong>Phương thức thanh toán:</strong> <?php echo isset($tt) ? $tt : ''; ?></p>

        </div>

        <table class="product-list">
            
            
        <div class="total">
            <p><strong>Tổng cộng:</strong> <?=$tongdonhang; ?></p>
            <div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
    </div>
        
</body>
</html>
