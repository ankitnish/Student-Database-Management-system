<?php
// Include database connection
include_once '../include/database.php';

$response = array();

if (isset($_POST['rollNumber']) && !empty($_POST['rollNumber'])) {
    $branch = filter_var($_POST['branch'], FILTER_SANITIZE_SPECIAL_CHARS);
    $semester = filter_var($_POST['semester'], FILTER_SANITIZE_SPECIAL_CHARS);
    $rollNumber = filter_var($_POST['rollNumber'], FILTER_SANITIZE_SPECIAL_CHARS);
    
    $stmt = $conn->prepare("SELECT DISTINCT AI.Roll_Number, AI.Branch, AI.Current_Semester, SP.Student_Name FROM StudentPersonalInformation as SP INNER JOIN AcademicInformation as AI on AI.Roll_Number = SP.Roll_Number
     WHERE AI.Roll_Number = ? AND AI.Branch = ? AND AI.Current_Semester = ?");
    $stmt->bind_param("sss", $rollNumber, $branch, $semester);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $studentInfo = array(
            'Branch' => $row['Branch'],
            'Semester' => $row['Current_Semester'],
            'Roll_Number' => $row['Roll_Number'],
            'Student_Name' => $row['Student_Name']
        );

        $response['success'] = true;
        $response['data'] = $studentInfo;
    } else {
        $response['success'] = false;
        $response['error'] = 'No student found with this roll number for selected Branch and Semester.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response['success'] = false;
    $response['error'] = 'Invalid or empty roll number.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
