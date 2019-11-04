<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/ManageContact.php");
//$rsMockData = ManageContact::getList("123"); //toan tu phan giai mieng
// $linesFromFile = ManageContact::getListFromFile("101");
// $linesFromDB = ManageContact::getListFromDB('101');
// var_dump($linesFromFile);
// $linesFromFile = Learninghistory::getListFromFile("101");
// $linesFromDB = Learninghistory::getListFromDB('101');
//var_dump($linesFromFile);

?>
<div class="container-fluid">
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<div class="btn-add d-flex justify-content-end align-items-center pb-3">
			<!-- <button type="button" class="btn btn-outline-primary btn-rounded waves-effect">
				<i class="fas fa-plus-circle"></i> Thêm</button> -->
			
    <!-- <h5>Thêm quá trính học tập</h5> -->
	<!-- Trigger the modal with a button -->
	<!--  -->
	<div>
    <?php
    if (isset($_GET['id'])) {
        if (filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range' => 0)) && $_GET['id']>0) {
            $id = 0;
            foreach ($dataFromFile as $key => $value) {
                $id++;
                if ($id==$_GET['id']) {
                    ?>
                    <form method="POST" action="../createview/editquatrinhhoctap.php">
                        <div class="form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="number" min="1990" max="<?php  echo date("Y")?>" name="txtName" value="<?php echo $value->yearFrom; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="number" min="1990" max="<?php  echo date("Y") ?>" name="txtPhone" value="<?php echo $value->yearTo; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" min="1" max="12" name="txtEmail" value="<?php echo $value->schoolName; ?>" required>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                            <a class="btn btn-secondary" href="quatronhhoctap.php">Hủy</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cập nhật</button>
                    </form><?php 
                }
            }
            ?>
        
            <?php
        }else { 
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-question-circle"></i>
                <strong>Lỗi :</strong> ID không hợp lệ !~
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
    }
        
    ?>
</div>
	<!--  -->
    <button type="button" class="btn btn-primary btn-right" data-toggle="modal"
    data-target="#quatrinhhoctap">Thêm</button>
			</div>
			<thead class="thead-dark">
				<tr>
					<th scope="col"></th>
					<th scope="col">Name</th>
					<th scope="col">Phone</th>
					<th scope="col">Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($linesFromDB as $key => $value){
						$stt = $key + 1;
						echo "<tr>";
						echo "<th scope='row'>$stt</th>";
						echo "<td>$value->Name</td>";
						echo "<td>$value->Phone</td>";
						echo "<td>$value->Email</td>";
						// echo "<td>$value->schoolAddress</td>";
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
				   <h5 class="modal-title">Thêm Danh Bạ</h5>
				   <button type="button" class="close" data-dismiss="modal">&times;</button>
				   <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
				<form method="POST" action="../createview/addquatronhhoctap.php">
					<div class="form-data">
						<div class="form-group">
							<label>Name</label>
							<input class="form-control" type="txt" name="Name" value="" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input class="form-control" type="number"  name="Phone" value="" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="text" min="1" max="12" name="Email" value="" required>
						</div>
						<!-- <div class="form-group">
							<label>Nơi học</label>
							<input class="form-control" type="text" name="schoolAddress" value="" required>
						</div> -->
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
<script>
    function remove(id){
    var del=confirm("Bạn có thực sự muốn xóa không ?");
    if (del==true){
        window.location.href="../controller/deletequatrinhhoctap.php?id="+id;
    }
}
</script>

<?php
include_once("footer.php"); ?>