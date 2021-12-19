<?php
require("header.php");
?>
<?php	
unset($_SESSION["username"]);
session_destroy();
header("Location:index.php");
?>

<?php
require("footer.php");
?>