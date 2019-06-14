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
$query = "SELECT * FROM IT_Counseller_Weekly";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $number = 1;
    $users = '<table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>INQUIRY FORM Count</th>
            <th>FEEDBACK_FORM_COUNT</th>
            <th>CISEH_BROTURE</th>
            <th>CPTE_BROTURE</th>
            <th>CAAD_BROTURE</th>
            <th>FEES_PENDING</th>
            <th>Internal_Discussion</th>
            <th>Any_ideas</th>
            <th>Exam_Schedule</th>
        
           
            <th>Certificate_status</th>
            <th>Feedback_from_Students</th>
            
        </tr>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr>
            <td>'.$number.'</td>
            <td>'.$row['Name'].'</td>
                <td>'.$row['INQUIRY_FORM_Count'].'</td>
                    <td>'.$row['FEEDBACK_FORM_COUNT'].'</td>
                        <td>'.$row['CISEH_BROTURE'].'</td>
                            <td>'.$row['CPTE_BROTURE'].'</td>    
                            <td>'.$row['CAAD_BROTURE'].'</td>
                                <td>'.$row['FEES_PENDING'].'</td>
                                 <td>'.$row['Internal_Discussion'].'</td>
                                  <td>'.$row['Any_ideas'].'</td>
                            <td>'.$row['Exam_Schedule'].'</td>    
                            <td>'.$row['Certificate_status'].'</td>
                                <td>'.$row['Feedback_from_Students'].'</td>
                           
                    
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
                window.open("ITWeeklyexport.php", '_blank');
            }
        }
    </script>
</div>
</body>
</html>
