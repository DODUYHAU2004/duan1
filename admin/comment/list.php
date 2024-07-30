<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi</title>
</head>
<style>
    table tr th{
            border-bottom: 3px solid brown;
            padding: 7px 20px;
        }
        table tr td{
            border-bottom: 1px solid brown;
            padding: 7px 20px;
        }
</style>
<body>
    <div >
        <div>
            <h1>Danh sách bình luận</h1>
        </div>
        <table>
            <tr>
                <th></th>
                <th>ID bình luận</th>
                <th>Nội dung</th>
                <th>ID user</th>
                <th>ID product</th>
                <th>Thời gian</th>
                <th>Thao tác</th>
            </tr>
            <tr>
                <?php
                    foreach($listcomment as $comment){
                        extract($comment);
                        $deletecomment="index.php?act=deletecomment&idcomment=".$id;
                    echo '   <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.$id.'</td>
                            <td>'.$content.'</td>
                            <td>'.$iduser.'</td>
                            <td>'.$idproduct.'</td>
                            <td>'.$date.'</td>
                            <td><a href="'.$deletecomment.'"><input type="button" onclick="return confirm(\'Bạn có muốn xóa không\')" style="background-color: red;color: white" value="Xoá"></a></td>
                        </tr>';
                    }
                ?>
            </tr>
        </table>
        <div>
            <input class="" type="button" name="" id="" value="Chọn tất cả">
            <input class="" type="button" name="" id="" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa bình luận đã chọn">
        </div>
    </div>
</body>
</html>