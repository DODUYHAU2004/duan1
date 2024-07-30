<?php
session_start();
include "view/header.php";
include "model/pdo.php";
include "model/product.php";
include "model/category.php";
include "model/account.php";
include "model/cart.php";

if(!isset($_SESSION['mycart'])) $_SESSION['mycart']=[];
$spnew=loadall_sanpham_home();
$spnew1=loadall_sanpham_home1();
$dsdm=loadall_category();
include "upload/global.php";
$idbill = null; 

if((isset($_GET['act'])) && ($_GET['act'] !="")){
    $act = $_GET['act']; 

    switch ($act) {
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
           
case "addtocart":
            // Kiểm tra người dùng đăng nhập hay chưa
            if (empty($_SESSION['user'])) {
                
                header('Location: index.php?act=dangnhap');
                exit();
            } else {
                //add thông tin sp từ form add to cart đến SESSION
                if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                    // kiểm tra trong session xem có sản phẩm hay chưa 
                    $id = $_POST['id'];
                    $checkCartExit = false;
                    foreach ($_SESSION['mycart'] as $key => $item) {
                        if ($item['0'] == $id) {
                            $checkCartExit = true;
                        }
                    }
                    if (!$checkCartExit) {
                        $name = $_POST['name'];
                        $img = $_POST['img'];
                        $price = $_POST['price'];
                        $soluong = 1;
                        $ttien = $soluong * $price;
                        $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                        array_push($_SESSION['mycart'], $spadd);
                    } else {
                        foreach ($_SESSION['mycart'] as $key => $item) {
                            if ($item[0] == $id) {
                                $item[4]++;
                                $_SESSION['mycart'][$key][4] = $item[4];
                            }
                        }
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;

        case "pluscart":
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // kiểm tra trong session xem có sản phẩm hay chưa 
                $id = $_GET['id'];
                $checkCartExit = false;
                foreach ($_SESSION['mycart'] as $key => $item) {
                    if ($item[0] == $id) {
                        $item[4]++;
                        $_SESSION['mycart'][$key][4] = $item[4];
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;

        case "minuscart":
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                // kiểm tra trong session xem có sản phẩm hay chưa 
                $id = $_GET['id'];
                $checkCartExit = false;
                foreach ($_SESSION['mycart'] as $key => $item) {
                    if ($item[0] == $id) {
                        if ($item[4] > 1) {
                            $item[4]--;
                        } else {
                            $thongbao = 'Số lượng sản phẩm đặt mua nhỏ nhất là 1';
                        }
                        $_SESSION['mycart'][$key][4] = $item[4];
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;

                    
        case 'sanphamct':

            if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                $id=$_GET['idsp'];
              $sp_cung_loai=load_sanpham_cungloai($id);
                $onesp=loadone_sanpham($id);

                include "view/sanphamct.php";
            include "view/footer.php";
            }else{
                include "view/home.php";
            include "view/footer.php";
            }
            
            break;
            case 'sanpham':
                if(isset($_POST['$keyw'])&&($_POST['$keyw']!="")){
                    $keyw=$_POST['$keyw'];
                }else{
                    $keyw="";
                }
                if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                    $idcategory=$_GET['iddm'];
        }else{
                            $idcategory=0;
                        }
                        $dssp=loadall_product($keyw,$idcategory);
                        $tendm=load_ten_dm($idcategory);
            
                            include "view/sanpham.php";
                            include "view/footer.php";
                        break;  
                 
                        case 'edit_taikhoan':
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $user= $_POST['user'];
                                $pass= $_POST['pass'];
                                $email= $_POST['email'];
                                $address= $_POST['address'];
                                $tel= $_POST['tel'];
                                $id= $_POST['id'];
                                $thongbao= "Cập nhật thành công !";
                                update_account($id,$user,$pass,$email,$address,$tel);
                                $_SESSION['user']=checkuser($user,$pass);
                                                     
                            }
                            include "view/taikhoan/edit_taikhoan.php";
                            break;
                            case 'quenmk':
                                if(isset($_POST['guiemail'])&&($_POST['guiemail'])){                          
                                    $email= $_POST['email'];
        
                                    $checkemail=checkemail($email); 
                                    if(is_array($checkemail)){
                                        $thongbao= "Mật khẩu của bạn là: ".$checkemail['pass'];
                                    }else{
                                        $thongbao="Email này không tồn tại";
                                    }                    
                                }
                                include "view/taikhoan/quenmk.php";
                                break;                                 
                                case 'thoat':
                                    session_unset();
                                    header('location:index.php'); 
                                        break;
        case 'dangky':
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
                $email= $_POST['email'];
                $user= $_POST['user'];
                $pass= $_POST['pass'];
                insert_account($email,$user,$pass);
                $thongbao= "Đăng ký thành công !";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $user= $_POST['user'];
                $pass= $_POST['pass'];
                $checkuser=checkuser($user,$pass); 
                if(is_array($checkuser)){
                    $_SESSION['user']=$checkuser;
                    $thongbao= "Đăng nhập thành công !";
                    header('location:index.php');                         
                }else{ 
                    $thongbao ="Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký !" ;
                }
            }
            include "view/taikhoan/dangnhap.php";
            break; 
            
            case 'delcart':
                if (isset($_GET['id']) && $_GET['id'] >= 0 && $_GET['id'] < count($_SESSION['mycart'])) {
                    $id = $_GET['id'];
                    array_splice($_SESSION['mycart'], $id, 1);
                } else {
                    $_SESSION['mycart'] = [];
                }
                header('Location: index.php?act=viewcart');
                break;
             
            case 'bill':         
                    include "view/cart/bill.php";
                                    break;             
                                    case 'billcomfirm':
    
    
                                        if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                                            
                                            if(isset($_SESSION['user'])) $iduser=$_SESSION['user']['id'];
                                            else $id=0;
                                            $name=$_POST['name'];
                                        $email=$_POST['email'];
                                        $address=$_POST['address'];
                                        $tel=$_POST['tel'];
                                        $pay=$_POST['pay'];
                                        $date = date('h:i:sa d/m/Y'); 
                                        $tongdonhang=tongdonhang();
                                            
                                            $idbill = insert_bill($iduser,$name, $email, $address, $tel, $tongdonhang, $date, $pay);

                                            foreach ($_SESSION['mycart'] as $cart) {
            
                                            insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $idbill);
                                           
                                    }
                                    insert_bill_detail_from_cart($iduser, $name, $address, $tel, $email, $cart[2], $cart[4], $pay, $date, $tongdonhang, $idbill);

                                    $_SESSION['mycart']=[];
                                           
                                        }
                                    
                                    
                                        $bill =loadone_bill($idbill);
                                        $billct = loadall_cart($idbill);

                                        include "view/cart/billcomfirm.php";
                                        break;
case 'mybill':
    $listbill=loadall_bill1($_SESSION['user']['id']);
    include "view/cart/mybill.php";
    break;
    case 'billct':
        
        include "view/cart/billct.php";

break;
case 'billct1':
// Kiểm tra xem biểu mẫu có được gửi hay không
// Kiểm tra xem biểu mẫu có được gửi hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['huydonhang'])) {
    $id = $_GET['id'];

    // Kiểm tra xem trạng thái hiện tại có cho phép hủy hay không
    $currentStatus = get_ttdh($id);

    // Chỉ cho phép hủy nếu trạng thái hiện tại là "Đơn hàng mới" hoặc "Đang xử lý"
    if ($currentStatus == "Đơn hàng mới" || $currentStatus == "Đang xử lý") {
        // Thực hiện logic hủy
       update_status($id, '5');
            // Giả sử '5' đại diện cho trạng thái "Đã hủy"
            echo "Đã hủy đơn hàng thành công!";
        } else {
            echo "Không thể hủy đơn hàng.";
        }
    
}

// Chuyển hướng trở lại trang mybill


    
    break;



        
    
        default:
      
            include "view/home.php";
            include "view/footer.php";
            break;
    }
} else {
   
    include "view/home.php";
    
    include "view/footer.php";
}

?>
