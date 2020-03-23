<html>
<head>
<link href="TableDesign.css" rel="stylesheet" type="text/css">
</head>
<style>
input[type=text]{
width:50%;
border:2px solid #aaa;
border-radius:4px;
margin:8px 0;
outline:none;
padding:8px;
box-sizing:border-box;
teansition:3s;
text-align:center;
} 
input[type=text]:focus{
    border-color:dodgerBlue;
    box-shadow:0 0 8px 0 dodgerBlue;
}
input[type=text]:hover{
    border-color:dodgerBlue;
    box-shadow:0 0 8px 0 dodgerBlue;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
input[type=submit] {
  width: 50%;
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: gray;
}
</style>
<body>
<ul>
        <li style="float:right"><a class="active" href="logout.php">LOGOUT</a> </li>
</ul>
<center>
<img src="image001.jpg" alt="Mirror Logo" style="width:1100px;height:100px;">
<div>
<form method ="post" action = "view.php" >
<?php
session_start();
include'connection.php';
$r = $_GET['ppid'];
?>
<input type = "hidden" name ="sid" value = '<?php echo $r?>'>
<?php
extract($_POST);
if(isset($_POST['delete'])){
   $query2 = "Delete from profile where  profileID = '$sid'" ;
  if(!mysqli_query($conn,$query2))
  {
      die('Error :' .mysqli_error($conn));
  }
  else{ ?>
      <script> alert("successfully Deleted");
      window.location.href='ManageObjects.php ';
      </script>
      <?php
  }
}
else if(isset($_POST['update'])){
   $query1 = "update profile set 
   profileInfo =' $pInfo' , Description = '$Des' , tag = '$tagg' 
   where profileID = $sid";
   if(!mysqli_query($conn,$query1))
   {
       die('Error :' .mysqli_error($conn));
   }
   else
   {
       ?>
       <script> alert(" the record updated");
       window.location.href='ManageObjects.php';
        </script>
        <?php
   }
}
$query = " select * from profile where profileID = $r ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)){
while($row = mysqli_fetch_array($result)){
echo"
<input type = 'text' placeholder='$row[profileInfo]' name = 'pInfo' value =' $row[profileInfo]'>
<input type = 'text' name = 'Des' value =' $row[Description]'>
<input type = 'text' name = 'tagg' value =' $row[tag]'>
<input type = 'submit' name ='update' value = 'Update Data'>
<input type = 'submit' name ='delete' value = 'Delete'>
";
}
}
 echo"</form>"; 
?>
</div>
</center>
</body>
</html>