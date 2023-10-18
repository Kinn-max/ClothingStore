

<?php
include("config/connect.php");

$sql = "SELECT * FROM  danhmuc order by stt Asc ";
$show_category = mysqli_query($mysqli, $sql);


?>
<div class="menu_show">
            <div class="menu_show-more">
                <form action="quanlydanhmuc/them.php" method="post" class="form_get">
                    <div class="input_container">
                        <label for="password_field" class="input_label" >Tên Danh mục</label>
                        <input id="password_field" class="input_field" type="text" name="tendanhmuc" title="Inpit title" placeholder="Nhập tên sản phẩm ở đây">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label" >Mã danh mục</label>
                        <input id="password_field" class="input_field" type="text" name = "madanhmuc" title="Inpit title" placeholder="Nhập tên sản phẩm ở đây">
                    </div>
     
                  
                    <button type="submit" name="submit"  class="more_data" >Thêm   </button>
                </form>
                
            </div>
            <h3>Danh mục đã thêm</h3>
            <div class="menu_show-list">
                <table >
                    <tr>
                        <th>Stt</th>
                      <th>Tên danh mục</th>
                      <th>tùy chọn</th>

                    </tr>
                    <?php
                    $i = 0;
                    while($array_category =mysqli_fetch_array($show_category)){
                        $i++;

                    ?>
                    <tr>
                        <td> <?php echo  $array_category['stt']?></td>
                      <td><?php echo $array_category['tendanhmuc']  ?></td>
                      <td>
                        <a style="color: red; font-size: 1.3rem;  font-weight: 600;" href="quanlydanhmuc/xuly.php?quanly=xoa&id_danhmuc=<?php  echo $array_category['id_danhmuc']  ?>">Xóa</a>
                        <span>/</span>
                        <a style="color: blue; font-size: 1.3rem;  font-weight: 600;" href="index.php?admin=suadanhmuc&id_danhmuc=<?php  echo $array_category['id_danhmuc']  ?>">Sửa</a>
                      </td>

                    </tr>

                    <?php
                    }

                    ?>
                </table>
            </div>
</div>