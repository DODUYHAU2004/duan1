<?php
//dùng chung cho admin và trang trủ 
    $status_bill=[
        "1"=>'Đơn hàng mới',
        "2"=>'Đang xử lí',
        "3"=>'Đang giao hàng',
        "4"=>'Đã giao hàng',
        "5"=>'Đã hủy'
    ];

    function loadall_cart_count($idbill){
        $sql="SELECT * from cart where idbill=".$idbill;
        $bill=pdo_query($sql);
        return sizeof($bill);
    }

    function loadall_bill($keyw="",$iduser=0){
        $sql="SELECT * from bill where 1";
        if($iduser > 0) $sql.=" AND iduser=".$iduser;
        if($keyw!="") $sql.=" AND id like '%".$keyw."%'";
        $sql.=" order by id desc";
        $listbill=pdo_query($sql);
        return $listbill;
    }

    function loadone_bill_ad($id){
        $sql="SELECT * FROM bill where `id` = $id";
        $result=pdo_query_one($sql);
        return $result;
    }


    function get_status($n){
        switch($n){
            case '1':
                $status="Đơn hàng mới";
                break;
            case '2':
                $status="Đang xử lý";
                break;
            case '3':
                $status="Đang giao hàng";
                break;
            case '4':
                $status="Đã giao hàng";
                break;
                case '5':
                    $status="Đã hủy";
                    break;
            default:
                $status="Đơn hàng mới";
                break;
        }
        return $status;
    }
    function get_pay($n){
        switch($n){
            case '1':
                $pay="Thanh toán trực tiếp";
                break;
            case '2':
                $pay="Thanh toán online";
                break;
            default:
                $pay="Chưa thanh toán";
                break;
        }
        return $pay;
    }

    function deletebill($id){
        $sql="DELETE FROM bill where `bill`.`id` =$id";
        pdo_execute($sql);
    }
    function loadall_bill_detail(){
        $sql= "SELECT * FROM `bill_detail` order by id desc";
        $list_bill_detail=pdo_query($sql);
        return $list_bill_detail;
    }
    function loadbill_detail_bill($idbill){
        $sql="SELECT * FROM bill_detail where idbill = $idbill";
        $list_bill_detail=pdo_query($sql);
        return $list_bill_detail;
    }
    function loadone_bill_detail($id){
        $sql="SELECT * FROM `bill_detail` where id = $id";
        $result=pdo_query_one($sql);
        return $result;
    }
    function update_status($id, $status) {
        $sql="UPDATE `bill` SET `status` = '$status' WHERE `bill`.`id` = $id";
        
        pdo_execute($sql);
        
    }

    // trang chủ
    function tongdonhang(){
        $tong = 0;
                                   foreach ($_SESSION['mycart'] as $cart) {
                                   
                                   $ttien = $cart[3] * $cart[4];
                                   $tong += $ttien;
                                  
                   }
                   return $tong;
    }
    function insert_bill($iduser,$name,$email,$address,$tel,$tongdonhang,$date,$pay){
        $sql = "INSERT INTO bill(`iduser`,`name`,`address`,`email`,`tel`,`total_money`,`pay`,`date`) values('$iduser','$name','$address','$email','$tel','$tongdonhang','$pay',NOW())";
        return pdo_execute_return_lastInsertId($sql);
    }
                                   
    function insert_cart($iduser,$idproduct,$img,$name,$price,$quantity,$total_money,$idbill){
        $sql = "INSERT INTO cart(`iduser`,`idproduct`,`img`,`name`,`price`,`quantity`,`total_money`,`idbill`) values('$iduser','$idproduct','$img','$name','$price','$quantity','$total_money','$idbill')";
        return pdo_execute($sql);
    }      
    function insert_bill_detail_from_cart($iduser, $name, $address, $tel, $email, $img, $quantity, $pay, $date, $tongdonhang, $idbill) {
        $sql = "INSERT INTO bill_detail (iduser, name, address, tel, email, img, quantity, pay, date, total_money, status, idbill) 
                SELECT b.iduser, b.name, b.address, b.tel, b.email, c.img, c.quantity, b.pay, b.date, c.total_money, b.status, b.id AS idbill 
                FROM cart c 
                JOIN bill b ON c.idbill = b.id 
                WHERE b.id = :idbill";
    
        $params = array(
            ':idbill' => $idbill
            
        );
    
        pdo_execute1($sql, $params);
    }
    
    
    // function loadall_bill_detail($idbill) {
    //     if ($idbill !== null) {
    //     $sql = "SELECT * FROM bill_detail WHERE idbill = :idbill";
    //     $params = array(':idbill' => $idbill);
    //     $details = pdo_query_one1($sql, $params);
    
    //     return $details;
    // }else {
    //     
    //     return null;
    // }
    // }
    
     
    function loadone_bill($id) {
        if ($id !== null) {
            $sql = "SELECT b.*, bd.* FROM bill b 
                    LEFT JOIN bill_detail bd ON b.id = bd.idbill
                    WHERE b.id = :id";
            $params = array(':id' => $id);
            $bill = pdo_query_one1($sql, $params);
            return $bill;
        } else {
           
            return null;
        }
    }
    
    function loadall_bill1($iduser) {
       if ($iduser !== null) {
           $sql = "SELECT * FROM bill WHERE iduser = $iduser";
           $listbill = pdo_query($sql);
           return $listbill;
       } else {
           
           return null;
       }
    }
    
    
       
    function loadall_cart($idbill) {
       if ($idbill !== null) {
           $sql = "SELECT * FROM cart WHERE idbill = $idbill";
           $bill = pdo_query($sql);
           return $bill;
       } else {
           
           return null;
       }
    }


    
      
    
    function get_ttdh($n) {
       switch ($n) {
           case '1':
               $tt = "Đơn hàng mới";
               break;
           case '2':
               $tt = "Đang xử lý ";
               break;
           case '3':
               $tt = "Đang giao hàng";
               break;
           case '4':
               $tt = "Đã giao hàng";
               break;
               case '5':
                $tt = "Đã hủy";
                break;
           default:
               $tt = "Đơn hàng mới";  
               break;
       }
       return $tt;
    }
    function pay($n) {
        switch ($n) {
            case '1':
                $tt = "Thanh toán khi nhận hàng";
                break;
            case '2':
                $tt = "Thanh toán online ";
                break;
           
            default:
                $tt = "Thanh toán khi nhận hàng";  
                break;
        }
        return $tt;
     }
    
    
    ?>
    