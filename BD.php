<?php
   session_start();
include("checklogin.php");
check_login();
?>





<!DOCTYPE HTML>
<html>
<head>
    <title>Business Development Report</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Business Development Report</h1>
            <a href='dashboard.php' class='btn btn-primary m-b-1em'>Back to Dashboard</a>
        </div>
     
        <!-- PHP code to read records will be here -->
        <?php
// include database connection
include 'config/database.php';

// link to create record form
echo "<table>";
echo "<tr>";
echo "<td>";
echo "<a href='BDDailyindex_read.php' class='btn btn-primary m-b-1em'>Business Development Daily</a>";echo "</td>";echo "</tr>";echo "<tr>";echo "<td>";
echo "<a href='BDWeeklyindex_read.php' class='btn btn-primary m-b-1em'>Business Development Weekly</a>";echo "</td>";echo "</tr>";echo "<tr>";echo "<td>";
echo "<a href='BDMonthlyindex_read.php' class='btn btn-primary m-b-1em'>Business Development Monthly</a>";echo "</td>";echo "</tr>";

echo "<table>";
//check if more than 0 record found

 ?>
</body>
</html>

