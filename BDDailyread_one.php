<?php
   session_start();
include("checklogin.php");
check_login();
?>





<!DOCTYPE HTML>
<html>
<head>
    <title>Business Developement-Daily</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Business Developement-Daily</h1>
            <tr>
        <td></td>
        <td>
            <a href='BDDailyindex.php' class='btn btn-danger'>Back</a>
        </td>
    </tr>
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
    $query = "SELECT id, Name,In_time,Work_Start_Time,
        Follow_UP_from_Counsellor,
        Total_call_for_Meetings,Any_Visit,Direct_Walking,
       Direct_Call,Mail,ENQUIRY,Total,EXTRA_WORK,
        Lecture_attend,Entertainment_time_taken,
        Total_Breaks,Out_time FROM Business_Development_Daily WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $Name = $row['Name'];
    $In_time = $row['In_time'];
    $Work_Start_Time = $row['Work_Start_Time'];
    $Follow_UP_from_Counsellor = $row['Follow_UP_from_Counsellor'];
    $Total_call_for_Meetings = $row['Total_call_for_Meetings'];
    $Any_Visit = $row['Any_Visit'];
    $Direct_Walking = $row['Direct_Walking'];
    $Direct_Call = $row['Direct_Call'];
    $Mail = $row['Mail'];
    $ENQUIRY = $row['ENQUIRY'];
    $Total = $row['Total'];
    $EXTRA_WORK = $row['EXTRA_WORK'];
    $Lecture_attend = $row['Lecture_attend'];
    $Entertainment_time_taken = $row['Entertainment_time_taken'];
    $Total_Breaks = $row['Total_Breaks'];
    $Out_time = $row['Out_time'];


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
        <td>In time</td>
        <td><?php echo htmlspecialchars($In_time, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Work Start Time</td>
        <td><?php echo htmlspecialchars($Work_Start_Time, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Follow UP from Counsellor</td>
        <td><?php echo htmlspecialchars($Follow_UP_from_Counsellor, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Total call for Meetings</td>
        <td><?php echo htmlspecialchars($Total_call_for_Meetings, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Any Visit</td>
        <td><?php echo htmlspecialchars($Any_Visit, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Direct Walking</td>
        <td><?php echo htmlspecialchars($Direct_Walking, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Direct Call</td>
        <td><?php echo htmlspecialchars($Direct_Call, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Mail</td>
        <td><?php echo htmlspecialchars($Mail, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>ENQUIRY</td>
        <td><?php echo htmlspecialchars($ENQUIRY, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Total</td>
        <td><?php echo htmlspecialchars($Total, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>EXTRA WORK</td>
        <td><?php echo htmlspecialchars($EXTRA_WORK, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Lecture attend</td>
        <td><?php echo htmlspecialchars($Lecture_attend, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Entertainment time taken</td>
        <td><?php echo htmlspecialchars($Entertainment_time_taken, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Total Breaks</td>
        <td><?php echo htmlspecialchars($Total_Breaks, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Out time</td>
        <td><?php echo htmlspecialchars($Out_time, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='BDDailyindex.php' class='btn btn-danger'>Back</a>
        </td>
    </tr>
</table>
 
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>-