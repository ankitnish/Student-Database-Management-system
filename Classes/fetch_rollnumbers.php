<?php
// Include database connection
include_once '../include/database.php';

if (isset($_POST['semester']) && !empty($_POST['semester'])) {
    $semester = filter_var($_POST['semester'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT Roll_Number FROM AcademicInformation WHERE Current_Semester = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $semester);
    $stmt->execute();

    $result = $stmt->get_result();

    $rollNumbers = array();

    while ($row = $result->fetch_assoc()) {
        $rollNumbers[] = $row['Roll_Number'];
    }

    $stmt->close();

    echo json_encode($rollNumbers);
} else {
    echo json_encode(array());
}
?>
