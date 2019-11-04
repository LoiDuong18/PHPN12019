<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
		// Hàm thêm dòng
		function add_line($url_data,$str,$position){
			$contents = file($url_data, FILE_IGNORE_NEW_LINES);
			if($position > sizeof($contents)) {
					$position = sizeof($contents) + 1;
				}
			array_splice($contents, $position-1, 0, array($str));
			$contents = implode("\n", $contents);
			file_put_contents($url_data, $contents);
			}
		// Hàm xóa dòng
	    function remove_line($url_data, $lineNum){
			$arr = file($url_data);
			if($lineNum > sizeof($arr))
			{
				exit;
				}
					unset($arr["$lineNum"]);
					if (!$fp = fopen($url_data, 'w+'))
					{
						print "Cannot open file ($url_data)";
						exit;
						}
							if($fp)
							{
							foreach($arr as $line) {
								fwrite($fp,$line); 
							}
						fclose($fp);
					}
					echo "done";
			}
		$str = "1$".$_POST["txtTuNam"]."$".$_POST["txtDenNam"]."$".$_POST["txtTruong"]."$".$_POST["txtNoiHoc"]."$101";
		$line = $_POST['id'];
		$url_data = '../resource/learninghistory.txt';
		add_line($url_data,$str,$line);
		remove_line($url_data,$line);
		header("Location: ../view/quatronhhoctap.php?rs=success");
   }
?>