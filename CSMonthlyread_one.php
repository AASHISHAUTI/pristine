<?php
   session_start();
include("checklogin.php");
check_login();
?>




<!DOCTYPE HTML>
<html>
<head>
    <title>Cyber Security Expert-Monthly</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Cyber Security Expert-Monthly</h1>
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


    // $query = "INSERT INTO Cyber_Security_Monthly SET Name=:Name, Meeting_Topics=:Meeting_Topics,Conclusion=:Conclusion, Result=:Result, created=:created";
 
    $query = "SELECT id, Name, Target,Meeting_Topics, Conclusion,Result FROM Cyber_Security_Monthly WHERE id = ? LIMIT 0,1";
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
    $Meeting_Topics = $row['Meeting_Topics'];
    $Conclusion = $row['Conclusion'];
    $Result = $row['Result'];

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
        <td>Meeting_Topics</td>
        <td><?php echo htmlspecialchars($Meeting_Topics, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Conclusion</td>
        <td><?php echo htmlspecialchars($Conclusion, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Result</td>
        <td><?php echo htmlspecialchars($Result, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='CSMonthlyindex.php' class='btn btn-danger'>Back</a>
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