
<?php
    include("../config/connect.php");

if(isset($_POST['add_product'])){
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
    
    $sql_more = "INSERT INTO sanpham(tensanpham,anhchinh,giasanpham,giamgia,mau,danhmuc,trangthai)
    VALUES ('".$tensanpham."','".$anhchinh."','".$giasanpham."','".$giamgia."','".$mau."','".$thuocdanhmuc."','".$trangthai."') ";
    mysqli_query($mysqli,$sql_more);
    $last_insert_id = mysqli_insert_id($mysqli);
    
    // insert size
    foreach($kichco as $item){
        $sql_more_size = "INSERT INTO size_sanpham(kichthuoc,id_sanpham)
        VALUES ('".$item."','".$last_insert_id ."')";
        mysqli_query($mysqli, $sql_more_size);
        
    }
    // insert picture dentail
    
    for($i = 0; $i < $anhnhieu_count ;$i++){
        $anhnhieu = $_FILES['anhchitiet']['name'][$i];
        $anhnhieu_tmp = $_FILES['anhchitiet']['tmp_name'][$i];
        $anhnhieu = time()."_".$anhnhieu;
        move_uploaded_file($anhnhieu_tmp,'upload/'.$anhnhieu);
        $sql_more_anh ="INSERT INTO img_sanpham(tenanh,id_sanpham)
        VALUES ('".$anhnhieu."','".$last_insert_id."')";
        mysqli_query($mysqli, $sql_more_anh);
      
    }
    header("location: ../index.php?admin=themsanpham");


    
}


?>