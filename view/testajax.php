<?php
session_start();
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");
?>
<h1> Test Ajax </h1>
<button id="ajaxButton" onclick="testAjax();">Goi Ajax</button>
<div id="contentAjax">

</div>
<?php
include_once("footer.php"); ?>
<script>
    function testAjax(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status ==200){
                var user = JSON.parse (this.responseText);
                console.log (user);
                var element = document.getElementById("contentAjax");
                if (this.responseText== "{}")
                    element.innerHTML = " không có dữ liệu!";
                else {
                var str = "<ul>";
                str += "<li>";
                str += "Use name:" + user.userName;
                str += "</li>";
                str += "<li>";
                str += "Password:" + user.passWord;
                str += "</li>";
                str += "<li>";
                str += "Full name:" + user.fullName;
                str += "</li>";
                str += "</ul>";
                element.innerHTML = str;
                }
            }
        };
        xhttp.open ("GET", "runAjax.php?username=abcd", true);
        xhttp.send();
       
    }
</script>