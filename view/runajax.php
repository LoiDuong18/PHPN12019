<?php
// if(isset($_REQUEST["name"])){
//     $name = $_REQUEST["name"];
// echo "<h2 style='color:red' >xin chao ban: $name</h2>";
// }
// include_once("..//model/entity/user.php");
// $user =  new user("dtuan","123","Duy Tuan");
// $jsonUser= json_encode($user);
// echo $jsonUser;
// 
  include_once ("../model/entity/user.php");
  $username = $_REQUEST["username"];
  if (isset($username)) {
      if ($username == "abc") {
        $user = new User ("Duong", "123" , "Duong" );
      }
      if ($username == "abcd") {
        $user = new User ("Duong", "123" , "Duong" );
      }
  }
  $jsonUser = json_encode ($user);
  echo $jsonUser;
?>