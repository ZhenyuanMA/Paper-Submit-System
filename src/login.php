<?php
        session_unset(); 
        session_start();
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
        <title>Log In</title>
    </head>
    
    <body>
         
        <table width = "1000" border = "0">
        <tr>
        <td colspan = "2" style = "background-color: #F0F8FF; text-align: center; height: 100px;">
        <h1 style = "Arial">The Paper Submission System</h1>
        </td></tr>
        
        <tr><td colspan = "2" style = "background-color: #C0C0C0; height: 50px;">Welcome to The Paper Submission System</td></tr>
        <tr><td colspan = "2" style = "height: 50px; text-align: center;"></br>Sign in with your username and password:</br></br></tr>
        
        <form class="form-horizontal" role="form" id = "login" name = "login" method = "post" action = "#">
        
        <tr>
        <td style = "text-align: right; width: 500px;">Username: </td>
        <td style = "text-align: left; width: 500px;"><input name = username type = text id = username></input></td>
        </tr>
        
        <tr>
        <td style = "text-align: right; width: 500px;">Password: </td>
        <td style = "text-align: left; width: 500px;"><input name = password type = password id = password></input></td>
        </tr>

        <tr style = "text-align: center;"><td colspan = "2"><input type = "submit" value = "Login"></br></br>
        </form>
        
        New to the system? <a href = "register.php">Register Now!</a>
        
        </td></tr>
        </table>
        
         <?php
         
        $sql = "SELECT AUTHORID, USERPASS FROM PeopleInfo";
        $result = $conn->query($sql);
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row["AUTHORID"] != ""){
                $userid = $row["AUTHORID"];
                $userpass = $row["USERPASS"];
                    if($username == $userid && $password == $userpass){
                        $_SESSION['username'] = $username;
                        $_SESSION['usertype'] = "user";
                        echo "<script>location.href = 'welcome.php'</script>";
                    }
                }
            }
        }
        
        $sql = "SELECT REVIEWERID, USERPASS FROM PeopleInfo";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row["REVIEWERID"] != ""){
                $userid = $row["REVIEWERID"];
                $userpass = $row["USERPASS"];
                    if($username == $userid && $password == $userpass){
                        $_SESSION['username'] = $username;
                        $_SESSION['usertype'] = "admin";
                        echo "<script>location.href = 'admin.php'</script>";
                    }
                }
            }
            if($username != null && $password != null)
                echo "<script>alert('Sorry, the username and password combination you entered is incorrect. Please try again.');</script>";
        }
        else if($username != "" && $password != "")
            echo "<script>alert('Sorry, the username and password combination you entered is incorrect. Please try again.');</script>";
        $conn->close();
        
        echo "Sample user account: test<br>
        Password: password<br><br>
        Sample admin account: admin<br>
        Password: admin";
        ?>
        
        
    </body>

</html>