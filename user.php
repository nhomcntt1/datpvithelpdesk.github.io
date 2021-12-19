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
</style>
<?php
if(isset($_POST['sbsua']))
{
	$users=$_POST['txtuser'];
	$fullnames=$_POST['txtname'];
	$emails=$_POST['txtemail'];
	$sql="UPDATE tbluser SET Fullname='$fullnames', Email='$emails' WHERE Username = '$users'";
	$conn->query($sql);
}
if(isset($_REQUEST['edit']))
{
	$user=$_REQUEST['edit'];
	$sql= "SELECT * FROM tbluser WHERE Username='$user'";
	$result = $conn->query($sql);
	
	if($result->num_rows >0)
	{
		$row=$result->fetch_assoc();
		$fullname=$row['Fullname'];
		$email=$row['Email'];
	}
}
if(isset($_REQUEST['del']))
{
	$userd=$_REQUEST['del'];
	$sql= "DELETE FROM tbluser WHERE Username='$userd'";
	$result = $conn->query($sql);
}
?>
<form action="" method=post name=f1 onsubmit="return check();">
  <div class="form-group">
    <label for="Giatri">Username: </label>
    <input type="text" class="form-control" name="txtuser" id="userid" style="width:200px;" value="<?php echo @$user;?>"<?php if(isset($_REQUEST['edit'])){ echo 'ReadOnly';} ?>>
	<label for="Giatri">Fullname: </label>
    <input type="text" class="form-control" name="txtname" id="nameid" style="width:300px;" value="<?php echo @$fullname;?>">
	<label for="Giatri">Email: </label>
    <input type="text" class="form-control" name="txtemail" id="emailid" style="width:350px;" value="<?php echo @$email;?>">
  </div>  
  <button type="submit" class="btn btn-default" style="background-color:lightblue;" name="sbsua">Lưu</button>
</form>
<?php
if(!isset($_SESSION["username"]))
{
	echo "<script language='javascript'> alert ('Bạn không có quyển truy cập!!!'); window.location='index.php';</script>";
}
?>
<table class='table'><tr id=t1><td colspan=5 align=center>Bảng người dùng</td></tr>
<tr id=t1><td>Tên đăng nhập</td><td>Họ và tên</td><td>Email</td><td>Sửa</td><td>Xóa</td></tr><tbody>
<?php
$sql = "SELECT Username, Fullname, Email FROM tbluser";
$result =$conn->query($sql);

if ($result->num_rows > 0) {
		
    // output dữ liệu trên trang
    while($row = $result->fetch_assoc()) {
		
	echo "<tr>";
        echo "<td>" . $row["Username"]. "</td><td>" . $row["Fullname"]."</td><td>"
            . $row["Email"] ."</td>";?>
			<td>
				<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?edit=<?php echo $row['Username'];?>">Sửa</a></td>
			<td><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?del=<?php echo $row['Username'];?>" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</a></td>
<?php			
	echo "</tr>";
    }
} else {
    echo "0 results";
}
echo "</tbody></table>";
?>
<?php
require("footer.php");
?>