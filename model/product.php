<?php
    // admin
    function loadall_product($keyw="",$idcategory=0){
        $sql="SELECT * FROM product where 1";
        // where 1 tức là nó đúng
        if($keyw!=""){
            $sql.=" and name like '%".$keyw."%'";
        }
        if($idcategory>0){
            $sql.=" and idcategory ='".$idcategory."'";
        }
        $sql.=" order by id desc";
        $listproduct=pdo_query($sql);
        return  $listproduct;
    }
    function loadone_product($id){
        $sql = "SELECT * FROM product where id = $id";
        $result = pdo_query_one($sql);
        return $result;
    }
    function insert_product($namepro, $imgpro, $pricepro, $describepro, $idcategory){
        $sql="INSERT INTO `product` (`name`, `img`, `price`, `describe`, `idcategory`) VALUES ('$namepro', '$imgpro', '$pricepro', '$describepro', '$idcategory')";
        pdo_execute($sql);
    }
    function updatepro($id, $name, $img, $price, $describe, $idcategory){
        $sql="UPDATE `product` SET `name` = '{$name}', `img` = '{$img}', `price` = '{$price}', `describe` = '{$describe}', `idcategory` = '{$idcategory}' WHERE `product`.`id` = $id";
        pdo_execute($sql);
    }
    // function updatepro($id, $namepro, $imgpro, $pricepro, $describepro, $idcategory) {
    //     if($imgpro!=""){
    //         $sql = "UPDATE `product` SET `name` = '{$namepro}', `price` = '{$pricepro}', `img` = '{$imgpro}', `describe` = '{$describepro}', `idcategory` = '{$idcategory}' WHERE `product`.`id` = $id";
    //     }else{
    //         $sql = "UPDATE `product` SET `name` = '{$namepro}', `price` = '{$pricepro}', `img` = '{$imgpro}', `describe` = '{$describepro}', `idcategory` = '{$idcategory}' WHERE `product`.`id` = $id";
    //     }
    //     pdo_execute($sql);
    // }
    function deletepro($id){
        $sql="DELETE FROM product WHERE `product`.`id` = $id";
        pdo_execute($sql);
    }
    // trang chủ 
    // in ra 9 sp mới nhất 
    function loadall_sanpham_home(){
        $sql = "SELECT * FROM product WHERE 1 ORDER BY id DESC LIMIT 0,9";
        $listproduct = pdo_query($sql);
        return $listproduct;
    }
    function loadall_sanpham_home1(){
        $sql = "SELECT * FROM product WHERE 1 ORDER BY price ASC LIMIT 0,5";
        $listpro = pdo_query($sql);
        return $listpro;
    }
    // in ra 1 sp (cho trang sanphamct)
    function loadone_sanpham($id){
        $sql="SELECT * FROM product WHERE id=".$id;
        $sp=pdo_query_one($sql);
        return $sp;
    }
    // in ra sp cùng loại
    function load_sanpham_cungloai($id){
        $sql = "SELECT * FROM product WHERE idcategory = (SELECT idcategory FROM product WHERE id = ".$id.") AND id <> ".$id;

        $listproduct = pdo_query($sql);
            return $listproduct;
    }
    //load tên danh mục
    function load_ten_dm($idcategory){
        if ($idcategory>0) {
            $sql="SELECT * FROM category WHERE id=".$idcategory;
    $dm=pdo_query_one($sql);
    extract($dm);
    return $name;
        }else{
            return "";
        }
        
    }
?>