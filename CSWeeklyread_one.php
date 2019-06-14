<?php
   session_start();
include("checklogin.php");
check_login();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Cyber Security Expert-Weekly</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Cyber Security Expert-Weekly</h1>
            <a href='CSWeeklyindex.php' class='btn btn-danger'>Back</a>
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
    $query = "SELECT id, Name, Student_task, Performance_Interns, Interns_new_task FROM Cyber_Security_Weekly WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $Name = $row['Name'];
    $Student_task = $row['Student_task'];
    $Performance_Interns = $row['Performance_Interns'];
    $Interns_new_task =$row['Interns_new_task'];
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
        <td>Student Task</td>
        <td><?php echo htmlspecialchars($Student_task, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Performance of Interns</td>
        <td><?php echo htmlspecialchars($Performance_Interns, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Interns New task</td>
        <td><?php echo htmlspecialchars($Interns_new_task, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='CSWeeklyindex.php' class='btn btn-danger'>Back</a>
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