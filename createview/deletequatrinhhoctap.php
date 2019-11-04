<?php 
if ($_SERVER['REQUEST_METHOD']=='GET') {
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
		$line = $_GET['id'];
		$url_data = '../resource/learninghistory.txt';
		remove_line($url_data,$line-1);
		header("Location: ../view/quatronhhoctap.php?rs=delete");
   }
?>