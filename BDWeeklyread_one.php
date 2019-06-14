<?php
   session_start();
include("checklogin.php");
check_login();
?>




<!DOCTYPE HTML>
<html>
<head>
    <title>Business Developement-Weekly</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Business Developement-Weekly</h1>
        </div>
         
        <!-- PHP read one record will be here -->
        <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT id,Name,Schedule_Weekly_Meeting,
        Take_Feedback_from_students_Orally,Introduction_to_New_Students,
        FEES_PENDING_Task_checking_with_Counsellors,Internal_Discussion FROM Business_Development_Weekly WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $Name = $row['Name'];
    $Schedule_Weekly_Meeting= $row['Schedule_Weekly_Meeting'];
    $Take_Feedback_from_students_Orally = $row['Take_Feedback_from_students_Orally'];
    $Introduction_to_New_Students = $row['Introduction_to_New_Students'];
    $FEES_PENDING_Task_checking_with_Counsellors = $row['FEES_PENDING_Task_checking_with_Counsellors'];
    $Internal_Discussion = $row['Internal_Discussion'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
        <!-- HTML read one record table will be here -->
        <!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Name</td>
        <td><?php echo htmlspecialchars($Name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Schedule Weekly Meeting</td>
        <td><?php echo htmlspecialchars($Schedule_Weekly_Meeting, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Take Feedback from students Orally</td>
        <td><?php echo htmlspecialchars($Take_Feedback_from_students_Orally, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>FEES PENDING Task checking with Counsellors</td>
        <td><?php echo htmlspecialchars($FEES_PENDING_Task_checking_with_Counsellors, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Internal Discussion</td>
        <td><?php echo htmlspecialchars($Internal_Discussion, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='BDWeeklyindex.php' class='btn btn-danger'>Back</a>
        </td>
    </tr>
</table>
 
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>