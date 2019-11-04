<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
       $str = "1$".$_POST["txtTuNam"]."$".$_POST["txtDenNam"]."$".$_POST["txtTruong"]."$".$_POST["txtNoiHoc"]."$101\n";
       $fp = fopen('../resource/learninghistory.txt','a');
       fwrite($fp,$str);
       fclose($fp);
       header("Location: ../view/quatronhhoctap.php");
   }
?>