

<?php
    include("../config/connect.php");


if(isset($_GET['quanly'])){
    $control = $_GET['quanly'];
}
else{
    $control = "";
}
if($control == "xoa"){
    $id_sanpham = $_GET['id_sanpham'];
    $sql_del = "DELETE FROM sanpham WHERE id_sanpham='".$id_sanpham."'";
    $sql_del_size = "DELETE FROM size_sanpham WHERE id_sanpham = '".$id_sanpham."'";
    $sql_del_img = "DELETE FROM img_sanpham WHERE id_sanpham = '".$id_sanpham."'";
    $sql_del_img_file = "SELECT * FROM img_sanpham where id_sanpham = '".$id_sanpham."'";
    $sql_del_img_main = "SELECT * FROM sanpham where id_sanpham = '".$id_sanpham."'";
    $unlink_main_img = mysqli_query($mysqli,$sql_del_img_main);
    $unlink_sql = mysqli_query($mysqli,$sql_del_img_file);
    mysqli_query($mysqli,$sql_del);
    mysqli_query($mysqli,$sql_del_size);
    mysqli_query($mysqli,$sql_del_img);

    while($row_del_img = mysqli_fetch_array($unlink_sql)){
        unlink('upload/'.$row_del_img['tenanh']);
    }
    while($row_del_img = mysqli_fetch_array($unlink_main_img)){
        unlink('upload/'.$row_del_img['tenanh']);
    }
    header("Location: ../index.php?admin=themsanpham");
}
else if($control == "sua"){
    if(isset($_POST['add_product'])){
        $id_sanpham = $_GET['id_sapham'];
        $tensanpham= $_POST['tensanpham'];
        $giasanpham = $_POST['giasanpham'];
        $giamgia = $_POST['giamgia'];
        $mau = $_POST['mau'];
        $kichco = $_POST['size'];
        $thuocdanhmuc= $_POST['danhmuc'];
        $trangthai = $_POST['tinhtrang'];
    
        $anhnhieu_count = count($_FILES['anhchitiet']['name']);
    
        // picture main
        $anhchinh = $_FILES['anhchinh']['name'];
        $anhchinh_tmp = $_FILES['anhchinh']['tmp_name'];
        $anhchinh = time()."_".$anhchinh;
        
        move_uploaded_file($anhchinh_tmp,'upload/'.$anhchinh);
        
        $sql_more = "UPDATE  sanpham SET tensanpham ='".$tensanpham."',anhchinh='".$anhchinh."',giasanpham='".$giasanpham."',giamgia='".$giamgia."',mau='".$mau."',danhmuc='".$thuocdanhmuc."',trangthai='".$trangthai."' WHERE id_sanpham = '".$id_sanpham."' ";

        mysqli_query($mysqli,$sql_more);
        $last_insert_id = mysqli_insert_id($mysqli);
        
        // insert size
        foreach($kichco as $item){
            $sql_more_size = "UPDATE  size_sanpham SET kichthuoc='".$item."',id_sanpham='".$last_insert_id ."'WHERE id_sanpham = '".$id_sanpham."' ";
            mysqli_query($mysqli, $sql_more_size);
            
        }
        // insert picture dentail
        
        for($i = 0; $i < $anhnhieu_count ;$i++){
            $anhnhieu = $_FILES['anhchitiet']['name'][$i];
            $anhnhieu_tmp = $_FILES['anhchitiet']['tmp_name'][$i];
            $anhnhieu = time()."_".$anhnhieu;
            move_uploaded_file($anhnhieu_tmp,'upload/'.$anhnhieu);
            $sql_more_anh ="UPDATE  img_sanpham SET tenanh='".$anhnhieu."',id_sanpham='".$last_insert_id."' WHERE id_sanpham = '".$id_sanpham."'";
            mysqli_query($mysqli, $sql_more_anh);
          
        }
        header("location: ../index.php?admin=themsanpham");
        
    }
    
}



?>