<?php
        session_start();
        $username = $_SESSION['username'];
        if($username == null){
                echo "<script>alert('Please Log in First');</script>";
                echo "<script>location.href = 'login.php'</script>";
            }
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
        <title>Admin</title>
    </head>
    
    <body>
        <table width = "1000" border = "0">
        <tr>
        <td colspan = "3" style = "background-color: #F0F8FF; text-align: center; height: 100px;">
        <h1 style = "Arial">The Paper Submission System</h1>
        </td></tr>
        
        <tr><td colspan = "3" style = "background-color: #C0C0C0; height: 50px;">Welcome to The Paper Submission System</td></tr>

        <tr>
        <td colspan = "3" style = "text-align: center;">
        <?php
        {
            echo "</br></br>Welcome, ".$username."</br>";
            echo "</br>You can view the paper submitted here.</br></br></br>";
            echo "You can select the author and category.</br></br>";
        }
        ?>
        </td></tr>
        
        <tr>
        <td style = "text-align: right;">Author: </td>
        <td colspan = "2" style = "text-align: left;">
        <form id = "search" name = "search" method = "POST" action = '#'>
        <input type = text name = author id = author></input>
        </td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Category: </td>
        <td colspan = "2" style = "text-align: left;">
        <input type = text name = category id = category></input>
        </td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">&nbsp;</td>
        <td colspan = "2" style = "text-align: left;">
        </br><input type = "submit" value = "search"></br></br>
        </form>
        </td>
        </tr>
        
        <?php
        echo "<tr><td style = 'background-color: #FAEBD7; height: 30px; width: 333px; text-align: center;'> Title </td>
            <td style = 'background-color: #FAEBD7; height: 30px; width: 333px; text-align: center;'> Author </input></td>
            <td style = 'background-color: #FAEBD7; height: 30px; width: 333px; text-align: center;'> Category </td>
            </tr>";

        $author = $_POST['author'];
        $category = $_POST['category'];
  
        
        if($category == null && $author == null){
            $sql = "SELECT PAPERID, PAPERFILE, PAPERTITLE, AUTHORID, CATEGORYNAME FROM Paper";
            $result = $conn->query($sql);
        }
        else if($category != null && $author == null){
            $sql = "SELECT PAPERID, PAPERFILE, PAPERTITLE, AUTHORID, CATEGORYNAME FROM Paper WHERE CATEGORYNAME LIKE '%$category%'";
            $result = $conn->query($sql);
        }
        else if($category == null && $author != null){
            $sql = "SELECT PAPERID, PAPERFILE, PAPERTITLE, AUTHORID, CATEGORYNAME FROM Paper WHERE AUTHORID LIKE '%$author%'";
            $result = $conn->query($sql);
        }
        else{
            $sql = "SELECT PAPERID, PAPERFILE, PAPERTITLE, AUTHORID, CATEGORYNAME FROM Paper WHERE AUTHORID LIKE '%$author%' AND CATEGORYNAME LIKE '%$category%'";
            $result = $conn->query($sql);
        }
        
        while($row = $result -> fetch_assoc()) {
             $paperid = $row["PAPERID"];
             $paperfile = $row["PAPERFILE"];
            echo "<tr><td style = 'background-color: #C0C0C0; height: 20px; text-align: center;'>"."<a href = 'details.php?title=$paperfile'>".$row["PAPERTITLE"]."</a></br><a href = 'changestat.php?paperid=$paperid'>Mark As Reviewed</a></td>
                <td style = 'background-color: #C0C0C0; height: 20px; width: 333px; text-align: center;'>".$row["AUTHORID"]."</input></td>
                <td style = 'background-color: #C0C0C0; height: 20px; width: 333px; text-align: center;'>".$row["CATEGORYNAME"]."</td>
                </tr>";
        }
        $conn->close();
        ?>
       
        
        <tr>
        <td colspan = "3" style = "text-align: center;"></br>You can click the title of each paper to see details.</td>
        </tr>
        <tr>
        <td style =height: 40px; width: 333px; text-align: center;"><a href = "logout.php">Log Out</a></td>
        </tr>
        
        </table>
        
    </body>

</html>