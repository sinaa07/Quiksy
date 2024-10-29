<?php
include 'connection.php';
$email = $_POST["name"];
$password = $_POST["password"];

$query = "select password from users where email='$email';"
$result = mysqli_query($connect,$query);
$login_status=false;
if( mysqli_num_rows($result) > 0 ){
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
    echo "No user found.";
}
?>
<html>
<body>
    <script>
    const logged= <?php echo json_encode($login_status); ?>
    if(logged){
      window.location.href(myacc.html);
    }
    else {
            alert("Invalid login credentials.");
        }
  </script>
</body>
</html>

