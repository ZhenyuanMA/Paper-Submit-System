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
        
        $papertitle = $_GET['title'];

        $sql = "DELETE FROM Paper WHERE PAPERTITLE = '$papertitle'";
        if($conn->query($sql)){
            echo "<script>alert('Delete Success');</script>";
        }   
        echo "<script>location.href = 'welcome.php'</script>";
        $conn -> close();
?>
