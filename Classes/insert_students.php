<?php
// Include database connection
include_once '../include/database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $rollNumber = $_POST['rollNumber'];
    $branch = $_POST['branch'];
    $collegeName = $_POST['collegeName'];
    $currentSemester = $_POST['currentSemester'];
    $studentName = $_POST['studentName'];
    $studentPhone = $_POST['studentPhone'];
    $studentEmail = $_POST['studentEmail'];
    $fathersName = $_POST['fathersName'];
    $fathersPhone = $_POST['fathersPhone'];
    $mothersName = $_POST['mothersName'];
    $mothersPhone = $_POST['mothersPhone'];
    $address = $_POST['address'];
    $firstSemester = $_POST['firstSemester'];
    $secondSemester = $_POST['secondSemester'];
    $thirdSemester = $_POST['thirdSemester'];
    $fourthSemester = $_POST['fourthSemester'];
    $fifthSemester = $_POST['fifthSemester'];
    $sixthSemester = $_POST['sixthSemester'];


    $sql = "SELECT * FROM AcademicInformation WHERE Roll_Number = '$rollNumber'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo 'Same Roll Number is already present in the database. You cannot add duplicate records for Roll Number. <a href="../student_add.php">Click here to go back</a>';
}else{

    $stmt1 = $conn->prepare("INSERT INTO StudentPersonalInformation (Roll_Number, Student_Name, Fathers_Name, Mothers_Name, Address, Student_Phone, Student_Email, Fathers_Phone, Mothers_Phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssssssss", $rollNumber, $studentName, $fathersName, $mothersName, $address, $studentPhone, $studentEmail, $fathersPhone, $mothersPhone);

    $stmt2 = $conn->prepare("INSERT INTO AcademicInformation (Roll_Number, Branch, College, Current_Semester) VALUES (?, ?, ?, ?)");
    $stmt2->bind_param("ssss", $rollNumber, $branch, $collegeName, $currentSemester);

    $stmt3 = $conn->prepare("INSERT INTO Results (Roll_Number, Semester, Overall_Percentage) VALUES (?, ?, ?)");
    $stmt3->bind_param("sid", $rollNumber, $semester, $overallPercentage);

    $stmt1->execute();

    $stmt2->execute();

    $semesterResults = array(
        1 => $firstSemester,
        2 => $secondSemester,
        3 => $thirdSemester,
        4 => $fourthSemester,
        5 => $fifthSemester,
        6 => $sixthSemester
    );

    foreach ($semesterResults as $semester => $overallPercentage) {
        if (!empty($overallPercentage)) {
            $stmt3->execute();
        }
    }

    $stmt1->close();
    $stmt2->close();
    $stmt3->close();

    header("Location: ../home.php");
    exit();
}
}
?>
