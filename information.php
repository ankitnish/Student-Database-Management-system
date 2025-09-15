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
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include ('./header.php');
    ?>
    <div class="container rounded-3 shadow-lg">
        <h1 class="mt-5 p-1 border-bottom">Student Details</h1>

        <?php
        // Include database connection
        include_once './include/database.php';

        $rollNumber = $_GET['RollNumber'];
        if(empty($rollNumber)){
            header("Location: ./home.php");
        }else{

        $sql_personal = "SELECT * FROM StudentPersonalInformation WHERE Roll_Number = ?";
        $stmt_personal = $conn->prepare($sql_personal);
        $stmt_personal->bind_param("s", $rollNumber);
        $stmt_personal->execute();
        $result_personal = $stmt_personal->get_result();
        $row_personal = $result_personal->fetch_assoc();

        $sql_academic = "SELECT * FROM AcademicInformation WHERE Roll_Number = ?";
        $stmt_academic = $conn->prepare($sql_academic);
        $stmt_academic->bind_param("s", $rollNumber);
        $stmt_academic->execute();
        $result_academic = $stmt_academic->get_result();
        $row_academic = $result_academic->fetch_assoc();

        $sql_results = "SELECT * FROM Results WHERE Roll_Number = ?";
        $stmt_results = $conn->prepare($sql_results);
        $stmt_results->bind_param("s", $rollNumber);
        $stmt_results->execute();
        $result_results = $stmt_results->get_result();
        }
        ?>
    <a href='./update_information.php?rollNumber=<?php echo $row_personal['Roll_Number'];?>&id=<?php echo $row_personal['ID'];?>'  class=" btn btn-primary btn-lg">Edit</a>
        <div class="card text-white mb-3 mt-5 shadow-lg">
            <div class="card-header bg-success">
                Personal & Academic Information
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Student Name:</strong> <?php echo $row_personal['Student_Name']; ?></li>
                            <li class="list-group-item"><strong>Roll Number:</strong> <?php echo $row_personal['Roll_Number']; ?></li>
                            <li class="list-group-item"><strong>Current Semester:</strong> <?php echo $row_academic['Current_Semester']; ?></li>
                            <li class="list-group-item"><strong>Branch:</strong> <?php echo $row_academic['Branch']; ?></li>
                            <li class="list-group-item"><strong>College Name:</strong> <?php echo $row_academic['College']; ?></li>
                            <li class="list-group-item"><strong>Student's Phone:</strong> <?php echo $row_personal['Student_Phone']; ?></li>
                            <li class="list-group-item"><strong>Student's Email:</strong> <?php echo $row_personal['Student_Email']; ?></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Father's Name:</strong> <?php echo $row_personal['Fathers_Name']; ?></li>
                            <li class="list-group-item"><strong>Father's Phone:</strong> <?php echo $row_personal['Fathers_Phone']; ?></li>
                            <li class="list-group-item"><strong>Mother's Name:</strong> <?php echo $row_personal['Mothers_Name']; ?></li>
                            <li class="list-group-item"><strong>Mother's Phone:</strong> <?php echo $row_personal['Mothers_Phone']; ?></li>
                            <li class="list-group-item"><strong>Address:</strong> <?php echo $row_personal['Address']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
</div>
        


        <!-- Results Card -->
        <div class="card text-white  mb-3 mt-3 shadow-lg">
            <div class="card-header bg-primary">
                Results
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Semester</th>
                                <th>Overall Percentage</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result_results->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['Semester'] . "</td>";
                                echo "<td>" . $row['Overall_Percentage'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include ('./footer.php');
    ?>
</body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</html>
