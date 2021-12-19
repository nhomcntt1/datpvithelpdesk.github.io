<?php
require("header.php");
?>
<script language="javascript">
function check()
{
	
var a=document.f1.txtuser.value;
b=document.f1.txtpass.value;
if(a=="")
{
	alert('Bạn vui lòng nhập tên đăng nhập!!!');
	document.getElementById("userid").focus();
	return false;
}
if(b=="")
{
	alert('Bạn vui lòng nhập mật khẩu!!!');
	document.getElementById("passid").focus();
	return false;
}
}
</script>
<?php
if(isset($_SESSION["username"]))
{
	header("Location:main.php");
}
?>
<form action="process.php" method=post name=f1 onsubmit="return check();">

  <div class="form-group">
  <fieldset>
  <legend>Đăng nhập</legend>
    <label for="Giatri">Tên đăng nhập: </label>
    <input type="text" class="form-control" name="txtuser" id="userid" placeholder="Tên đăng nhập" style="width:200px;" >
  <label for="Giatri">Mật khẩu: </label>
    <input type="password" class="form-control" name="txtpass" id="passid" placeholder="Mật khẩu" style="width:200px;">
	  </fieldset>
  </div>  
  <button type="submit" class="btn btn-default" style="background-color:lightblue;" name="sblogin">Đăng nhập</button>

</form>
<?php
require("footer.php");
?>