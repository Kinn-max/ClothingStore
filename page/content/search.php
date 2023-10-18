




<?php
include("admin/config/connect.php");

if(isset($_POST['search'])){
    $search = $_POST['search'];
}
else{
    $search = " ";

}
$sql_danhmuc = "SELECT * FROM sanpham WHERE tensanpham LIKE '%$search%'";
$sql_danhmuc_tmp = mysqli_query($mysqli, $sql_danhmuc);


?>


<div class="wrap">
        <div class="title_center">
            <h3 class="name_center">TỪ khóa tìm kiếm: <span>"<?php echo $search ?>"</span></h3>
            <div class="wrap_show">
                <?php while($show_four = mysqli_fetch_array($sql_danhmuc_tmp)){

                  ?>
                <a href="index.php?quanly=product&id_sanpham=<?php echo $show_four['id_sanpham']  ?>">
                    <div class="wrap_show-all ">
                        <div class="wrap_show-list">
                            <img src="admin/quanlysanpham/upload/<?php echo $show_four['anhchinh']   ?>" alt="">
                        </div>
                        <div class="wrap_show-information">
                            <div  class="wrap_show-name--product"><?php echo $show_four['tensanpham']   ?></div>
                            <div class="wrap_show-price">
                                <span><?php echo number_format($show_four['giasanpham'],0,',','.').'vnđ'  ?></span>
                                <p><?php 
                                $tiensaugiam = $show_four['giasanpham'] - $show_four['giasanpham']*$show_four['giamgia']/100;
                                $soTienInRa = number_format($tiensaugiam, 0, ',', '.');
                                echo $soTienInRa . ' vnđ';
                                    ?></p>
                            </div>
                        </div>
                        <div class="wrap_show-name">
                            <img src="img/logo.png" alt="">
                        </div>
    
                    </div>
                </a>
                <?php
                }

                ?>

              
            </div>
        </div>

    </div>