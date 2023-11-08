<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page</title>
</head>
 
<body>
    <center>
        <?php
        include('checkLogin.php');
        $host = "localhost";  
        $user = "root";  
        $password = '';  
        $db_name = "loanp";  
          
        $con = mysqli_connect($host, $user, $password, $db_name);  
         
        
        $Name =  $_REQUEST['name'];
        $Age = $_REQUEST['age'];
        $PersonID =  $_REQUEST['personID'];
        $Occupation =  $_REQUEST['occupation'];
        $BookID = $_REQUEST['bookID'];
        $BookTitle =  $_REQUEST['bookTitle'];
        $BookAuthor =  $_REQUEST['bookAuthor'];
        $BookType = $_REQUEST['bookType'];
        $LoanDate =  $_REQUEST['loanDate'];
        $ReturnDate =  $_REQUEST['returnDate'];

        

       

         
        
        $sql = "INSERT INTO loaninfo  VALUES ('$Name','$PersonID','$Occupation', '$Age', '$BookID','$BookTitle','$BookType', '$BookAuthor', '$LoanDate', '$ReturnDate')";
         
        if(mysqli_query($con, $sql))
        {
            header('Location: loanPage.php');
            
            
        }else
        {
            
        }
         
        mysqli_close($con);
        ?>
    </center>
</body>


 
</html>