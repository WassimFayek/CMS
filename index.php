<html>
<head>
<meta charset="utf-8">
<title> Client Login </title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
<div class="login">
<h1>Login</h1>
<form action="index.php" method="post">
<label for="username">
<i class="fas fa-user"></i>
</label>
<input type="text" name="user" placeholder="Username" id="username" required>
<label for="password">
<i class="fas fa-lock"></i>
</label>
<input type="password" name="pass" placeholder="Password" id="password" required>
<a href= " forget.php "> forget my password  </a>
<input type="submit" value="Login" name = "log">
</form>
</div>
<center>
<img src="image001.jpg" alt="Mirror Logo" style="width:1100px;height:100px;">
</center>
</body>
<html>
<?php
session_start();
include_once 'connection.php';		
if(isset($_POST['log']))  	 
{
extract($_POST);	 
$s="not";
$Uname = $_POST["user"]; 
$password = $_POST["pass"]; 		
$result1 = mysqli_query($conn,"select * from user");            
while($row = mysqli_fetch_array($result1))
{	 
if($row{'UserName'}==$Uname && $row{'Password'}==$password )
{ 
$_SESSION['user']=$Uname;
$_SESSION['pass']=$password;				
$s="Found";
if($s=="Found")
{	
?>
<script>alert("Click ok to Forwarded\n to another page");
window.location.href='ManageObjects.php';
</script>
<?php
}
}
if($s=="Found") break;			
}			
if($s=="not")  
{
?>
<script>alert("click OK to try again");
window.location.href='index.php';
</script>
<?php
}
}

?>		