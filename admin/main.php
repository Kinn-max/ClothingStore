


<?php
if(isset($_GET['admin']) ){
    $admin = $_GET['admin'];
}else{
    $admin = "";
}


if($admin == "themdanhmuc"){
    include("content/danhmuc.php");
}
else if($admin == "themsanpham"){
    include("content/sanpham.php");

}
else if($admin == "suadanhmuc"){
    include("content/suadanhmuc.php");

}
else if($admin == "suasanpham"){
    include("content/suasanpham.php");

}
else {
    include("content/danhmuc.php");
}

?>