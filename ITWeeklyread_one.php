<?php
   session_start();
include("checklogin.php");
check_login();
?>




<!DOCTYPE HTML>
<html>
<head>
    <title>IT Counsellor-Weekly</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read IT Counsellor-Weekly</h1>
               <a href='ITWeeklyindex.php' class='btn btn-danger'>Back</a>
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
    $query = "SELECT id, Name, INQUIRY_FORM_Count,
         FEEDBACK_FORM_COUNT,CISEH_BROTURE,CPTE_BROTURE,
         CAAD_BROTURE,FEES_PENDING,Internal_Discussion,
         Any_ideas,Exam_Schedule,Certificate_status,
         Feedback_from_Students FROM IT_Counseller_Weekly WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $Name = $row['Name'];
    $INQUIRY_FORM_Count = $row['INQUIRY_FORM_Count'];
    $FEEDBACK_FORM_COUNT = $row['FEEDBACK_FORM_COUNT'];
    $CISEH_BROTURE = $row['CISEH_BROTURE'];
    $CPTE_BROTURE = $row['CPTE_BROTURE'];
    $CAAD_BROTURE = $row['CAAD_BROTURE'];
    $FEES_PENDING = $row['FEES_PENDING'];
    $Internal_Discussion = $row['Internal_Discussion'];
    $Any_ideas = $row['Any_ideas'];
    $Exam_Schedule = $row['Exam_Schedule'];
    $Certificate_status = $row['Certificate_status'];
    $Feedback_from_Students = $row['Feedback_from_Students'];
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
        <td>INQUIRY FORM Count</td>
        <td><?php echo htmlspecialchars($INQUIRY_FORM_Count, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>FEEDBACK FORM COUNT</td>
        <td><?php echo htmlspecialchars($FEEDBACK_FORM_COUNT, ENT_QUOTES);  ?></td>
    </tr>

    <tr>
        <td>CISEH BROTURE</td>
        <td><?php echo htmlspecialchars($CISEH_BROTURE, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>CPTE BROTURE</td>
        <td><?php echo htmlspecialchars($CPTE_BROTURE, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>CAAD BROTURE</td>
        <td><?php echo htmlspecialchars($CAAD_BROTURE, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>FEES PENDING</td>
        <td><?php echo htmlspecialchars($FEES_PENDING, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Internal Discussion</td>
        <td><?php echo htmlspecialchars($Internal_Discussion, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Any ideas</td>
        <td><?php echo htmlspecialchars($Any_ideas, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Exam Schedule</td>
        <td><?php echo htmlspecialchars($Exam_Schedule, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Certificate status</td>
        <td><?php echo htmlspecialchars($Certificate_status, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Feedback from Students</td>
        <td><?php echo htmlspecialchars($Feedback_from_Students, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='ITWeeklyindex.php' class='btn btn-danger'>Back</a>
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