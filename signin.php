<?php
require("header.php");
?>
<script language="javascript">
function check()
{
	
var a=document.f1.txtuser.value;
b=document.f1.txtpass.value;
c=document.f1.txtname.value;
d=document.f1.txtemail.value;
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
if(c=="")
{
	alert('Bạn vui lòng nhập tên!!!');
	document.getElementById("nameid").focus();
	return false;
}
if(d=="")
{
	alert('Bạn vui lòng nhập Email!!!');
	document.getElementById("emailid").focus();
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
<form action="processsignin.php" method=post name=f1 onsubmit="return check();">
  <div class="form-group">
  <fieldset>
  <legend>Đăng ký</legend>
    <label for="Giatri">Username: </label>
    <input type="text" class="form-control" name="txtuser" id="userid" placeholder="Tên đăng nhập" style="width:200px;" >
  <label for="Giatri">Password: </label>
    <input type="password" class="form-control" name="txtpass" id="passid" placeholder="Mật khẩu" style="width:200px;">
	<label for="Giatri">Fullname: </label>
    <input type="text" class="form-control" name="txtname" id="nameid" placeholder="Họ và tên" style="width:300px;" >
	<label for="Giatri">Email: </label>
    <input type="text" class="form-control" name="txtemail" id="emailid" placeholder="Địa chỉ email" style="width:350px;" >
	</fieldset>
  </div>  
  <button type="submit" class="btn btn-default" style="background-color:lightblue;" name="sbsignin">Đăng ký</button>
</form>
<?php
require("footer.php");
?>