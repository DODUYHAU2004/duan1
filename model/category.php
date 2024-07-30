<?php

function loadall_category($keyw=""){
    $sql="SELECT * FROM category where 1";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    $sql.=" order by id desc";
    $listcategory=pdo_query($sql);
    return  $listcategory;
}
function loadone_category($id){
    $sql="SELECT * FROM category where id = $id";
    $result=pdo_query_one($sql);
    return $result;
}
function load_name_category($idcategory)
{
    if ($idcategory > 0) {
        $sql = "SELECT * from product where id=" . $idcategory;
        $cate = pdo_query_one($sql);
        extract($cate);
        return $name;
    } else {
        return "";
    }
}
function deletecate($id)
{
    $sql = "DELETE FROM category where `category`.`id` = $id";
    pdo_execute($sql);
}
function updatecate($id, $name){
    $sql = "UPDATE `category` set `name` = '$name' where `category`.`id` = $id";
    pdo_execute($sql);
}
function add_category($namecate){
    $sql = "INSERT INTO `category` (`name`) values ('$namecate')";
    pdo_execute($sql);
} 
?>