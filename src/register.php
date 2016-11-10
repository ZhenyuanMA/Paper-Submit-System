<?php
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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Register</title>
    </head>

    <body>
        <table width="1000" border="0">
        <tr>
        <td colspan="2" style="background-color: #F0F8FF; text-align: center; height: 100px;">
        <h1 style = "Arial">The Paper Submission System</h1>
        </td></tr>

        <tr><td colspan="2" style="background-color: #C0C0C0; height: 50px">Welcome to The Paper Submission System</td></tr>
        <tr><td colspan="2" style="height: 50px; text-align: left"></br>Please enter your account information: </br></br></tr>

        <form id = "register" name = "register" method = "POST" action="#">

        <tr>
        <td style=" text-align: center; width: 100px">Username: </td>
        <td style=" text-align: left; width: 500px"><input name = username type = text id = username required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Password: </td>
        <td style=" text-align: left; width: 500px"><input name = password type = password id = password required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Confirm Password: </td>
        <td style=" text-align: left; width: 500px"><input name = cpassword type = password id = cpassword required></input></td>
        </tr>

        <tr><td>&nbsp;</br></td><td>&nbsp;</td></tr>

        <tr>
        <td style=" text-align: center; width: 100px">First Name: </td>
        <td style=" text-align: left; width: 500px"><input name = firstname type = text id = firstname required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Last Name: </td>
        <td style=" text-align: left; width: 500px"><input name = lastname type = text id = lastname required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Age: </td>
        <td style=" text-align: left; width: 500px"><input name = age type = int id = age required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Title: </td>
        <td style=" text-align: left; width: 500px"><input name = title type = radio id = title value = Mr>Mr.</input><input name = title type = radio id = title value = Ms>Ms.</input><input name = title type = radio id = title value = Miss>Miss.</input><input name = title type = radio id = title value = Dr>Dr.</input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Address: </td>
        <td style=" text-align: left; width: 500px"><input name = address type = text id = address required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">City: </td>
        <td style=" text-align: left; width: 500px"><input name = city type = text id = city required></input></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Country: </td>
        <td style=" text-align: left; width: 500px"><input name = country type = text id = country required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Department: </td>
        <td style=" text-align: left; width: 500px"><input name = department type = text id = department required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Company: </td>
        <td style=" text-align: left; width: 500px"><input name = company type = text id = company required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Phone Number: </td>
        <td style=" text-align: left; width: 500px"><input name = phonenum type = text id = phonenum required></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px">Fax Number: </td>
        <td style=" text-align: left; width: 500px"><input name = faxnum type = text id = faxnumrequired></input></td>
        </tr>

        <tr>
        <td style=" text-align: center; width: 100px"><input type = "submit" value = "Confirm"></td>
        <td style=" text-align: left; width: 500px"></br><input type = "button" value = "Cancel" onclick = "window.location.href='login.php"></td>
        </form>
        </tr>
        

        <?php
        
        
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST["cpassword"];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = intval($_POST['age']);
        $title = $_POST['title'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $department = $_POST['department'];
        $company = $_POST['company'];
        $phonenum = intval($_POST['phonenum']);
        $faxnum = intval($_POST['faxnum']);
        
    
            if($username == "admin"){
                echo "<script>alert('Sorry, the username exists. Please try again.');</script>";
            }
            else if($password != $cpassword){
                echo "<script>alert('Sorry, the two password are not the same. Please try again.');</script>";
            }
            else if($username != "" && $password != "" && $cpassword != ""){
                $sql = "INSERT INTO PeopleInfo(USERID, AUTHORID, USERPASS, TITLE, FNAME, LNAME, AGE, ADDRESS, CITY, COUNTRY, DEPARTMENT, COMPANY, PHONENUM, FAXNUM)
                VALUES('$username', '$username', '$password', '$title', '$firstname', '$lastname', $age, '$address', '$city', '$country', '$department', '$company', $phonenum, $faxnum)";
                $conn->query($sql);
                
                session_start();
                $_SESSION['username'] = $username;
                echo "<script>location.href = 'welcome.php'</script>";
                $conn -> close();
            }
        ?>

    </body>

</html>

