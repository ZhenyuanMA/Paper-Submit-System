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
        
        $paperid = $_GET['id'];

        $sql = "UPDATE Paper SET REVIEWSTATUS = '1' WHERE PAPERID = '$paperid'";
        if($conn->query($sql)){
            echo "<script>alert('Change Status Success');</script>";
        }   
        echo "<script>location.href = 'admin.php'</script>";
        $conn -> close();
?>
