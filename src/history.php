<?php
        session_start();
        $username = $_SESSION['username'];
        $servername = "mysql.comp.polyu.edu.hk";
        $dbusername = "14112466d";
        $dbpassword = "ldqpoqjf";
        $dbname = "14112466d";

        // Create connection
        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
?>


<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title>Submission History</title>
    </head>
    
    <body>
        <table width = "1000" border = "0">
        <tr>
        <td colspan = "4" style = "background-color: #F0F8FF; text-align: center; height: 100px;">
        <h1 style = "Arial">The Paper Submission System</h1>
        </td></tr>
        
        <tr><td colspan = "4" style = "background-color: #C0C0C0; height: 50px;">Welcome to The Paper Submission System</td></tr>
        
        <tr>
        <td style = "background-color: #FAEBD7; height: 40px; width: 250px; text-align: center;"><a href = "submit.php">Paper Submission</a></td>
        <td style = "background-color: #FAEBD7; height: 40px; width: 250px; text-align: center;"><a href = "history.php">Submission History</a></td>
        <td style = "background-color: #FAEBD7; height: 40px; width: 250px; text-align: center;"><a href = "personal.php">Personal Information</a></td>
        <td style = "background-color: #FAEBD7; height: 40px; width: 250px; text-align: center;"><a href = "logout.php">Log Out</a></td>
        </tr>

        <tr>
        <td td colspan = "4" style = "text-align: center;">
        <?php
        {
            echo "</br></br>Welcome, ".$username."</br>";
            echo "</br>You can view the paper you have submitted here.</br></br></br>";
        }
        ?>
        </td></tr>
        
        
        <?php
        $sql = "SELECT PAPERTITLE, PAPERFILE, AUTHORID, CATEGORYNAME, PAPERID FROM Paper WHERE SUBMITTERID = '$username'";
        $result = $conn->query($sql);   
            
        echo "<tr><td style = 'background-color: #FAEBD7; height: 30px; text-align: center;'> Title </td>
            <td style = 'background-color: #FAEBD7; height: 30px; text-align: center;'> PaperID </td>
            <td style = 'background-color: #FAEBD7; height: 30px; text-align: center;'> Author </input></td>
            <td style = 'background-color: #FAEBD7; height: 30px; text-align: center;'> Category </td>
            </tr>";
        
        while($row = $result->fetch_assoc()) {
            $id = $row["PAPERID"];
            $paperfile = $row["PAPERFILE"];
            echo "<tr><td style = 'background-color: #C0C0C0; height: 20px; text-align: center;'>"."<a href = 'details.php?title=$paperfile'>".$row["PAPERTITLE"]."</a></br><a href = 'submitchange.php?id=$id'>edit</a>"."   "."<a href = 'delete.php?title=$title'>delete</a></td>
                <td style = 'background-color: #C0C0C0; height: 20px; text-align: center;'>".$row["PAPERID"]."</input></td>
                <td style = 'background-color: #C0C0C0; height: 20px; text-align: center;'>".$row["AUTHORID"]."</input></td>
                <td style = 'background-color: #C0C0C0; height: 20px; text-align: center;'>".$row["CATEGORYNAME"]."</td>
                </tr>";
        }
        $conn->close();
        ?>
       
        
        <tr>
        <td colspan = "3" style = "text-align: center;"></br>You can click the title of each paper to see details.</td>
        </tr>
        
        </table>
        
    </body>

</html>