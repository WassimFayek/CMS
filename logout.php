<?php
include_once'connection.php';
session_start();
if(session_destroy())
{
header("Location: index.php");
}





?>