<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'connection.php';
$email = $_POST["email"];
$password = $_POST["password"];

$query = "select password from users where email='$email';";
$result = mysqli_query($conn,$query);
$login_status=false;
$user_exist=false;
if( mysqli_num_rows($result) > 0 ){
    $user_exist=true;
    $row = mysqli_fetch_assoc($result);
    $db_password = $row["password"];
    if($db_password == $password ){
        $login_status=true;
        $_SESSION["user_email"] = $email;
    }
    else{
        $login_status=false;
    }
}
else{
    $user_exist=false;
}
?>
<html>
<body>
    <script>
    const logged = <?php echo json_encode($login_status); ?>;
    const exist = <?php echo json_encode($user_exist); ?>;
    if(logged){
      window.location.href = "myacc.html";
    }
    else {
        if(exist){
            alert("Invalid login credentials.");
            window.location.href = "login.php";
        }
        else{
            window.location.href = "signup.php";
        }
    }
  </script>
</body>
</html>

