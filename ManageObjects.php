<html>
<head>
<title>
</title>
<link href="TableDesign.css" rel="stylesheet" type="text/css">
<style>
</style>
</head>
<body>
    <ul>
        <li style="float:right"><a class="active" href="logout.php">LOGOUT</a> </li>
</ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">   
</script>

<?php
include_once 'connection.php';
$query = " select * from profile ";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result)){
echo "
<form id ='myform' action= 'ManageObjects.php' method='post'>
<div class='table-users'>
   <div class='header'>PROFILES</div> 
<center><table border = 4  >
<th>IMAGE </th>
<th>PROFILE TAG </th>
<th> DESCRIPTION </th>
<th>INFORMATION </th>
<th>VERIFIED </th>
<th>FOLLOWED BRANDS </th>

";
while($row= mysqli_fetch_array($result)){
echo " 
<tr>
<td> <a href='view.php?ppid= $row[profileID]'> <img src='$row[image]' </td></a>
<td> $row[tag] </td>
<td> $row[Description] </td>
<td> $row[profileInfo] </td>  <td>";
$query1 = "select followerid from followers where userid = $row[profileID]";
$result1 = mysqli_query($conn,$query1);
if(mysqli_num_rows($result1)){
while($row1 = mysqli_fetch_array($result1)){    
$query2="select profileInfo from profile where profileID = $row1[followerid] and verified = 'yes'";
$result2 = mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)){
while($row2 = mysqli_fetch_array($result2)){
echo"  $row2[profileInfo] ,";
}
}        
}}
echo"</td> <td>";
$query3 = "select BrandName from followers , brands  where userid = $row[profileID] and followers.brandid = brands.BrandID";
$result3 = mysqli_query($conn,$query3);
if(mysqli_num_rows($result3)){
    while($row3 = mysqli_fetch_array($result3)){
        echo" $row3[BrandName],";
    }
}


}
}
echo" </table></div> </center>";
echo"</form>";
extract($_POST);
?>
<br>
<center><img src="image001.jpg" alt="Mirror Logo" style="width:1100px;height:100px;"></center>
<br><br>
<?php
$bquery = " select * from brands ";
$resultb = mysqli_query($conn, $bquery);
if(mysqli_num_rows($resultb)){
echo "
<form id ='myform' action= 'ManageObjects.php' method='post'>
<div class='table-users'>
   <div class='header'>BRANDS</div> 
<center><table border = 4  >
<th>LOGO </th>
<th>BRAND NAME</th>
<th> PATTERN </th>
<th>Followers </th>
";
while($brow= mysqli_fetch_array($resultb)){
echo " 
<tr>
<td> <a href='view.php?ppid= $brow[BrandID]'> <img src='$brow[logo]' </td></a>
<td> $brow[BrandName] </td>
<td> $brow[Pattern] </td>
<td>";
$bquery1 = "select count(brandid) from followers where brandid = $brow[BrandID]";
$bresult1 = mysqli_query($conn,$bquery1);
while($brow1 = mysqli_fetch_row($bresult1)){    
$count = $brow1[0];
echo$count;
}        
}}
echo"</td>";


echo" </table></div> </center>";
echo"</form>";
?><br><br><br>
<center>
<div>
<h1> Assign A New User Here!</h1>
<form method ="post" action = "ManageObjects.php" >
<input type = "text" placeholder="UserName" name = "un" value ="" required><br>
<input type = "Email" name = "email" placeholder="Email"  value ="" required><br>
<input type = "text" name = "pass" placeholder="password" value ="" required><br>
<input type = "submit" name ="AddUser" value = "ADD USER"><br>
</form>
</div>
</center>
<?php 
include_once'connection.php';
extract($_POST);
if(isset($_POST['AddUser'])){
   $add = "Insert Into user(UserId,UserName,Email,Password)
   VALUES
   (0,'$un','$email','$pass')" ;
  if(!mysqli_query($conn,$add))
  {
      die('Error :' .mysqli_error($conn));
  }
  else{ ?>
      <script> alert("successfully Added");
      window.location.href='ManageObjects.php ';
      </script>
      <?php
  }
}





?>
</body>
</html>