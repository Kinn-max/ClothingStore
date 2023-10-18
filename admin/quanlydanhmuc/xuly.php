

<?php
    include("../config/connect.php");


if(isset($_GET['quanly'])){
    $control = $_GET['quanly'];
}
else{
    $control = "";
}
if($control == "xoa"){
    $id_danhmuc = $_GET['id_danhmuc'];
    $sql_del = "DELETE FROM danhmuc WHERE id_danhmuc='".$id_danhmuc."'";
    mysqli_query($mysqli,$sql_del);
    header("Location: ../index.php?admin=themdanhmuc");
}
else if($control == "sua"){
    if(isset($_POST['update'])){
        $id_danhmuc = $_GET['id_danhmuc'];
        $category = $_POST['tendanhmuc'];
        $code_category = $_POST['madanhmuc'];
        $sql_in = "UPDATE danhmuc SET tendanhmuc = '".$category."' , stt = '".$code_category."' WHERE id_danhmuc ='".$id_danhmuc."' ";
        mysqli_query($mysqli, $sql_in);
        header("location: ../index.php?admin=themdanhmuc");
        
    }
    
}



?>