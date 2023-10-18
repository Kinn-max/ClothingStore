
<?php
include("config/connect.php");
$sql = "SELECT * FROM  danhmuc";
$tmp = mysqli_query($mysqli,$sql);
$sql_sanpham = "SELECT * FROM  sanpham";
$tmp_sanpham = mysqli_query($mysqli, $sql_sanpham);



?>


<div class="menu_show">
            <div class="menu_show-more">
                <form action="quanlysanpham/them.php" class="form_get" method="post" enctype="multipart/form-data">
                    <div class="input_container">
                        <label for="password_field" class="input_label">Tên sản phẩm</label>
                        <input id="password_field" class="input_field" type="text" name="tensanpham" title="Inpit title" placeholder="Nhập tên sản phẩm ở đây">
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
                        <input id="password_field" class="input_field" type="text" name="giasanpham" title="Inpit title" placeholder="Nhập giá sản phẩm ở đây">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Giảm giá %(vd: 20)</label>
                        <input id="password_field" class="input_field" type="text" name="giamgia" title="Inpit title" placeholder="Nhập phần trăm được giảm giá ở đây">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label">Màu</label>
                        <input id="password_field" class="input_field" type="text" name="mau" title="Inpit title" placeholder="Nhập phần trăm được giảm giá ở đây">
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
                  
                    <button class="more_data" name="add_product" name="add_product">Thêm</button> 
                </form>
                
            </div>
            <h3>Danh sách sản phẩm đã thêm</h3>
            <div class="menu_show-list">
                <table >
                    <tr>
                      <th>stt</th>
                      <th>Ảnh sản phẩm</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá sản phẩm</th>
                      <th>Giảm giá %</th>
                      <th>Màu</th>
                      <th>kích thước</th>
                      <th>Thuộc loại danh mục</th>
                      <th>Trạng thái</th>
                      <th>Tùy chọn</th>
                    </tr>
                <?php
                $i = 0;
                while($show_product = mysqli_fetch_array($tmp_sanpham )){
                $i++;

                ?>
                    <tr>
                      <td><?php echo $i  ?></td>
                      <td>
                        <div class="img_show-list">
                            <img src="quanlysanpham/upload/<?php echo  $show_product['anhchinh']  ?>" alt=""></td>
                        </div>
                      <td> <?php echo $show_product['tensanpham'] ?></td>
                      <td> <?php echo $show_product['giasanpham'] ?></td>
                      <td> <?php echo $show_product['giamgia'] ?></td>
                      <td> <?php echo $show_product['mau'] ?></td>
                      <td><?php 
                      $sql_sanpham_size = "SELECT * FROM  size_sanpham where id_sanpham ='".$show_product['id_sanpham']."'";
                      $tmp_sanpham_siz = mysqli_query($mysqli, $sql_sanpham_size);
                      while($row_size = mysqli_fetch_array($tmp_sanpham_siz)){
                        echo $row_size['kichthuoc'].",";
                      }
                        ?></td>
                      <td> <?php echo $show_product['danhmuc'] ?></td>
                      <td>
                        <?php if($show_product['trangthai'] == 1){
                            echo "Hiện";
                        }
                        if($show_product['trangthai'] == 0){
                            echo "Ẩn";
                        } ?></td>
                        <td>
                            <a style="color: red; font-size: 1.3rem;  font-weight: 600;" href="quanlysanpham/xuly.php?quanly=xoa&id_sanpham=<?php  echo $show_product['id_sanpham']  ?>">Xóa</a>
                            <span>/</span>
                            <a style="color: red; font-size: 1.3rem;  font-weight: 600;" href="index.php?admin=suasanpham&id_sanpham=<?php  echo $show_product['id_sanpham']?>">Sửa</a>

   
                      </td>

                    </tr>
                <?php
                }
                ?>
                </table>
            </div>