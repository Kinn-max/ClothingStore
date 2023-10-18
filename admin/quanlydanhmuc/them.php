
<?php
    include("../config/connect.php");

if(isset($_POST['submit'])){
    $category = $_POST['tendanhmuc'];
    $code_category = $_POST['madanhmuc'];
    $sql_in = "INSERT INTO danhmuc(tendanhmuc,stt) VALUES ('".$category."', '".$code_category."')";
    mysqli_query($mysqli, $sql_in);
    header("location: ../index.php?admin=themdanhmuc");
    
}


?>