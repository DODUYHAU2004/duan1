<?php
    function loadall_statistical(){
        $sql="SELECT category.id as idcategory, category.name as namecategory,
                    count(product.id) as countproduct,
                    min(product.price) as minprice,
                    max(product.price) as maxprice,
                    avg(product.price) as avgprice
                    FROM product left join category on category.id=product.idcategory
                    group by category.id order by category.id desc";
                    $liststatistical=pdo_query($sql);
                    return $liststatistical;
    }
    function thongke_doanhthu(){
        $sql = "SELECT YEAR(date) AS nam, MONTH(date) AS thang, WEEK(date) AS tuan, SUM(total_money) AS total_money 
        FROM bill 
        GROUP BY nam, thang, tuan 
        ORDER BY nam DESC, thang DESC, tuan DESC;";
        $list_thongke_doanhthu = pdo_query($sql);
        return $list_thongke_doanhthu;
    }

    function thongke_sanpham(){
        $sql = "SELECT YEAR(date) AS nam, MONTH(date) AS thang, WEEK(date) AS tuan, SUM(quantity) AS quantity
        FROM bill_detail 
        GROUP BY nam, thang, tuan 
        ORDER BY nam DESC, thang DESC, tuan DESC;";
        $list_thongke_sanpham_ban = pdo_query($sql);
        return $list_thongke_sanpham_ban;
    }
?>