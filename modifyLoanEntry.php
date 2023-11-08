<?php
include('checkLogin.php');
$id = $_POST['bookID'];  
$host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "loanp";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) 
    {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
        echo '<script>alert("mysqli_connect_error()")</script>';
    } 
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  mysqli_query($con,"DELETE FROM loaninfo WHERE BookID='$id'");
  header('Location: loanPage.php');
  

  
mysqli_close($con);
?>