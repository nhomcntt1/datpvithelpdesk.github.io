<?php
require("header.php");
?>
<style language="CSS">
td
{
	padding:5px;
}
#t1
{
	font-weight:bold;;
}
#show
{
	margin: 10px 5px 10px 5px;
	color:red;
}	
</style>
<?php
?>
<form action="" method=post name=f1 onsubmit="return check();">
  <div class="form-group">
  <fieldset>
  <legend>Đổi mật khẩu</legend>
    <label for="Giatri">Mật khẩu cũ: </label>
    <input type="password" class="form-control" name="txtoldpass" placeholder="Mật khẩu cũ" id="oldpassid" style="width:200px;" >
	<label for="Giatri">Mật khẩu mới: </label>
    <input type="password" class="form-control" name="txtnewpass" placeholder="Mật khẩu mới" id="newpassid" style="width:300px;" >
	<label for="Giatri">Xác nhận mật khẩu: </label>
    <input type="password" class="form-control" name="txtrepass" placeholder="Xác nhận lại mật khẩu" id="repassid" style="width:350px;" >
	</fieldset>
  </div><div id="show">
<?php
if(isset($_POST["sbcomplete"]))
{
	$np=md5($_POST['txtnewpass']);
	$rp=md5($_POST['txtrepass']);
	$op=md5($_POST['txtoldpass']);
	$user=$_SESSION['username'];
	
	if($np==$rp)
	{
		$sql ="SELECT Password FROM tbluser WHERE Username='$user'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		$lp=$row['Password'];
		if($op==$lp)
		{
			$sql="UPDATE tbluser SET Password='$np' WHERE Username='$user'";
			$conn->query($sql);
			unset($_SESSION['username']);
			session_destroy();
			echo "<script language='javascript'> alert('Bạn thay đổi mật khẩu thành công!!!'); window.location='index.php'</script>";
			
		}
		else
		{
			echo "Mật khẩu cũ không chính xác!!!";
		}
	}
	else
	{
		echo "Xác nhận mật khẩu chưa đúng!!!";
	}
}
?>  </div>
  <button type="submit" class="btn btn-default" style="background-color:lightblue;" name="sbcomplete">Hoàn thành</button>
</form>

<?php
require("footer.php");
?>