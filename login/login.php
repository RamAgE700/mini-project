<?php
$email = $_POST['email'];
$password = $_POST['password'];

//Database connection here 

$con = new mysqli("localhost","root","","forge"  );
if($con->connect_error) {
   die("failed to connect : ".$con->connect_error);
}
else {
    $stmt = $con->prepare("select * from user where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {

         $data = $stmt_result->fetch_assoc();
         if($data['password'] === $password )
         { header("Location: ../index.html"); ;
        } else {
            echo "<h2>invalid email or password</h2>" ;
        }

    } else {
        echo "invalid email or password";
    }

}
?>