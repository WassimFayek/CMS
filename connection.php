<?php
		
           $username="root";
           $hostname="127.0.0.1";
           $dbname="cms";
          // $password="";
         //Connection to the database
         $conn = new mysqli($hostname,$username)
         or die ("unable to connect to Mysql");
        

          //select a database to work with
        $selected = mysqli_select_db($conn,$dbname)
         or die ("Could not select examples");

?>