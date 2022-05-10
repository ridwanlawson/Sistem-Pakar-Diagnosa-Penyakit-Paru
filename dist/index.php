<?php 

  session_start();
  if(!isset($_SESSION['uname'])&&!empty($_SESSION['uname'])){ 
    header("location:../../index.php");
  }else{
  	header("location:home.php");
  }

 ?>