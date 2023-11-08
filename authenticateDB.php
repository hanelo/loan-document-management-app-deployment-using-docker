<?php      
    session_start();
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "login";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) 
    {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
        echo '<script>alert("mysqli_connect_error()")</script>';
    } 

    
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
      
        $sql = "select *from logininfo where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1)
        {  
            $_SESSION['loggedIn'] = true;
            header('Location: loanPage.php');
        }  
        else
        {  
            $_SESSION['loggedIn'] = false;
            echo "<h1> invalid username or password.</h1>";
            header( "refresh:1;url = index.html" );
        }
