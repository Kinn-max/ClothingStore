



<?php
include("config/connect.php");

if(isset($_GET['quanly'])){
    $control = $_GET['quanly'];
}
$id_danhmuc = $_GET['id_danhmuc'];



$sql = "SELECT * FROM  danhmuc where id_danhmuc = '".$id_danhmuc."' limit 1";

$show_category = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_array($show_category);


?>
<div class="menu_show">
            <div class="menu_show-more">
                <form action="quanlydanhmuc/xuly.php?quanly=sua&id_danhmuc=<?php echo $row['id_danhmuc']  ?>" method="post" class="form_get">
                    <div class="input_container">
                        <label for="password_field" class="input_label" >Tên Danh mục</label>
                        <input id="password_field" class="input_field" type="text" name="tendanhmuc" title="Inpit title" value="<?php echo $row['tendanhmuc']  ?>">
                    </div>
                    <div class="input_container">
                        <label for="password_field" class="input_label" >Số thứ tự</label>
                        <input id="password_field" class="input_field" type="text" name = "madanhmuc" title="Inpit title" value="<?php echo $row['stt']  ?>">
                    </div>
     
                  
                    <button type="submit" name="update"  class="more_data" > Cập nhật  </button>
                </form>
                
            </div>

</div>