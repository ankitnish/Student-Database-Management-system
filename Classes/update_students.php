<?php
// Include database connection
include_once '../include/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $stmt1 = $conn->prepare("UPDATE StudentPersonalInformation SET Student_Name = ?, Fathers_Name = ?, Mothers_Name = ?, Address = ?, Student_Phone = ?, Student_Email = ?, Fathers_Phone = ?, Mothers_Phone = ? WHERE Roll_Number = ?");
    $stmt1->bind_param("sssssssss", $studentName, $fathersName, $mothersName, $address, $studentPhone, $studentEmail, $fathersPhone, $mothersPhone, $rollNumber);

    $stmt2 = $conn->prepare("UPDATE AcademicInformation SET Branch = ?, College = ?, Current_Semester = ? WHERE Roll_Number = ?");
    $stmt2->bind_param("ssis", $branch, $collegeName, $currentSemester, $rollNumber);

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
            $stmtCheck = $conn->prepare("SELECT COUNT(*) FROM Results WHERE Roll_Number = ? AND Semester = ?");
            $stmtCheck->bind_param("si", $rollNumber, $semester);
            $stmtCheck->execute();
            $stmtCheck->bind_result($count);
            $stmtCheck->fetch();
            $stmtCheck->close();

            if ($count > 0) {
                $stmtUpdate = $conn->prepare("UPDATE Results SET Overall_Percentage = ? WHERE Roll_Number = ? AND Semester = ?");
                $stmtUpdate->bind_param("dsi", $overallPercentage, $rollNumber, $semester);
                $stmtUpdate->execute();
                $stmtUpdate->close();
            } else {
                $stmtInsert = $conn->prepare("INSERT INTO Results (Roll_Number, Semester, Overall_Percentage) VALUES (?, ?, ?)");
                $stmtInsert->bind_param("sid", $rollNumber, $semester, $overallPercentage);
                $stmtInsert->execute();
                $stmtInsert->close();
            }
        }
    }

    $stmt1->close();
    $stmt2->close();

    header("Location: ../information.php?RollNumber=$rollNumber");
    exit();
}
?>
