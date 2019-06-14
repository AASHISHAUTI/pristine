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
            <h1>Update Cyber Security Expert-Daily</h1>
            <a href='CSDailyindex.php' class='btn btn-danger'>Back</a>
        </div>
     
        <!-- PHP read record by ID will be here -->
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
 
        <!-- HTML form to update record will be here -->
        <!-- PHP post to update record will be here -->
 
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='Name' value="<?php echo htmlspecialchars($Name, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>In Time</td>
            <td><input type='time' name='In_time' value="<?php echo htmlspecialchars($In_time, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>WorK Start Time</td>
            <td><input type='time' name='Work_Start_Time' value="<?php echo htmlspecialchars($Work_Start_Time, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Lectures Taken</td>
            <td><input type='text' name='Lectures_Taken' value="<?php echo htmlspecialchars($Lectures_Taken, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>CISEH</td>
            <td><input type='text' name='CISEH' value="<?php echo htmlspecialchars($CISEH, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>CPTE</td>
            <td><input type='text' name='CPTE' value="<?php echo htmlspecialchars($CPTE, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Corporate Training</td>
            <td><input type='text' name='Corporate_Training' value="<?php echo htmlspecialchars($Corporate_Training, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Inquiry Attend</td>
            <td><input type='text' name='Inquiry_attend' value="<?php echo htmlspecialchars($Inquiry_attend, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>New Reserch</td>
            <td><input type='text' name='New_Reserch' value="<?php echo htmlspecialchars($New_Reserch, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Extra work</td>
            <td><input type='text' name='Extra_work' value="<?php echo htmlspecialchars($Extra_work, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><input type='text' name='Total' value="<?php echo htmlspecialchars($Total, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Virtual Meeting Attend</td>
            <td><input type='text' name='Virtual_Meeting_attend' value="<?php echo htmlspecialchars($Virtual_Meeting_attend, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Entertainment Time Taken</td>
            <td><input type='text' name='Entertainment_time_taken' value="<?php echo htmlspecialchars($Entertainment_time_taken, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Total Breaks</td>
            <td><input type='text' name='Total_Breaks' value="<?php echo htmlspecialchars($Total_Breaks, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Out Time</td>
            <td><input type='time' name='Out_time' value="<?php echo htmlspecialchars($Out_time, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
       
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />

                <a href='CSDailyindex.php' class='btn btn-danger'>Back</a>
            </td>
        </tr>
    </table>
</form>

<?php
 
// check if form was submitted
if($_POST){
     
    try{
     
        // write update query
        // in this case, it seemed like we have so many fields to pass and 
        // it is better to label them and not use question marks
        $query = "UPDATE Cyber_Security_Daily
                    SET Name=:Name,In_time=:In_time,
  Work_Start_Time=:Work_Start_Time,
  Lectures_Taken=:Lectures_Taken,
  CISEH=:CISEH,
  CPTE=:CPTE,
  Corporate_Training=:Corporate_Training,
  Inquiry_attend=:Inquiry_attend,
  New_Reserch=:New_Reserch,
  Extra_work=:Extra_work,
  Total=:Total,
  Virtual_Meeting_attend=:Virtual_Meeting_attend,
  Entertainment_time_taken=:Entertainment_time_taken,
  Total_Breaks=:Total_Breaks,
  Out_time=:Out_time
                    WHERE id = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
         $In_time=htmlspecialchars(strip_tags($_POST['In_time']));
          $Work_Start_Time=htmlspecialchars(strip_tags($_POST['Work_Start_Time']));
           $Lectures_Taken=htmlspecialchars(strip_tags($_POST['Lectures_Taken']));
            $CISEH=htmlspecialchars(strip_tags($_POST['CISEH']));
 $CPTE=htmlspecialchars(strip_tags($_POST['CPTE']));
  $Corporate_Training=htmlspecialchars(strip_tags($_POST['Corporate_Training']));
   $Inquiry_attend=htmlspecialchars(strip_tags($_POST['Inquiry_attend']));
    $New_Reserch=htmlspecialchars(strip_tags($_POST['New_Reserch']));
     $Extra_work=htmlspecialchars(strip_tags($_POST['Extra_work']));
      $Total=htmlspecialchars(strip_tags($_POST['Total']));
       $Virtual_Meeting_attend=htmlspecialchars(strip_tags($_POST['Virtual_Meeting_attend']));
        $Entertainment_time_taken=htmlspecialchars(strip_tags($_POST['Entertainment_time_taken']));

        $Total_Breaks=htmlspecialchars(strip_tags($_POST['Total_Breaks']));
        $Out_time=htmlspecialchars(strip_tags($_POST['Out_time']));
 
 
        // bind the parameters
       $stmt->bindParam(':Name', $Name);
         $stmt->bindParam(':In_time', $In_time);
          $stmt->bindParam(':Work_Start_Time', $Work_Start_Time);
           $stmt->bindParam(':Lectures_Taken', $Lectures_Taken);
            $stmt->bindParam(':CISEH', $CISEH);
             $stmt->bindParam(':CPTE', $CPTE);
              $stmt->bindParam(':Corporate_Training', $Corporate_Training);
               $stmt->bindParam(':Inquiry_attend', $Inquiry_attend);
                $stmt->bindParam(':New_Reserch', $New_Reserch);
                 $stmt->bindParam(':Extra_work', $Extra_work);
                  $stmt->bindParam(':Total', $Total);
                   $stmt->bindParam(':Virtual_Meeting_attend', $Virtual_Meeting_attend);
                    $stmt->bindParam(':Entertainment_time_taken', $Entertainment_time_taken);
                     $stmt->bindParam(':Total_Breaks', $Total_Breaks);
                      $stmt->bindParam(':Out_time', $Out_time);
        $stmt->bindParam(':id', $id);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
         
    }
     
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>