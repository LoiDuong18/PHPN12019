<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/learninghistory.php");
$rsMockData = Learninghistory::getList("102T1011010"); //toan tu phan giai mieng
$linesFromFile = Learninghistory::getListFromFile("101");
//var_dump($linesFromFile);
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$sif = "1$".$_POST["txtTuNam"]."$".$_POST["txtDenNam"]."$".$_POST["txtTruong"]."$".$_POST["txtNoiHoc"]."$101\n";
	$fp = fopen('../resource/learninghistory.txt','a');
	fwrite($fp,$sif);
	fclose($fp);
}
?>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<div class="btn-add d-flex justify-content-end align-items-center pb-3">
			<!-- <button type="button" class="btn btn-outline-primary btn-rounded waves-effect">
				<i class="fas fa-plus-circle"></i> Thêm</button> -->
				<div class="container">
    <!-- <h5>Thêm quá trính học tập</h5> -->
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-primary btn-right" data-toggle="modal"
    data-target="#quatrinhhoctap">Thêm</button>
			</div>
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Từ năm</th>
					<th scope="col">Đến năm</th>
					<th scope="col">Lớp</th>
					<th scope="col">Nơi học</th>
					<th scope="col">Thao tác</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($linesFromFile as $key => $value){
						$stt = $key + 1;
						echo "<tr>";
						echo "<th scope='row'>$stt</th>";
						echo "<td>$value->yearFrom</td>";
						echo "<td>$value->yearTo</td>";
						echo "<td>$value->schoolName</td>";
						echo "<td>$value->schoolAddress</td>";
						echo "<td class='d-flex'>";
						echo " <button class='btn btn-outline-success mr-3'><i class='far fa-edit'></i> Sửa</button> ";
						echo " <button class='btn btn-outline-danger'><i class='fas fa-trash-alt'></i> Xóa</button> ";
						echo "</td>";
						echo "</tr>";
					}
				?>

			</tbody>
		</table>
<!-- modal -->
    <!-- Modal -->
    <div id="quatrinhhoctap" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Thêm quá trình học tập</h5>
                </div>
                <div class="modal-body">
				<form method="POST" enctype="multipart/form-data">
                                        <div class="form-data">
                                            <div class="form-group">
                                                <label>Từ năm</label>
                                                <input class="form-control" type="number" min="1990" max="<?php  echo $date['year']?>" name="txtTuNam" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Đến năm</label>
                                                <input class="form-control" type="number" min="1990" max="<?php  echo $date['year'] ?>" name="txtDenNam" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Trường</label>
                                                <input class="form-control" type="text" min="1" max="12" name="txtTruong" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nơi học</label>
                                                <input class="form-control" type="text" name="txtNoiHoc" value="" required>
                                            </div>
                                        </div>     
                </div>
                <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<input type="submit" class="btn btn-success" value="Thêm">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("footer.php"); ?>