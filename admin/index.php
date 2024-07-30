<?php

include "../model/account.php";
include "../model/cart.php";
include "../model/category.php";
include "../model/comment.php";
include "../model/pdo.php";
include "../model/product.php";
include "../model/statistical.php";
include "header.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'listcate':
            if (isset($_POST['clickok']) && ($_POST['clickok'])) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = '';
            }

            $listcategory = loadall_category($keyw);
            include "category/list.php";
            break;
        case "deletecate":
            if (isset($_GET['idcate']) && ($_GET['idcate'] > 0)) {
                deletecate($_GET['idcate']);
            }
            $listcategory = loadall_category();
            include "category/list.php";
            break;
        case "editcate":
            if (isset($_GET['idcate']) && ($_GET['idcate'] > 0)) {
                $category = loadone_category($_GET['idcate']);
            }
            $listcategory = loadall_category();
            include "category/update.php";
            break;
        case "updatecate":
            if (isset($_POST['updatecate']) && ($_POST['updatecate'])) {
                $id = $_POST['id'];
                $namecate = $_POST['namecate'];

                updatecate($id, $namecate);
                header('location:index.php?act=listcate');

            }
            $listcategory = loadall_category();
            include "category/update.php";
            break;
        case "addcate":
            if (isset($_POST['addcate']) && ($_POST['addcate'])) {
                $namecate = $_POST['namecate'];

                add_category($namecate);
                header('location: index.php?act=listcate');
            }
            include "category/add.php";
            break;
        case "listpro":
            if (isset($_POST['clickok']) && ($_POST['clickok'])) {
                $keyw = $_POST['keyw'];
                $idcategory = $_POST['idcategory'];
            } else {
                $keyw = '';
                $idcategory = 0;
            }
            $listcategory = loadall_category();
            $listproduct = loadall_product($keyw, $idcategory);
            include "product/list.php";
            break;
        case "addpro";
            if (isset($_POST['addpro']) && ($_POST['addpro'])) {
                $namepro = $_POST['namepro'];
                $imgpro = $_FILES['imgpro']['name'];
                $dir = "../upload/";
                $upFile = $dir . basename($_FILES['imgpro']['name']);
                if (move_uploaded_file($_FILES['imgpro']['tmp_name'], $upFile)) {
                    // echo "Load ảnh thành công";
                } else {
                    echo "Chưa load ảnh";
                }
                $pricepro = $_POST['pricepro'];
                $describepro = $_POST['describepro'];
                $idcategory = $_POST['idcategory'];

                insert_product($namepro, $imgpro, $pricepro, $describepro, $idcategory);
                header('location: index.php?act=listpro');
            }
            $listcategory = loadall_category();
            include "product/add.php";
            break;
        case "deletepro":
            if (isset($_GET['idpro']) && ($_GET['idpro'] > 0)) {
                deletepro($_GET['idpro']);
            }
            $listproduct = loadall_product("", 0);
            include "product/list.php";
            break;
        case "editpro":
            if (isset($_GET['idpro']) && ($_GET['idpro'] > 0)) {
                $product = loadone_product($_GET['idpro']);
            }
            $listcategory = loadall_category();
            include "product/update.php";
            break;
        case "updatepro":
            if (isset($_POST['updatepro']) && ($_POST['updatepro'])) {
                $id = $_POST['id'];
                $namepro = $_POST['namepro'];
                $imgpro = $_FILES['imgpro']['name'];
                $dir = "../upload/";
                $upFile = $dir . basename($_FILES['imgpro']['name']);
                if (move_uploaded_file($_FILES['imgpro']['tmp_name'], $upFile)) {
                    echo "Thành công";
                } else {
                    echo "Lỗi";
                }
                $pricepro = $_POST['pricepro'];
                $describepro = $_POST['describepro'];
                $idcategory = $_POST['idcategory'];

                updatepro($id, $namepro, $imgpro, $pricepro, $describepro, $idcategory);
                $thongbao = "Cập nhật sản phẩm thành công";
                header('location: index.php?act=listpro');
            }
            $listcategory = loadall_category();
            $listproduct = loadall_product("", 0);
            include "product/update.php";
            break;
        case 'account_client':
            if (isset($_POST['clickok']) && ($_POST['clickok'])) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = '';
            }
            $listaccount = loadall_account($keyw);
            include "account_client/list.php";
            break;
        case "addaccount":
            if (isset($_POST['addaccount']) && ($_POST['addaccount'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $role = $_POST['role'];

                add_account($email, $user, $pass, $tel, $address, $role);
                header('location: index.php?act=account_client');
            }
            include "account_client/add.php";
            break;
        case "deleteaccount":
            if (isset($_GET['idaccount']) && ($_GET['idaccount'] > 0)) {
                deleteaccount($_GET['idaccount']);
            }
            $listaccount = loadall_account();
            include "account_client/list.php";
            break;
        case "comment_list":
            $listcomment = loadall_comment_ad();
            include "comment/list.php";
            break;
        case "deletecomment":
            if (isset($_GET['idcomment']) && ($_GET['idcomment'] > 0)) {
                delete_commentad($_GET['idcomment']);
            }
            $listcomment = loadall_comment_ad();
            include "comment/list.php";
            break;
        case "bill":
            if (isset($_POST['keyw']) && ($_POST['keyw'] != "")) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = "";
            }
            $listbill = loadall_bill($keyw, 0);
            include "bill/list.php";
            break;
        case "listdetail":
            if(isset($_GET['idbill']) && ($_GET['idbill'] > 0)) {
                // $detail=loadone_bill_detail($_GET['idbill']);
                $list_detail=loadbill_detail_bill($_GET['idbill']);
                $onebill = loadone_bill_ad($_GET['idbill']);
            }
            // $list_bill_detail = loadall_bill_detail();
            include "bill/listdetail.php";
            break;
        case "update_status":
            if(isset($_POST['capnhat'])){
                $id=$_POST['id'];
                $status=$_POST['status'];

                update_status($id,$status);
                header("location: index.php?act=bill");
            }
            $list_bill_detail = loadall_bill_detail();
            include "bill/listdetail.php";
            break;
        case "deletebill":
            if (isset($_GET['idbill']) && ($_GET['idbill'] > 0)) {
                deletebill($_GET['idbill']);
            }
            $listbill = loadall_bill();
            include "bill/list.php";
            break;
        case "statistical":
            $list_thongke_doanhthu = thongke_doanhthu();
            $list_thongke_sanpham_ban = thongke_sanpham();
            $liststatistical = loadall_statistical();
            include "statistical/list.php";
            break;
        case "map":
            $liststatistical = loadall_statistical();
            include "statistical/map.php";
            break;
        case "home":
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
?>