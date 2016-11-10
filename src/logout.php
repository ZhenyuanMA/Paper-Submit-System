<?php
        session_start();
        if(session_destroy()){
            echo "<script>alert('Log out successfull! Taking you to the main page now');</script>";
            echo "<script>location.href = 'login.php'</script>";
        }
?>