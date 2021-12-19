<?php
require("header.php");
?>
<?php	
if(isset($_POST['sblogin'])){
$user=addslashes($_POST['txtuser']);
$pass=addslashes($_POST['txtpass']);
$password=md5($pass);
$sql="SELECT Username, Password FROM tbluser WHERE Username='$user'";
$result=$conn->query($sql);
if(mysqli_num_rows($result) === 0)
{
	echo "<h2><b><font color=red>Không tìm thấy user: ".$user." trong CSDL!!!</font></b></h2>"; 
	echo "<form action='login.php' method=post name=f1>  
  <button type='submit' class='btn btn-default' style='background-color:lightblue;' name='sbback'>Trở lại</button>
</form>";
	exit;
}
//lấy user pass
$row = $result->fetch_assoc();
if($password ==$row['Password'])
{	
	$_SESSION['username'] = $user;
	header("Location:index.php");
}
else
{
	echo "<h2><b><font color=red>Bạn nhập sai mật khẩu hãy nhập lại!!!</font></b></h2>";
	echo "<form action='login.php' method=post name=f1>  
  <button type='submit' class='btn btn-default' style='background-color:lightblue;' name='sbback'>Trở lại</button>
</form>";
}
}
?>

<?php
require("footer.php");
?>