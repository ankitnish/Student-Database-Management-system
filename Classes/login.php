<?php
include('../include/database.php');

$roll_number = $_POST['roll_number'];
$password = $_POST['password'];

$sql = "SELECT * FROM AcademicInformation WHERE roll_number = '$roll_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if($roll_number == $password){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $roll_number;
        
        header("Location: ../home.php");
        } else {
        echo "Invalid username or password.";
        }

    }else{
        echo "User not Found";
    }

$conn->close();
?>
