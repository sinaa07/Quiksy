<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   
include 'connection.php';
session_start();
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$user_exist = false;
$query_initial = "select email from users where email = '$email';";
$result_initial = mysqli_query($conn,$query_initial);
if (!$result_initial) {
    die("Query failed: " . mysqli_error($conn));
}
if(mysqli_num_rows($result_initial)>0){
    $user_exist = true;
}
else{
    $user_exist = false;
    if($password==$confirm_password){
        $query2 = "insert into users(email,password) values('$email','$password');";
        $result2 = mysqli_query($conn,$query2);
        if (!$result2) {
            die("Insert into users table failed: " . mysqli_error($conn));
        }
        $q_userID = mysqli_insert_id($conn);
        $query3 = "insert into user_details(user_id,name,email) values('$q_userID','$name','$email');";
        $result3 = mysqli_query($conn,$query3);
        if(!$result3){
            die("Insert into user_details failed: " . mysqli_error($conn));
        }
    }
    else{
       die("Passwords do not match. Please try again.");
    }
}
?>

<html>
    <body>
        <script>
            const exist= <?php echo json_encode($user_exist); ?>;
            if(exist){
                alert("User already exists. Redirecting to login");
                window.location.href = "login.php";
            }
            else{
                window.location.href = "myacc.php";
            }
        </script>
    </body>
</html>