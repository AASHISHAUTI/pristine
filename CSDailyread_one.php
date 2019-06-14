<!DOCTYPE HTML>
<html>
<head>
    <title>Cyber Security Expert-Daily</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Cyber Security Expert-Daily</h1>
            <a href='CSDailyindex.php' class='btn btn-danger'>Back</a>
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
    $query = "SELECT id,Name,In_time,
  Work_Start_Time,
  Lectures_Taken,
  CISEH,
  CPTE,
  Corporate_Training,
  Inquiry_attend,
  New_Reserch,
  Extra_work,
  Total,
  Virtual_Meeting_attend,
  Entertainment_time_taken,
  Total_Breaks,
  Out_time FROM Cyber_Security_Daily WHERE id = ? LIMIT 0,1";
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
    $Lectures_Taken = $row['Lectures_Taken'];
    $CISEH = $row['CISEH'];
    $CPTE = $row['CPTE'];
    $Corporate_Training = $row['Corporate_Training'];
    $Inquiry_attend = $row['Inquiry_attend'];
    $New_Reserch = $row['New_Reserch'];
    $Extra_work = $row['Extra_work'];
    $Total = $row['Total'];
    $Virtual_Meeting_attend = $row['Virtual_Meeting_attend'];
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
        <td>In Time</td>
        <td><?php echo htmlspecialchars($In_time, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Work Start Time</td>
        <td><?php echo htmlspecialchars($Work_Start_Time, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Lectures Taken</td>
        <td><?php echo htmlspecialchars($Lectures_Taken, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>CISEH</td>
        <td><?php echo htmlspecialchars($CISEH, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>CPTE</td>
        <td><?php echo htmlspecialchars($CPTE, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>Corporate Training</td>
        <td><?php echo htmlspecialchars($Corporate_Training, ENT_QUOTES);  ?></td>
    </tr>
    

    <tr>
        <td>Inquiry_attend</td>
        <td><?php echo htmlspecialchars($Inquiry_attend, ENT_QUOTES);  ?></td>
    </tr>
    
    <tr>
        <td>New Reserch</td>
        <td><?php echo htmlspecialchars($New_Reserch, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Extra work</td>
        <td><?php echo htmlspecialchars($Extra_work, ENT_QUOTES);  ?></td>
    </tr>
    

    <tr>
        <td>Total</td>
        <td><?php echo htmlspecialchars($Total, ENT_QUOTES);  ?></td>
    </tr>
    

    <tr>
        <td>Virtual Meeting attend</td>
        <td><?php echo htmlspecialchars($Virtual_Meeting_attend, ENT_QUOTES);  ?></td>
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
            <a href='CSDailyindex.php' class='btn btn-danger'>Back</a>
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