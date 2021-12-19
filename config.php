<?php
$hostname="localhost";
$username="root";
$pasword="";
$database="demo";
$vistorTime=900;
$MAXPAGE=10;
$multilanguage=1;
$arraylang= array(array('vn','Việt Nam'),array('en','English')
);
$conn =@mysqli_connect($hostname,$username,$pasword) or die("Không thể kết nối CSDL");
mysqli_select_db($conn,$database);
?>