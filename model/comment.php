
<?php
//trang chủ 
function loadall_comment($idproduct){
        $sql = "SELECT * FROM comment WHERE 1";
        if($idproduct>0) $sql.=" AND idproduct='".$idproduct."'";

        $sql.=" order by id desc";
        $listbinhluan =  pdo_query($sql);
        return $listbinhluan;
    }
    function insert_comment($content,$idproduct,$iduser,$date){
        $sql = "INSERT INTO comment(`content`,`idproduct`,`iduser`,`date`) values('$content','$idproduct','$iduser',NOW())";
        pdo_execute($sql);
    }
    function delete_comment(){
        $sql = "DELETE FROM comment where id=".$_GET['id'];
        pdo_execute($sql);
    }
    //admin
    function loadall_comment_ad(){
        $sql="SELECT * from comment order by id desc";
        $listcomment=pdo_query($sql);
        return $listcomment;
    }
    function delete_commentad($id){
        $sql="DELETE FROM comment WHERE `comment`.`id` = $id";
        pdo_execute($sql);
    }
    ?>