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
        <title>Submission</title>
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

        <form id = "submission" name = "submission" method = "POST" enctype="multipart/form-data" action="#">
        
        <tr>
        <td style = "text-align: center;"></br>&nbsp;</td>
        <td style = "text-align: left;">
        <?php
        {
            echo "</br></br>Welcome, ".$username."</br>";
            echo "</br>You can submit your paper here.</br></br></br>";
        }
        ?>
        </td></tr>
        
        <tr>
        <td style = "text-align: right;">Title: </td>
        <td style = "text-align: left;"><input name = title type = text id = title required></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Category: </td>
        <td style = "text-align: left;"><input name = category type = text id = category required></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">&nbsp;</td>
        <td style = "text-align: left;">Please enter the category(s) and split with semicolon.</td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Author: </td>
        <td style = "text-align: left;"><input name = author type = text id = author required></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">&nbsp;</td>
        <td style = "text-align: left;">Please enter the username(s) of the author(s) and split with semicolon.</td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Date: </td>
        <td style = "text-align: left;"><input name = date type = text id = date required></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: center;"></br>&nbsp;</td>
        <td style = "text-align: left;">(DD/MM/YYYY)</td>
        </tr>
        
        <tr>
        <td style = "text-align: center;"></br>&nbsp;</td>
        <td style = "text-align: left;"></br></br><input type = file name = file id = file required></br></td>
        </tr>
        
        <tr>
        <td style = "text-align: center;"></br>&nbsp;</td>
        <td style = "text-align: left;"></br><input type = "submit" value = "Confirm"></td>
        </form>
        </tr>
        
        </table>
        
        <?php
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $filename = $_FILES["file"]["name"];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $date = $_POST['date'];
        $paperid = uniqid();
        
        if($title != "" && $author != "" && $category != "" && $date != "" && $_FILES["file"]["tmp_name"] != null){
            $sql = "INSERT INTO Paper(PAPERID, PAPERTITLE, CATEGORYNAME, PAPERFILE, SUBMITTERID, AUTHORID, SUBMITDATE)
            VALUES('$paperid', '$title', '$category', '$filename', '$username', '$author', '$date')";
            $conn->query($sql);
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
                echo "<script>alert('Submit Success');</script>";
            }
            echo "<script>location.href = 'welcome.php'</script>";
            $conn->close();
        }

        ?>
    </body>

</html>