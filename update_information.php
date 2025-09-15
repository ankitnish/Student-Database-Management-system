<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    label{
        color:cornflowerblue;
    }
</style>
</head>
<body>
<?php include ('./header.php'); ?>
<div class="container d-flex flex-wrap justify-content-center shadow-lg">
    <h3 class="mt-2 p-1 border-bottom mb-5">Update Student Information</h3>
    <?php
    // Include database connection
    include_once './include/database.php';

    if (isset($_GET['rollNumber']) && isset($_GET['id'])) {
        $rollNumber = $_GET['rollNumber'];
        $id = $_GET['id'];

        $sql_personal = "SELECT * FROM StudentPersonalInformation WHERE Roll_Number = ? AND ID = ?";
        $stmt_personal = $conn->prepare($sql_personal);
        $stmt_personal->bind_param("si", $rollNumber, $id);
        $stmt_personal->execute();
        $result_personal = $stmt_personal->get_result();

        if ($result_personal->num_rows > 0) {
            $row_personal = $result_personal->fetch_assoc();
    ?>
            <form action="./classes/update_students.php" method="post">
                <div class="row g-3">
                    <div class="col-md-4 mb-3">
                        <label for="rollNumber" class="form-label">Roll Number (RollNumber is only Readonly)</label>
                        <input type="text" class="form-control" id="rollNumber" name="rollNumber" value="<?php echo $row_personal['Roll_Number']; ?>" readonly>
                    </div>
                    <?php

                        $sql_academic = "SELECT * FROM AcademicInformation WHERE Roll_Number = ?";
                        $stmt_academic = $conn->prepare($sql_academic);
                        $stmt_academic->bind_param("s", $rollNumber);
                        $stmt_academic->execute();
                        $result_academic = $stmt_academic->get_result();

                        if ($result_academic->num_rows > 0) {
                            $row_academic = $result_academic->fetch_assoc();
                    ?>
                    <div class="col-md-4 mb-3">
                        <label for="branch" class="form-label">Branch</label>
                        <input type="text" class="form-control" id="branch" name="branch" value="<?php echo $row_academic['Branch']; ?>" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="collegeName" class="form-label">College Name</label>
                        <input type="text" class="form-control" id="collegeName" name="collegeName" value="<?php echo $row_academic['College']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="currentSemester" class="form-label">Current Semester</label>
                        <input type="text" class="form-control" id="currentSemester" name="currentSemester" value="<?php echo $row_academic['Current_Semester']; ?>">
                    </div>

                    <?php
                        }
                    ?>

                    <div class="col-md-4 mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="studentName" name="studentName" value="<?php echo $row_personal['Student_Name']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="studentPhone" class="form-label">Student Phone</label>
                        <input type="text" class="form-control" id="studentPhone" name="studentPhone" value="<?php echo $row_personal['Student_Phone']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="studentEmail" class="form-label">Student Email</label>
                        <input type="email" class="form-control" id="studentEmail" name="studentEmail" value="<?php echo $row_personal['Student_Email']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fathersName" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="fathersName" name="fathersName" value="<?php echo $row_personal['Fathers_Name']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fathersPhone" class="form-label">Father's Phone</label>
                        <input type="text" class="form-control" id="fathersPhone" name="fathersPhone" value="<?php echo $row_personal['Fathers_Phone']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="mothersName" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="mothersName" name="mothersName" value="<?php echo $row_personal['Mothers_Name']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="mothersPhone" class="form-label">Mother's Phone</label>
                        <input type="text" class="form-control" id="mothersPhone" name="mothersPhone" value="<?php echo $row_personal['Mothers_Phone']; ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address" class="form-label">Full Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2"><?php echo $row_personal['Address']; ?></textarea>
                    </div>
                    <?php

                        $sql_results = "SELECT * FROM Results WHERE Roll_Number = ?";
                        $stmt_results = $conn->prepare($sql_results);
                        $stmt_results->bind_param("s", $rollNumber);
                        $stmt_results->execute();
                        $result_results = $stmt_results->get_result();

                        if ($result_results->num_rows > 0) {
                            while ($row_results = $result_results->fetch_assoc()) {
                                $array[] = $row_results;
                            }
                        ?>
                        
                    <div class="row g-3">
                    <h3 class="mt-1 p-1 border-bottom d-flex flex-wrap justify-content-center  mb-3">Student's Results</h3>
                    <div class="col-md-4 mb-3">
                        <label for="firstSemester" class="form-label">First Semester Percentage</label>
                        <input type="text" class="form-control" id="firstSemester" name="firstSemester" value="<?php echo $array[0]['Overall_Percentage'] = empty($array[0]['Overall_Percentage']) ? '' : $array[0]['Overall_Percentage']?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="secondSemester" class="form-label">Second Semester Percentage</label>
                        <input type="text" class="form-control" id="secondSemester" name="secondSemester" value="<?php echo $array[1]['Overall_Percentage'] = empty($array[1]['Overall_Percentage']) ? '' : $array[1]['Overall_Percentage']?>"> 
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="thirdSemester" class="form-label">Third Semester Percentage</label>
                        <input type="text" class="form-control" id="thirdSemester" name="thirdSemester" value="<?php echo $array[2]['Overall_Percentage'] = empty($array[2]['Overall_Percentage']) ? '' : $array[2]['Overall_Percentage']?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fourthSemester" class="form-label">Fourth Semester Percentage</label>
                        <input type="text" class="form-control" id="fourthSemester" name="fourthSemester" value="<?php echo $array[3]['Overall_Percentage'] = empty($array[3]['Overall_Percentage']) ? '' : $array[3]['Overall_Percentage']?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fifthSemester" class="form-label">Fifth Semester Percentage</label>
                        <input type="text" class="form-control" id="fifthSemester" name="fifthSemester" value="<?php $array[4]['Overall_Percentage'] = empty($array[4]['Overall_Percentage']) ? '' : $array[4]['Overall_Percentage']?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="sixthSemester" class="form-label">Sixth Semester Percentage</label>
                        <input type="text" class="form-control" id="sixthSemester" name="sixthSemester" value="<?php echo $array[5]['Overall_Percentage'] = empty($array[5]['Overall_Percentage']) ? '' : $array[5]['Overall_Percentage'];
; ?>">
                    </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <button type="submit" class="btn btn-danger my-4">Update Student</button>
            </form>
    <?php
        } else {
            echo "Student with Roll Number $rollNumber not found, Please check if you have passed the correct param value in URL.";
        }

        // Close statement and database connection
        $stmt_personal->close();
        $conn->close();
    } else {
        echo "Roll Number or ID Parameter is not provided.";
    }
    ?>
</div>
<?php
    include ('./footer.php');
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
