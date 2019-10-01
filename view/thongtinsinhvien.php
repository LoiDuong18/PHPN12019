<?php
include_once("header.php");
include_once("nav.php");
?>
<?php
include_once("../model/entity/student.php");
$maSinhVien = $ho = $ten = $ngaySinh = $email = "";
//var_dump($_SERVER);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maSinhVien = $_REQUEST["txtMaSinhVien"];
    $ho = $_REQUEST["txtHo"];
    $ten = $_REQUEST["txtTen"];
    $ngaySinh = $_REQUEST["datNgaySinh"];
    $email = $_REQUEST["txtEmail"];
    $student = new Student($ho, $ten, $ngaySinh, $email);
    $student->display();
    if ($_FILES["fileAnhDaiDien"]["name"] != "") {
        //Đoạn code lưu file ảnh vào server
        move_uploaded_file($_FILES["fileAnhDaiDien"]["tmp_name"], "uploads/avatar.jpg");
    } else
        echo "Chúc mừng bạn đã không thành công";
}

?>
<form method="post" enctype="multipart/form-data">
    <div class="formEnterData">
        <div>
            <label for="">Ảnh đại diện:</label>
        </div>
        <div>
            <input type="file" name="fileAnhDaiDien" value="<?php echo $maSinhVien; ?>">
        </div>
        <div>
            <label for="">Mã sinh viên:</label>
        </div>
        <div>
            <input required type="text" name="txtMaSinhVien" value="<?php echo $maSinhVien; ?>">
        </div>
        <div>
            <label for="">Họ:</label>
        </div>
        <div>
            <input required type="text" name="txtHo" value="<?php echo $ho; ?>">
        </div>
        <div>
            <label for="">Tên:</label>
        </div>
        <div>
            <input required type="text" name="txtTen" value="<?php echo $ten; ?>">
        </div>
        <div>
            <label for="">Ngày sinh:</label>
        </div>
        <div>
            <input type="date" name="datNgaySinh" value="<?php echo $ngaySinh; ?>">
        </div>
        <div>
            <label for="">Email:</label>
        </div>
        <div>
            <input type="email" name="txtEmail" value="<?php echo $email; ?>">
        </div>
        <div>

        </div>
        <div>
            <input type="submit" name="save" value="Lưu">
        </div>
    </div>
</form>
<?php include_once("footer.php"); ?>