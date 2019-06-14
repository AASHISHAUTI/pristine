<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("db_connection.php");

// get Users
$query = "SELECT * FROM IT_Counseller_Weekly";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=ITWeekly.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'Date Created','Name', 'INQUIRY FORM Count', 'FEEDBACK FORM COUNT','CISEH BROTURE','CPTE BROTURE', 'CAAD BROTURE','FEES PENDING','Internal Discussion', 'Any ideas','Exam Schedule','Certificate status', 'Feedback from Students'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>