<?php
   session_start();
include("checklogin.php");
check_login();

/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Index
*/

// Database Connection
require("db_connection.php");

// List Users
$query = "SELECT * FROM Business_Development_Daily";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $number = 1;
    $users = '<table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>In Time</th>
            <th>Work Start Time</th>
            <th>Follow UP from Counsellor</th>
            <th>Total Call For Meeting</th>
            <th>Any Visit</th>
            <th>Direct Walking</th>
            <th>Direct Call</th>
            <th>Mail</th>
            <th>Enquiry</th>
            <th>Total</th>
            <th>Extra Work</th>
            <th>Lecture Attend</th>
            <th>Entertainment Time Taken</th>
            <th>Total Breaks</th>
            <th>Out Time</th>
          
        </tr>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr>
            <td>'.$number.'</td>
            <td>'.$row['Name'].'</td>
           <td>'.$row['In_time'].'</td>
            <td>'.$row['Work_Start_Time'].'</td>
            <td>'.$row['Follow_UP_from_Counsellor'].'</td>
              <td>'.$row['Total_call_for_Meetings'].'</td>
              <td>'.$row['Any_Visit'].'</td>
              <td>'.$row['Direct_Walking'].'</td>
              <td>'.$row['Direct_Call'].'</td>
              <td>'.$row['Mail'].'</td>
              <td>'.$row['ENQUIRY'].'</td>
              <td>'.$row['Total'].'</td>
              <td>'.$row['EXTRA_WORK'].'</td>
              <td>'.$row['Lecture_attend'].'</td>
              <td>'.$row['Entertainment_time_taken'].'</td>
              <td>'.$row['Total_Breaks'].'</td>
              <td>'.$row['Out_time'].'</td>

        </tr>';
        $number++;
    }
    $users .= '</table>';
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Export Data from MySQL to CSV Tutorial | iTech Empires</title>
    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<div class="container">
    <!--  Header  -->
    <div class="row">
        <div class="col-md-12">
            <h2>Export Data from MySQL to CSV</h2>
             <div class="form-group">
                <a href='bd.php' class='btn btn-primary m-b-1em'>Back to Dashboard</a>
        <button onclick="Export()" class="btn btn-primary">Export to CSV File</button>
    </div>
   
        </div>
    </div>
    <!--  /Header  -->

    <!--  Content   -->
    <div class="form-group">
        <?php echo $users ?>
    </div>
    <!--  /Content   -->

    <script>
        function Export()
        {
            var conf = confirm("Export users to CSV?");
            if(conf == true)
            {
                window.open("BDDailyexport.php", '_blank');
            }
        }
    </script>
</div>
</body>
</html>
