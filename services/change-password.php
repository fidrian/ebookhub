<?php
session_start();
function connectDB() {
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12313869";
    $password = "qy1jlUjdiy";
    $dbname = "sql12313869";
  
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    // Check connection
    if (!$conn) {
      die("Connection failed: " + mysqli_connect_error());
    }
    return $conn;
}

$user = $_SESSION['user_id'];

if ($user){
//user is logged in
    if (isset($_POST["submit"])){
        //check fields
        $conn = connectDB();
        $oldpassword = $_POST['PassOld'];
        $newpassword = $_POST['PassNew'];
        $repeatnewpassword = $_POST['PassConfirm'];
        //check password against db
        $queryget = mysqli_query($conn, "SELECT password FROM user WHERE user_id='$user'");
        $row = mysqli_fetch_assoc($queryget);
        $oldpassworddb = $row['password'];
        //check passwords
        if($oldpassword==$oldpassworddb){
            //check the new password
            if ($newpassword==$repeatnewpassword){
            //change password in db
            $sql = "UPDATE user SET password='$newpassword' WHERE user_id='$user'";
                if($result = mysqli_query($conn, $sql)) {
                    header("Location: ../edit-password.php");
                }
            }
            else{
                die ("New password doesn't match!");
            }
        }
        else{
            die("Old password doesn't match!");
        } 
    }
}
else{
    die ("You must be logged in to change your password");
}    
?>
