<style>

.product-details {
    display: flex;
    justify-content: space-between;
    margin: 30px;
}

.product-info {
    flex-basis: 60%;

}

.product-info img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 20px;
}

.product-info h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.product-info p {
    font-size: 16px;
    margin-bottom: 20px;
}

.quantity {
    margin-bottom: 20px;
    display: flex;
}
#quantity{
    
    width: 50px;
    height: 40px;
   
    border-radius: 5px;
    
}
.quantity label {
    font-size: 16px;
}

.quantity-control {
    display: flex;
    align-items: center;
}

.quantity-control button {
    font-size: 18px;
    padding: 5px 10px;
    background: #2E2EFE;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.quantity-control input {
    width: 50px;
    font-size: 16px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 0 10px;
}

.add-to-cart button {
    font-size: 18px;
    padding: 10px 20px;
    background: #2E2EFE;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}




.related-products {
    margin-top: 30px;
}

.related-products h3 {
    font-size: 24px;
    margin-bottom: 20px;
}


@media (max-width: 768px) {
    .product-details {
        flex-direction: column;
    }

    .product-info,
    .product-reviews {
        flex-basis: 100%;
    }

    .product-info img {
        margin-bottom: 20px;
    }
}


.popup_shopping {
    max-width: 600px;
    width: 100%;
    padding: 15px;
}

.popup_shopping .body_shopping {
    max-height: 400px;
    overflow-y: auto;
}
</style>
<div class="product-details">
    <div class="product-info">
        
        <div><?php
            extract($onesp);
            $img = $img_path . $img;
            echo '
            <img src="' . $img . '" alt="' . $name . '">
            <h2>' . $name . '</h2>
            
            
            <p>'. $describe .' </p>
            <p>Price: '.$price.'đ</p>

            <!-- Quantity control -->
            
           
';
?>
</div>
            </div>

            
            <iframe src="view/binhluan/binhluanform.php?idproduct=<?= $id ?>" frameborder="0" width="100%"
                height="300px"></iframe>
        </div>




</div>


<div class="mb">
                <div class="box_title"><h1>SẢN PHẨM CÙNG LOẠI</h1></div>
                <div class="box_content">
                        <?php
                         foreach ($sp_cung_loai as $sp_cung_loai) {
                           extract($sp_cung_loai);
                           $linksp ="index.php?act=sanphamct&idsp=".$id;
                           echo '<li><a href="'.$linksp.'">'.$name.'</a></li>';
                         }
                        ?>
                </div>
            </div>


</body>

</html>