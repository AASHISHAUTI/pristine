<?php
   session_start();
include("checklogin.php");
check_login();
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Business Devlopement-Monthly</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Business Developement-Monthly</h1>
            <tr>
        <td></td>
        <td>
            <a href='BDMonthlyindex.php' class='btn btn-danger'>Back</a>
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
    $query = "SELECT id, Name,Target, Meetings_in_Colleges, Meeting_in_Companies, Meeting_with_others,Ready_for_seminar,
Ready_for_workshop,Ready_for_Short_term_course FROM Business_Development_Monthly WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $Name = $row['Name'];
    $Target = $row['Target'];
    $Meetings_in_Colleges = $row['Meetings_in_Colleges'];
    $Meeting_in_Companies = $row['Meeting_in_Companies'];
    $Meeting_with_others = $row['Meeting_with_others'];
    $Ready_for_seminar = $row['Ready_for_seminar'];
    $Ready_for_workshop = $row['Ready_for_workshop'];
    $Ready_for_Short_term_course = $row['Ready_for_Short_term_course'];
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
        <td>Target</td>
        <td><?php echo htmlspecialchars($Target, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Meetings_in_Colleges</td>
        <td><?php echo htmlspecialchars($Meetings_in_Colleges, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Meeting_in_Companies</td>
        <td><?php echo htmlspecialchars($Meeting_in_Companies, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Meeting_with_others</td>
        <td><?php echo htmlspecialchars($Meeting_with_others, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Ready_for_seminar</td>
        <td><?php echo htmlspecialchars($Ready_for_seminar, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Ready_for_workshop</td>
        <td><?php echo htmlspecialchars($Ready_for_workshop, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Ready_for_Short_term_course</td>
        <td><?php echo htmlspecialchars($Ready_for_Short_term_course, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td></td>
        <td>
            <a href='BDMonthlyindex.php' class='btn btn-danger'>Back</a>
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