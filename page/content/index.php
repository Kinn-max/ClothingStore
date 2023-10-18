
<?php
include("admin/config/connect.php");

$sql_get = "SELECT * FROM sanpham order by id_sanpham limit 6";
$sql_get_tmp = mysqli_query($mysqli, $sql_get);
$sql_danhmuc = "SELECT * FROM danhmuc order by id_danhmuc limit 3";
$sql_danhmuc_tmp = mysqli_query($mysqli,$sql_danhmuc);





?>


<div class="taskbar">
        <div class="taskbar_menu">
            <div class="name_sign">
                <div class="name_sign-img">
                    <img src="img/logo.png" alt="">
                </div>
                <div class="name_sign-close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
               

            </div>
            <ul class="taskbar_menu-list">
                <li class="taskbar_item  taskbar_item-boder">TRANG CHỦ</li>
                <li class="taskbar_item">HÀNG MỚI</li>
                <li class="taskbar_item">SẢN PHẨM</li>
                <li class="taskbar_item">SALE</li>
            </ul>
            <div class="sign_register">
                <i class="fa-solid fa-user"></i>
                <div class="sign_register-both">
                    <a href=""> 
                        <div class="sign_register-both--list sign_register-boder">
                            <span>Đăng nhập</span>
                        </div>
                    </a>
                    <a href="">
                        <div class="sign_register-both--list">
                            <span>Đăng ký</span>
                        </div>
                    </a>

                </div>
            </div>
        </div>
</div>

<div class="wrap">
        <div class="title_center text_center">
            <h3 class="notify">DECOR 2023</h3>
            <div class="wrap_information">
                <div class="wrap_chose">
                    <div class="wrap_all">
                        <div class="wrap_all-list">
                            <img src="img/img_big/img1.jpg" alt=""></div>
                        <div class="wrap_all-list">
                            <img src="img/img_big/img2.jpg" alt=""></div>
                        <div class="wrap_all-list">
                            <img src="img/img_big/img3.jpg" alt=""></div>
                        <div class="wrap_all-list">
                            <img src="img/img_big/img4.jpg" alt=""></div>
                    </div>
                    <div class="wrap_click">
                        <div class="wrap_click-left">
                            <i class="fa-solid fa-chevron-left"></i>   
                        </div>
                        <div class="wrap_click-right">
                            <i class="fa-solid fa-chevron-right"></i>   
                        </div>
                    </div>
                    <div class="wrap_dot">
                        <div class="wrap_dot-list"></div>
                        <div class="wrap_dot-list"></div>
                        <div class="wrap_dot-list"></div>
                        <div class="wrap_dot-list"></div>
                    </div>
                    <div class="wrap_target">
                        <h3>XU HƯỚNG THỜI ĐẠI</h3>
                    </div>
                </div>
            </div>
            <h3 class="notify">MẪU HÀNG MỚI</h3>
            <p class="font_small">Sản phẩm quốc tế, phiên bản mới nhất bộ sưu tập mùa thu</p>
            <div class="wrap_show">
                <?php while($show_four = mysqli_fetch_array($sql_get_tmp)){

                  ?>
                <a href="index.php?quanly=product&id_sanpham=<?php echo $show_four['id_sanpham']  ?>">
                    <div class="wrap_show-all">
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
            <div class="more_infor">
                    <a href="#"class="more_infor-a" >XEM THÊM</a>
            </div >
            <h3 class="notify">NHÓM SẢN PHẨM ĐƯỢC QUAN TÂM</h3>
            <div class="wrap_show">
                <?php while($row_danhmuc = mysqli_fetch_array($sql_danhmuc_tmp)){  ?>
                    <a  href="index.php?quanly=nhom&tendanhmuc=<?php echo $row_danhmuc['tendanhmuc']  ?>" class="wrap_show-name--product">
                        <div class="wrap_show-all wrap_show-all--main">
                            <?php   $sql_one_img = "SELECT * FROM sanpham where danhmuc='".$row_danhmuc['tendanhmuc']."'  ORDER BY RAND() LIMIT 1";
                                    $sql_one_img_tmp = mysqli_query($mysqli,$sql_one_img);
                                    $row_one_img = mysqli_fetch_array($sql_one_img_tmp)  ?>
                            <div class="wrap_show-list">
                                <img src="admin/quanlysanpham/upload/<?php  echo $row_one_img['anhchinh']  ?>" alt="">
                            </div>
                            <div class="wrap_show-information">
                                <span class="wrap_show-name--product"><?php  echo $row_danhmuc['tendanhmuc']  ?></span>
                            </div>
    
                        </div>
                    </a>
                <?php  } ?>        
            </div>
            <h3 class="notify text_dark">BỘ SƯU TẬP</h3>
            <div class="wrap_information">
                <div class="wrap_chose--coll">
                    <div class="wrap_all--coll">
                        <div class="wrap_all-list--coll">
                            <img src="img/bo_suu_tap/img1.jpg" alt=""></div>
                        <div class="wrap_all-list--coll">
                            <img src="img/bo_suu_tap/img2.jpg" alt=""></div>
                        <div class="wrap_all-list--coll">
                            <img src="img/bo_suu_tap/img3.jpg" alt=""></div>
                        <div class="wrap_all-list--coll">
                            <img src="img/bo_suu_tap/img4.jpg" alt=""></div>
                        <div class="wrap_all-list--coll">
                            <img src="img/bo_suu_tap/img5.jpg" alt=""></div>
                    </div>
                    <div class="wrap_click">
                        <div class="wrap_click-left--coll">
                            <i class="fa-solid fa-chevron-left"></i>   
                        </div>
                        <div class="wrap_click-right--coll">
                            <i class="fa-solid fa-chevron-right"></i>   
                        </div>
                    </div>
                    <div class="wrap_dot--coll">
                        <div class="wrap_dot-list--coll"></div>
                        <div class="wrap_dot-list--coll"></div>
                        <div class="wrap_dot-list--coll"></div>
                        <div class="wrap_dot-list--coll"></div>
                        <div class="wrap_dot-list--coll"></div>

                    </div>
                </div>
                <div class="wrap_ifor-more-dentail">
                    <div class="wrap_ifor-more-dentail--list">
                        <h3>LỄ THỜI TRANG PARIS </h3>
                        <p>Đối với bộ sưu tập Thu/Đông 2020 của mình, Jonathan Anderson khai thác vào các hình bóng, vật liệu và màu sắc độc đáo để tạo ra những thiết kế táo. Sử dụng cả hình bóng nam và nữ truyền thống để tạo ra những mảnh bắt mắt, tương phản với các chi tiết phần cứng bằng kim loại vàng và các phụ kiện có kích thước quá khổ như khăn quàng cổ, và tất nhiên là cả những chiếc túi. </p>
                    </div>
                    <div class="wrap_ifor-more-dentail--list">
                        <h3> LỄ THỜI TRANG Ý </h3>
                        <p>Những bộ sưu tập mùa Đông nam nổi bật tại Milan FW SS 2023 </p>
                    </div>
                    <div class="wrap_ifor-more-dentail--list">
                        <h3>LỄ THỜI TRANG ÚC </h3>
                        <p>Những bộ sưu tập mùa Đông nam nổi bật tại Milan FW SS 2023 </p>
                    </div>
                    <div class="wrap_ifor-more-dentail--list">
                        <h3> LỄ THỜI TRANG JAPAN</h3>
                        <p>Những bộ sưu tập mùa Đông nam nổi bật tại Milan FW SS 2023 </p>
                    </div>
                    <div class="wrap_ifor-more-dentail--list">
                        <h3>LỄ THỜI TRANG VIET NAM </h3>
                        <p>Những bộ sưu tập mùa Đông nam nổi bật tại Milan FW SS 2023 </p>
                    </div>
                </div>
            </div>
            <div class="wrap_facebook-me">
                <h3>FACEBOOK</h3>
                <span>@kiennek</span>
            </div>
            <div class="wrap_show">
                <div class="wrap_show-all">
                    <div class="wrap_show-list">
                        <img src="img/new_man/img1.jpg" alt="">
                    </div>
                </div>
                <div class="wrap_show-all">
                    <div class="wrap_show-list">
                        <img src="img/new_man/img2.jpg" alt="">
                    </div>
                </div>
                <div class="wrap_show-all">
                    <div class="wrap_show-list">
                        <img src="img/new_man/img3.jpg" alt="">
                    </div>    
                </div>
                <div class="wrap_show-all">
                    <div class="wrap_show-list">
                        <img src="img/new_man/img4.jpg" alt="">
                    </div>
                </div>
              
            </div>
            <div class="wrap_underline">

            </div>
        </div>
    </div>