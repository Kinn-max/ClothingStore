






<?php
include("config/connect.php");
if(isset($_GET['id_sanpham'])){
    $id_sanpham = $_GET['id_sanpham'];
}

$sql_danhmuc = "SELECT * FROM danhmuc";

$tmp = mysqli_query($mysqli,$sql_danhmuc);

$sql = "SELECT * FROM  sanpham WHERE id_sanpham = '".$id_sanpham."'";

$tmp_sanpham = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($tmp_sanpham);



?>


<div class="menu_show">
            <div class="menu_show-more">
                <form action="quanlysanpham/xuly.php?quanly=sua&id_sanpham=<?php echo $row['id_sanpham']  ?>" class="form_get" method="post" enctype="multipart/form-data">
                    <div class="input_container">
                        <label for="password_field" class="input_label">Tên sản phẩm</label>
                        <input id="password_field" class="input_field" type="text" name="tensanpham" title="Inpit title" value="<?php echo $row['tensanpham']  ?>">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Ảnh sản phẩm</label>
                        <input id="password_field" class="input_field" type="file" name="anhchinh" title="Inpit title" placeholder="">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Ảnh mô tả(chọn nhiều)</label>
                        <input id="password_field" class="input_field" type="file" name="anhchitiet[]" multiple="multiple" title="Inpit title" multiple="multiple" placeholder="">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Giá sản phẩm</label>
                        <input id="password_field" class="input_field" type="text" name="giasanpham" title="Inpit title" value="<?php echo $row['giasanpham']  ?>">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Giảm giá %(vd: 20)</label>
                        <input id="password_field" class="input_field" type="text" name="giamgia" title="Inpit title" value="<?php echo $row['giamgia']  ?>">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Màu</label>
                        <input id="password_field" class="input_field" type="text" name="mau" title="Inpit title" value="<?php echo $row['mau']  ?>">
                    </div>
                    <div class="input_container flex_pick none_center">
                        <div class="input_container ">
                            <label for="password_field" class="input_label">Kích thước</label>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="28">
                                <label for="vehicle3" class="size_number">28</label>
                            </div>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="29">
                                <label for="vehicle3" class="size_number">29</label>
                            </div>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="30">
                                <label for="vehicle3" class="size_number">30</label>
                            </div>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="31">
                                <label for="vehicle3" class="size_number">31</label>
                            </div>
                        </div>
                        <div class="input_container ">
                            <label for="password_field" class="input_label">Kích thước</label>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="32">
                                <label for="vehicle3" class="size_number">32</label>
                            </div>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="33">
                                <label for="vehicle3" class="size_number">33</label>
                            </div>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="34">
                                <label for="vehicle3" class="size_number">34</label>
                            </div>
                            <div class="both_size">
                                <input type="checkbox" id="vehicle3" name="size[]" value="35">
                                <label for="vehicle3" class="size_number">35</label>
                            </div>
                    </div>
                    </div>
                    <div class="input_container">
                        <label for="danhmuc" class="input_label">Thuộc danh mục</label>
                        <select id="status" name="danhmuc">
                            <?php
                            while ($show_arr = mysqli_fetch_array($tmp)) {
                            ?>
                            <option value="<?php echo $show_arr['tendanhmuc']; ?>"><?php echo $show_arr['tendanhmuc']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input_container">
                        <label for="password_field" class="input_label">Trạng thái</label>
                        <select id="status" name="tinhtrang">
                            <option value="1">Hiện</option>
                            <option  value="0">Ẩn</option>
                        </select>
                    </div>
                  
                    <button class="more_data"  name="add_product">Thêm</button> 
                </form>
                
            </div>
</div>