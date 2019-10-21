  
<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['rs']) && $_GET['rs']=='success') {
        echo "<script>alert('Cập nhật thành công !');</script>";
    }
    elseif(isset($_GET['rs']) && $_GET['rs']=='delete') {
        echo "<script>alert('Xóa thành công !');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>