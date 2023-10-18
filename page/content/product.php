
<?php
include("admin/config/connect.php");

if(isset($_GET['id_sanpham'])){
    $id_sanpham = $_GET['id_sanpham'];
    $sql_get = "SELECT * FROM sanpham where id_sanpham='".$id_sanpham."' limit 1";
    $sql_get_tmp = mysqli_query($mysqli, $sql_get);
    $sql_size = "SELECT * FROM size_sanpham WHERE id_sanpham='".$id_sanpham."'";
    $sql_size_tmp = mysqli_query($mysqli,$sql_size);
    $sql_img = "SELECT * FROM img_sanpham WHERE id_sanpham='".$id_sanpham."'";
    $sql_img_tmp = mysqli_query($mysqli,$sql_img);



}




?>

<div class="wrap">
        <div class="title_center">
            <div class="product">
                <?php while($show_dentail = mysqli_fetch_array($sql_get_tmp)){ ?>
                <div class="product_left-all">
                    <div class="product_left">
                        <img id='img_big' src="admin/quanlysanpham/upload/<?php echo $show_dentail['anhchinh']  ?>" alt="">
                    </div>
                    <div class="product_left-all--list">
                        <?php  while($row_img = mysqli_fetch_array($sql_img_tmp)){  ?>
                        <div class="img-item--list">
                            <img src="admin/quanlysanpham/upload/<?php echo $row_img['tenanh']  ?>"  alt="">
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="product_right">
                    <div class="product_first">
                        <h3><?php echo $show_dentail['tensanpham']  ?></h3>
                        <div class="product_price">
                            <div class="product_price-new">
                               <span ><?php 
                                $tiensaugiam =$show_dentail['giasanpham'] -$show_dentail['giasanpham']*$show_dentail['giamgia']/100;
                                $soTienInRa = number_format($tiensaugiam, 0, ',', '.');
                                echo $soTienInRa . 'vnđ';
                                    ?></span>
                            </div>
                            <div class="product_price-old">
                               <span><?php echo number_format($show_dentail['giasanpham'],0,',','.').'vnđ'  ?></span>
                            </div>
                            <div class="product_price-percent">
                                <span><?php echo $show_dentail['giamgia']."%"  ?></span>
                            </div>
                        </div>
                        <div class="product_color">
                            <p>Chọn màu sắc: <span class="bold_type"><?php echo $show_dentail['mau']  ?></span> </p>
                            <div class="product_color-img">
                                <img src="admin/quanlysanpham/upload/<?php echo $show_dentail['anhchinh']  ?>" alt="">
                            </div>
                        </div>
                        <div class="product_size">
                            <p>Chọn kích thước: <span class="bold_type-size">28</span></p>
                            <div class="product_size-list">
                                <?php  while($row_size_all = mysqli_fetch_array($sql_size_tmp)) { ?>  
                                <div class="product_size-list--item">
                                    <span><?php  echo $row_size_all['kichthuoc'] ?></span>
                                </div>
                                <?php  } ?>
    
                            </div>
                        </div>
                        <div class="product_quantity">
                            <p>Chọn số lượng: <span id="quantity_main" class="bold_type">1</span></p>
                            <div class="product_quantity-change">
                                <div class="product_quantity-giam">
                                    <i class="fa-solid fa-minus"></i>
    
                                </div>
                                <input class="value_product" type="text" value="1">
                                <div class="product_quantity-tang">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
    
                            </div>
                        </div>
                        <div class="product_add">
                            <button class="product_add-cart">
                                 Thêm giỏ hàng
                            </button>
                            <button class="product_add-buy">
                                Mua ngay
                            </button>
    
                        </div>
               
                    </div>
                    <div class="product_last">
                        <!-- <div class="product_last-img">
                            <img src="img/logo.png" alt="">
                        </div> -->
                        <div class="container">
                            <div class="cloud front">
                              <span class="left-front"></span>
                              <span class="right-front"></span>
                            </div>
                            <span class="sun sunshine"></span>
                            <span class="sun"></span>
                            <div class="cloud back">
                              <span class="left-back"></span>
                              <span class="right-back"></span>
                            </div>
                          </div>

                        <div class="product_last-all">
                            <div class="product_last-dentail">
                                <i class="fa-solid fa-truck-fast"></i>
                                <p>Giao hàng từ 2 - 5 ngày</p>
                            </div>
                            <div class="product_last-dentail">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                <p>Kiểm hàng trước khi thanh toán</p>
                            </div>
                        </div>
                        <div class="product_last-all">
                            <div class="product_last-dentail">
                                <i class="fa-solid fa-box-archive"></i>
                                <p>Hỗ trợ hoàn trả hàng</p>
                            </div>
                            <div class="product_last-dentail">
                                <i class="fa-regular fa-credit-card"></i>
                                <p>Thanh toán dễ dàng</p>
                            </div>
                        </div>
                        <div class="product_last-all">
                            <div class="product_last-dentail">
                                <i class="fa-solid fa-headset"></i>
                                <p>Tư vấn nhiệt tình</p>
                            </div>
                            <div class="product_last-dentail">
                                <i class="fa-solid fa-users"></i>
                                <p>Thương hiệu uy tín</p>
                            </div>
                        </div>
                    </div>
                </div>

              <?php }  ?>
            </div>

        </div>

    </div>