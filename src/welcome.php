<?php
    session_start();
    $username = $_SESSION['username'];
?>


<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title>Welcome</title>
    </head>
    
    <body>
        <table width = "1000" border = "0">
        <tr>
        <td colspan = "4" style = "background-color: #F0F8FF; text-align: center; height: 100px;">
        <h1 style = "Arial">The Paper Submission System</h1>
        </td></tr>
        
        <tr><td colspan = "4" style = "background-color: #C0C0C0; height: 50px;">Welcome to The Paper Submission System</td></tr>
        
        <tr>
        <td style = "background-color: #FAEBD7; height: 40px; width: 333px; text-align: center;"><a href = "submit.php">Paper Submission</a></td>
        <td style = "background-color: #FAEBD7; height: 40px; width: 333px; text-align: center;"><a href = "history.php">Submission History</a></td>
        <td style = "background-color: #FAEBD7; height: 40px; width: 333px; text-align: center;"><a href = "personal.php">Personal Information</a></td>
        <td style = "background-color: #FAEBD7; height: 40px; width: 333px; text-align: center;"><a href = "logout.php">Log Out</a></td>
        </tr>
        
        <tr>
        <td style = "text-align: center;"></br>&nbsp;</td>
        <td style = "text-align: left;">
        <?php
        {
            
            echo "</br></br>Welcome, ".$username."</br>";
            echo "</br>You can choose what you want to do.";
        }
        ?>
        </td></tr></table>
        
    </body>

</html>