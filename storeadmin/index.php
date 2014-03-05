<?php
session_start();
if(!isset($_SESSION["manager"])){
	header("location: admin_login.php");
	exit();
}

$managerID = preg_replace('#[^0-9]#i,', $_SESSION["id"]);
$manager = preg_replace('#[^A-Za-z0-9]#i,', $_SESSION["manager"]);
$password = preg_replace('#[^A-Za-z0-9]#i,', $_SESSION["password"]);
	
include "../storescripts/connect_to_mysql.php";
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");
$existCount = mysql_num_rows($sql);

if($existCount == 0){
	echo "Your login session is invalid";
	exit();
	}
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Admin</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen">

</head>

<body class="footer">
<div align="center" id="mainWrapper">
  <?php include_once("../template_header.php");?>
</div>
<div id="pageContent">
     
      </div>
      
<div align="left" style="margin-left:24px;">
         <h2>Hello store manager, what would you like to do today?</h2>
      <ol>
      	<li>Manage Inventory</li>
      <li>Other</li>
      </ol>
  	</div>
<?php include_once("../template_footer.php");?>
    

</body>
</html>