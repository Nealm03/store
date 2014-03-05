<?php
session_start();
if(!isset($_SESSION["manager"])){
	header("location: admin_login.php");
	exit();
}
?>
<?php
//parse login form if the user presses login
if(isset($_POST["username"])&& issets($_POST["username"])){
	
	$manager = preg_replace('#[^A-Za-z0-9]#i,', $_SESSION["manager"]);
	$password = preg_replace('#[^A-Za-z0-9]#i,', $_SESSION["password"]);
//connect to db
include "../storescripts/connect_to_mysql.php";
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");
//ensures record exists
$existCount = mysql_num_rows($sql);
if($existCount == 1){
	while($row = mysql_fetch_array($sql));
		$id = $row["id"];
}
	$_SESSION["id"] = $id;
	$_SESSION["manager"] = $manager;
	$_SESSION["password"]  = $password;
	header("location: index.php");
	exit();
} else {
	echo 'Wrong login information. Please try again <a href="index.php">Click Here</a>';
	exit();
}

	
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title> Admin</title>

<link rel="stylesheet" href="../style/style.css" type="	media="screen">
</head>

<body>
<div align="center" id="mainWrapper">
	<?php include_once("../template_header.php");?>
    <div id="pageContent"><br />
    	<div align="left style="margin-left:24px;">
        	<h2>Please log in to manage the store</h2>
           	<form id="form1" name="form1" method="post" action="admin_login.php">User name<br/>
            <input name= "username" type="text" id="username" size="40"/>
            <br /><br />Password:<br />
     <input name="password" type="password" id="password" size="40"/>
     <br />
     <br />
     <br />
     	<input type="submit" name="button" id="button" value="log in" />
       
        </form>
        <p>&nbsp; </p>
        </div>
        <br />
        <br />
        <br />
        </div>
        <?php include_once("../template_footer.php"); 
		?>
        
        </div>
        </body>
        </html>
            
    
	
	