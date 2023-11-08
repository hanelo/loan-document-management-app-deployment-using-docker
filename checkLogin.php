<?php 
session_start();

  if ($_SESSION['loggedIn'])
  { 

  }else
  {
    header("location: index.html"); 
  }
   
?> 