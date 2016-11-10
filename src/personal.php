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
        <title>Personal Information</title>
    </head>
    
    <body>
        <?php
            $sql = "SELECT FNAME, LNAME, TITLE, ADDRESS, CITY, COUNTRY, DEPARTMENT, COMPANY, PHONENUM, FAXNUM FROM PeopleInfo WHERE AUTHORID = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $firstname = $row["FNAME"];
                $lastname = $row["LNAME"];
                $title = $row["TITLE"];
                $address = $row["ADDRESS"];
                $city = $row["CITY"];
                $country = $row["COUNTRY"];
                $department = $row["DEPARTMENT"];
                $company = $row["COMPANY"];
                $phonenum = $row["PHONENUM"];
                $faxnum = $row["FAXNUM"];
        }
        $conn->close();
        ?>
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
        <td td colspan = "3" style = "text-align: center;">
        <?php
        {
            echo "</br></br>Welcome, ".$username."</br>";
            echo "</br>Here is your personal information.</br></br></br>";
        }
        ?>
        </td></tr>
        
        <tr>
        <td style = "text-align: right;">First Name: </td>
        <td style = "text-align: left;"><?php echo $firstname; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Last Name: </td>
        <td style = "text-align: left;"><?php echo $lastname; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Title: </td>
        <td style = "text-align: left;"><?php echo $title; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;"></br>Address: </td>
        <td style = "text-align: left;"><?php echo "</br>".$address; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">City: </td>
        <td style = "text-align: left;"><?php echo $city; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Country: </td>
        <td style = "text-align: left;"><?php echo $country; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Department: </td>
        <td style = "text-align: left;"><?php echo $department; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Company: </td>
        <td style = "text-align: left;"><?php echo $company; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Phone Number</td>
        <td style = "text-align: left;"><?php echo $phonenum; ?></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right;">Fax Number: </td>
        <td style = "text-align: left;"><?php echo $faxnum; ?></input></td>
        </tr>
        
        <tr>
        <td colspan = "3" style = "text-align: center;"></br>If you want to change your personal information, please <a href = "infochange.php">click here</a> .</td>
        </form>
        </tr>
        
        </form>
        </table>
        
    </body>

</html>