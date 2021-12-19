<?php
require("header.php");
?>
<?php
if(isset($_REQUEST['sbsignin'])){
$user=$_REQUEST['txtuser'];
$pass=md5($_REQUEST['txtpass']);
$name=$_REQUEST['txtname'];
$email=$_REQUEST['txtemail'];
$sql = "INSERT INTO tbluser (Username, Password, Fullname, Email) 
VALUES ('$user','$pass','$name','$email')";
if($conn->query($sql)===TRUE)
{
	header("location:mainsign.php");
}
else
{
	echo "Error: ".$sql."<br/>".$conn->error;
}
}
?>
<?php
require("footer.php");
?>