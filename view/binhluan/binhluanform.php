<?php
  session_start();
  include "../../model/pdo.php";
  include '../../model/comment.php';
  include '../../model/account.php';
  $idproduct = isset($_REQUEST['idproduct']) ? $_REQUEST['idproduct'] : 0;

  $dsbl = loadall_comment($idproduct);
 
?>



<style>
    /* Product reviews */
.product-reviews {
    flex-basis: 35%;
    margin-left:10px
}

.comment-section {
    margin-bottom: 20px;
}

.comment-section h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.comment-form label {
    display: block;
    font-size: 16px;
    margin-bottom: 5px;
}

.comment-form textarea {
    width: 100%;
    height: 100px;
    font-size: 14px;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.comment-form input {
    font-size: 16px;
    padding: 10px 20px;
    background: #2E2EFE;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.comment-list {
    list-style: none;
    padding: 0;
}

.comment {
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    padding: 10px;
}

.user-info strong {
    font-size: 16px;
    margin-bottom: 5px;
}

.content p {
    font-size: 14px;
    margin-bottom: 5px;
}

.date {
    font-size: 12px;
    color: #888;
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
</style>

<div class="product-reviews">
            <h3>Bình Luận </h3>
            <table>
                <?php
                    foreach ($dsbl as $bl) {
                        extract($bl);
                        
                        echo '<tr><td>'.$content.'</td>';
                        echo '<td>'.$iduser.'</td>';
                        echo '<td>'.$date.'</td></tr>';
                    }
                ?>
            </table>
            <!-- Comment section -->
            <?php
    
    
            if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){ 
                if (empty($_SESSION['user'])) {
                
                 echo '<h4 style="color:red">Vui đăng nhập để bình luận </h4>';
                   
                } else {
                $content = $_POST['content'];
                $idproduct = $_POST['idproduct'];
                $iduser = $_SESSION['user']['id'];
                $date = date('h:i:sa d/m/Y'); 
                insert_comment($content,$idproduct,$iduser,$date); 
                header("Location:".$_SERVER['HTTP_REFERER']);}
        }
    
    ?>
            <div class="comment-section">
                <h3>Để Lại Bình Luận </h3>
                <form class="comment-form"action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                    <label for="comment-text">Your Comment:</label>
                    <input type="hidden" name="idproduct" value="<?= $idproduct ?>">
                    <textarea id="comment-text" name="content"></textarea>
                    <input type="submit" name="guibinhluan" value="Gửi">
                </form>
        </div>