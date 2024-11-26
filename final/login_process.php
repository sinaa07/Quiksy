<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';
$email = $_POST["email"];
$password = $_POST["password"];

$query = "select * from users where email='$email';";
$result = mysqli_query($conn,$query);

$login_status=false;
$user_exist=false;

session_start();
if(isset($_SESSION['user'])){
    $login_status = true;
    header('Location: myacc.php');
    echo "Already logged in";
    exit("Already logged in");
}

if( mysqli_num_rows($result) == 1 ){
    $user_exist=true;
    $row = mysqli_fetch_assoc($result);
    $db_passhash = $row["passhash"];
    if( password_verify($password, $db_passhash) ){
        $login_status=true;
        session_start();
        $_SESSION['user'] = $row["user_id"];
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
      window.location.href = "myacc.php";
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

