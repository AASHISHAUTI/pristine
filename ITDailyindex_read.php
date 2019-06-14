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
$query = "SELECT * FROM IT_Counseller_Daily";
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
            <th>Follow UP Taken</th>
            <th>Shiksha</th>
            <th>Sulekha</th>
            <th>Direct Walking</th>
            <th>Direct Call</th>
            <th>Mail</th>
            <th>Rizwan Sir Reference FB</th>
            <th>Leads Forwarded to Other Branch</th>
            <th>ENQUIRY</th>
            <th>TOTAL</th>
            <th>EXTRA WORK</th>
            <th>Lecture attend</th>
            <th>Entertainment time taken</th>
            <th>Total Breaks</th>
            <th>Out time</th>
        </tr>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr>
            <td>'.$number.'</td>
            <td>'.$row['Name'].'</td>
            <td>'.$row['In_time'].'</td>
            <td>'.$row['Work_Start_Time'].'</td>
            <td>'.$row['Follow_UP_Taken'].'</td>
            <td>'.$row['Shiksha'].'</td>
            <td>'.$row['Sulekha'].'</td>
            <td>'.$row['Direct_Walking'].'</td>
            
            <td>'.$row['Direct_Call'].'</td>
            <td>'.$row['Mail'].'</td>
            <td>'.$row['Rizwan_Sir_Reference_FB'].'</td>
            <td>'.$row['Leads_Forwarded_to_Other_Branch'].'</td>
            <td>'.$row['ENQUIRY'].'</td>
            <td>'.$row['TOTAL'].'</td>

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
                <a href='it.php' class='btn btn-primary m-b-1em'>Back to Dashboard</a>
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
                window.open("ITDailyexport.php", '_blank');
            }
        }
    </script>
</div>
</body>
</html>
