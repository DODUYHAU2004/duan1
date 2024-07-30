 
    
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/csscart.css">
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <div class="content__header">
                
                <div class="menu__header">
                    <nav>
                        <ul class="nav__link">
                        <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="index.php?act=sanpham">Sản Phẩm</a></li>
                <li><a href="index.php?act=lienhe">Liên Hệ</a></li>
                <li><a href="index.php?act=viewcart">Giỏ Hàng</a></li>
                <li><a href="index.php?act=dangnhap">Tài Khoản</a></li>
                <form action="index.php?act=sanpham" method="POST">
        
            <input type="text" class="tk" name="$keyw">
            <input type="submit" value="Tìm Kiếm " class="tk" name="timkiem">
        
    </form>
                        </ul>
                    </nav>
                </div>
                
            </div>
        </div>
    </header>
   
    <script src="js/slide.js"></script>
<script src="https://kit.fontawesome.com/03bca92048.js" crossorigin="anonymous"></script>
<script>
    let popup_card = document.getElementById('popup_card');
    let popup = document.querySelector('.popup_shopping');
    let overlay = document.querySelector('.overlay');
    let button = document.querySelector('button.button');
    popup_card.addEventListener("click",()=>{
        popup.classList.add('active');
        overlay.classList.add('active');
    });
    overlay.addEventListener("click",()=>{
        popup.classList.remove('active');
        overlay.classList.remove('active');
    });
    button.addEventListener("click",()=>{
        popup.classList.remove('active');
        overlay.classList.remove('active');
    });
</script>
    <!-- end header -->