<html>
<head>
<title>
</title>
<link href="TableDesign.css" rel="stylesheet" type="text/css">
<style>
</style>
</head>
<body>
<center>
<div>
<form method ="post" action = "forget.php" >
 <h1>support us with your profile Information</h1>
<input type = "text" placeholder="UserName" name = "un" value ="" required><br>
<input type = "Email" name = "email" placeholder="Email"  value ="" required><br>
<input type = "text" name = "pass" placeholder="your old password" value ="" required><br>
<input type = "submit" name ="reset" value = "RESET"><br>
</form>
</div>
</center>
<?php
extract($_POST);
include_once'connection.php';
if(isset($_POST['reset'])){
$alldat=" select * from user" ;
$result = mysqli_query($conn,$alldat);
if(mysqli_num_rows($result)){
while($row= mysqli_fetch_array($result)){
if($row['UserName'] == $un){
    if($row['Email']== $email){
$update = "update user set Password = $pass  where Email = '$email'";
if(!mysqli_query($conn,$update))
   {
       die('Error :' .mysqli_error($conn));
   }
   else
   {
       ?>
       <script> alert(" You have a New Password Now!!");
       window.location.href='index.php';
        </script>
        <?php
   }


}
}
}
}
}


?>
</body>
</html>