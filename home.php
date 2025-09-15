<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ./index.php");
    exit;
}

$loggedInUserName = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page for Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    include ('./header.php');
    ?>
    


    <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <div class="row align-items-center mb-3">
                    <div class="col-md-4">
                        <label for="Branch" class="form-label">Branch:</label>
                        <select class="form-select" id="Branch" name="Branch">
                            <option value="">Select Branch</option>
                            <option value="CSE">C.S.E</option>
                            <option value="EE">E.E</option>
                            <option value="ET">E.T</option>
                            <option value="MMS">M.M.S</option>
                            <option value="ME">M.E</option>
                            <option value="CE">C.E</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="semester" class="form-label">Semester:</label>
                        <select class="form-select" id="semester" name="semester">
                            <option value="">Select Semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="rollnumber" class="form-label">Roll Number:</label>
                        <input type="text" class="form-control" id="rollnumber" name="rollnumber">
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary mt-4" id="searchBtn">Search</button>
                    </div>
                </div>
      </div>
      <div class="col-lg-4 p-0 overflow-hidden">
                    <table class="table rounded-3 border" id="studentTable" style="display: none;">
                        <thead>
                            <tr>
                            <th>Branch & Semester</th>
                                <th>Roll Number</th>
                                <th>Student Name</th>
                            </tr>
                        </thead>
                        <tbody id="studentTableBody">
                        </tbody>
                    </table>
                </div> 
    </div>
  </div>
  <?php
    include ('./footer.php');
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>

    $(document).ready(function() {
    $('#searchBtn').click(function() {
        var branch = $('#Branch').val();
        var semester = $('#semester').val();
        var rollNumber = $('#rollnumber').val();
        
        $.ajax({
            url: './classes/fetch_student_info.php',
            method: 'POST',
            data: {
                branch: branch,
                semester:semester,
                rollNumber: rollNumber
            },
            success: function(response) {
                if (response.success) {
                    var studentInfo = response.data;
                    $('#studentTableBody').html('<tr></td><td>' + studentInfo.Branch + ',' + studentInfo.Semester + '</td><td><a href="./information.php?RollNumber=' + studentInfo.Roll_Number + '">' + studentInfo.Roll_Number + '</a></td><td>' + studentInfo.Student_Name + '</td></tr>');
                    $('#studentTable').show();
                } else {
                    $('#studentTableBody').html('<tr><td colspan="2">' + response.error + '</td></tr>');
                    $('#studentTable').show();
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                $('#studentTableBody').html('<tr><td colspan="2">Error occurred while fetching student information.</td></tr>');
                $('#studentTable').show();
            }
        });
    });

});
</script>

</body>
</html>
