



<?php  

if(isset($_GET['quanly'])){
    $quanly = $_GET['quanly'];
}
else{
    $quanly = "";
}
if($quanly == "Hi"){

}
else if($quanly == "product"){
    include("content/product.php");
}
else if($quanly == "nhom"){
    include("content/nhom.php");
}
else if($quanly == "search"){
    include("content/search.php");
}
else{
    include("content/index.php");
}



?>