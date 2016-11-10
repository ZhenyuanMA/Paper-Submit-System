<?php
        session_start();
        $username = $_SESSION['username'];
        $usertype = $_SESSION['usertype'];
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
        <title>Personal Information</title>
    </head>
    
    <body>
        <?php
        {
            $title = $_GET['title'];
            echo $title;
            $file = fopen("upload/".$title, "r") or fopen("upload/".$title, "r") or die("Unable to open file!");
            $filesize = filesize("upload/".$title) or filesize("upload/".$title);
            $sql = "SELECT AUTHORID, CATEGORYNAME, SUBMITDATE, REVIEWSTATUS, REVIEWERID WHERE PAPERFILE = '$title'";
            $result = $conn -> query($sql);
            $row = $result->fetch_assoc()
            $author = $row['AUTHORID'];
            $category = $row['CATEGORYNAME'];
            $submitdate = $row['SUBMITDATE'];
            if($row['REVIEWSTATUS'] == 0){
            $reviewstatus = "Not reviewed";}
            else{
                $reviewstatus = "Reviewed";
            }
            $reviewid = $row['REVIEWERID'];
        }
        ?>
        <table width = "1000" border = "0">
        <tr>
        <td colspan = "2" style = "background-color: #F0F8FF; text-align: center; height: 100px;">
        <h1 style = "Arial">The Paper Submission System</h1>
        </td></tr>
        
        <tr><td colspan = "2" style = "background-color: #C0C0C0; height: 50px;">Welcome to The Paper Submission System</td></tr>
        
        <tr>
        <td colspan = "2" style = 'background-color: #FAEBD7; height: 30px; text-align: center;'>Paper Details</td>
        </tr>
        
        <tr>
        <td style = 'text-align: right; width: 100px;'></br></br>Title: </td>
        <td style = 'text-align: left; width: 300px;'></br></br><?php echo $title; ?></td>
        </tr>
        
        <tr>
        <td style = 'text-align: right; width: 100px;'>Author: </td>
        <td style = 'text-align: left; width: 300px;'><?php echo $author; ?></td>
        </tr>
        
        <tr>
        <td style = 'text-align: right; width: 100px;'>Category: </td>
        <td style = 'text-align: left; width: 300px;'><?php echo $category; ?></td>
        </tr>
        
        <tr>
        <td style = 'text-align: right; width: 100px;'>Date: </td>
        <td style = 'text-align: left; width: 300px;'><?php echo $submitdate; ?></td>
        </tr>
        
        <tr>
        <td style = 'text-align: right; width: 100px;'></br>Status: </td>
        <td style = 'text-align: left; width: 300px;'></br><?php echo $reviewstatus; ?></td>
        </tr>
        
        <tr>
        <td style = 'text-align: right; width: 100px;'>Reviewer: </td>
        <td style = 'text-align: left; width: 300px;'><?php echo $reviewerid; ?></td>
        </tr>
        <tr>
        <td style = 'text-align: right; width: 600px;'></br></br>Preview: </br></td>
        <td style = 'text-align: center; width: 600px;'></br></br><?php echo fread($file, $filesize); ?></td>
        </tr>
        
        </table>
        
        <?php fclose($file); ?>
    </body>

</html>