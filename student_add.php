<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    label{
        color:cornflowerblue;
    }
</style>
</head>
<body>
<?php
    include ('./header.php');
    ?>
    <div class="container d-flex flex-wrap justify-content-center shadow-lg">
        <h3 class="mt-2 p-1 border-bottom mb-5">Student's Information</h3>
        <form action="./classes/insert_students.php" method="post">
        <div class="row g-3">
                    <div class="col-md-4 mb-3">
                        <label for="rollNumber" class="form-label">Roll Number (Roll Numbers are Unique)</label>
                        <input type="text" class="form-control" id="rollNumber" name="rollNumber">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="branch" class="form-label">Branch</label>
                        <select class="form-select" id="Branch" name="branch">
                            <option value="">Select Branch</option>
                            <option value="CSE">C.S.E</option>
                            <option value="EE">E.E</option>
                            <option value="ET">E.T</option>
                            <option value="MMS">M.M.S</option>
                            <option value="ME">M.E</option>
                            <option value="CE">C.E</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="currentSemester" class="form-label">Current Semester</label>
                        <input type="text" class="form-control" id="currentSemester" name="currentSemester">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="collegeName" class="form-label">College Name</label>
                        <input type="text" class="form-control" id="collegeName" name="collegeName">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" class="form-control" id="studentName" name="studentName">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="studentPhone" class="form-label">Student Phone</label>
                        <input type="text" class="form-control" id="studentPhone" name="studentPhone">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="studentEmail" class="form-label">Student Email</label>
                        <input type="email" class="form-control" id="studentEmail" name="studentEmail">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fathersName" class="form-label">Father's Name</label>
                        <input type="text" class="form-control" id="fathersName" name="fathersName">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fathersPhone" class="form-label">Father's Phone</label>
                        <input type="text" class="form-control" id="fathersPhone" name="fathersPhone">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="mothersName" class="form-label">Mother's Name</label>
                        <input type="text" class="form-control" id="mothersName" name="mothersName">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="mothersPhone" class="form-label">Mother's Phone</label>
                        <input type="text" class="form-control" id="mothersPhone" name="mothersPhone">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="address" class="form-label">Full Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                    </div>
                    <div class="row g-3">
                    <h3 class="mt-1 p-1 border-bottom mb-3 d-flex flex-wrap justify-content-center">Student's Results</h3>
                    <div class="col-md-4 mb-3">
                        <label for="firstSemester" class="form-label">First Semester Percentage</label>
                        <input type="text" class="form-control" id="firstSemester" name="firstSemester">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="secondSemester" class="form-label">Second Semester Percentage</label>
                        <input type="text" class="form-control" id="secondSemester" name="secondSemester">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="thirdSemester" class="form-label">Third Semester Percentage</label>
                        <input type="text" class="form-control" id="thirdSemester" name="thirdSemester">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fourthSemester" class="form-label">Fourth Semester Percentage</label>
                        <input type="text" class="form-control" id="fourthSemester" name="fourthSemester">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="fifthSemester" class="form-label">Fifth Semester Percentage</label>
                        <input type="text" class="form-control" id="fifthSemester" name="fifthSemester">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="sixthSemester" class="form-label">Sixth Semester Percentage</label>
                        <input type="text" class="form-control" id="sixthSemester" name="sixthSemester">
                    </div>
                    </div>
                    </div>

                    <button type="submit" class="btn btn-primary my-4 ">Add Student Details</button>
            </form>

    </div>
    <?php
    include ('./footer.php');
    ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</html>
