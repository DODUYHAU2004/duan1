<?php
    // trang chủ 
    // trang chủ 
function insert_account($email,$user,$pass){
    $sql = "INSERT INTO account(`email`,`user`,`pass`) values('$email','$user','$pass')";
    pdo_execute($sql);
}
function checkuser($user,$pass){
    $sql = "SELECT * from account where user='".$user."' AND pass='".$pass."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_account($id,$user,$pass,$email,$address,$tel){
    $sql = "update account set user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' where id=".$id;
    pdo_execute($sql);
}
function checkemail($email){
    $sql = "SELECT * from account where email='".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}

    // admin
    function loadall_account($keyw=""){
        $sql="SELECT * FROM account where 1";
        // where 1 tức là nó đúng
        if($keyw!=""){
            $sql.=" and email like '%".$keyw."%'";
        }
        $sql.=" order by id desc";
        $listaccount=pdo_query($sql);
        return  $listaccount;
    }
    function loadone_account($id){
        $sql="SELECT * from account where `id`= $id";
        $result=pdo_query_one($sql);
        return $result; 
    }
    function add_account($email, $user, $pass, $tel, $address, $role){
        $sql="INSERT INTO `account` (`email`, `user`, `pass`, `tel`, `address`, `role`) VALUES ('{$email}', '{$user}', '{$pass}', '{$tel}', '{$address}', '{$role}')";
        pdo_execute($sql);
    }

    function update_accountad($id, $email, $user, $pass, $tel, $address, $role){
        $sql="UPDATE `account` SET `email` = '{$email}', `user` = '{$user}', `pass` = '{$pass}', `tel` = '{$tel}', `address` = '{$address}', `role` = '{$role}' WHERE `account`.`id` = $id";
        pdo_execute($sql);
    }

    function deleteaccount($id){
        $sql="DELETE from `account` where id=".$id;
        pdo_execute($sql);
    }
?>