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
            <h1>Add Daily Entry-Cyber Security Expert</h1>

            <a href='CSDailyindex.php' class='btn btn-danger'>Back</a>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO Cyber_Security_Daily SET Name=:Name,In_time=:In_time,
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
  Out_time=:Out_time, created=:created";
 
        // prepare query for execution
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
                      
         
        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='Name' class='form-control' placeholder="Enter your Name" required /></td>
        </tr>
        <tr>
            <td>In Time</td>
            <td><input type='time' name='In_time' class='form-control' placeholder="Enter In Time" required/></td>
        </tr>
        <tr>
            <td>Work Start Time</td>
            <td><input type='time' name='Work_Start_Time' class='form-control' placeholder="Enter Start Time" required/></td>
        </tr>
        <tr>
            <td>Lectures Taken</td>
            <td><input type='text' name='Lectures_Taken' class='form-control' placeholder="Lectures Taken" required /></td>
        </tr>
        <tr>
            <td>CISEH</td>
            <td><input type='text' name='CISEH' class='form-control' placeholder="CISEH" required /></td>
        </tr>
        <tr>
            <td>CPTE</td>
            <td><input type='text' name='CPTE' class='form-control' placeholder="CPTE" required /></td>
        </tr>
        <tr>
            <td>Corporate Training</td>
            <td><input type='text' name='Corporate_Training' class='form-control' placeholder="Corporate Training" required /></td>
        </tr>
        <tr>
            <td>Inquiry Attend</td>
            <td><input type='text' name='Inquiry_attend' class='form-control' placeholder="Inquiry Attend" required /></td>
        </tr>
        <tr>
            <td>New Reserch</td>
            <td><input type='text' name='New_Reserch' class='form-control' placeholder="New Reserch" required /></td>
        </tr>
        <tr>
            <td>Extra Work</td>
            <td><input type='text' name='Extra_work' class='form-control' placeholder="Extra Work" required /></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><input type='text' name='Total' class='form-control' placeholder="Total" required/></td>
        </tr>
        <tr>
            <td>Virtual Meeting attend</td>
            <td><input type='text' name='Virtual_Meeting_attend' class='form-control' placeholder="Virtual Meeting attend" required /></td>
        </tr>
        <tr>
            <td>Entertainment Time Taken</td>
            <td><input type='text' name='Entertainment_time_taken' class='form-control' placeholder="Entertainment Time Taken" required /></td>
        </tr>
        <tr>
            <td>Total Breaks</td>
            <td><input type='text' name='Total_Breaks' class='form-control' placeholder="Total Breaks" required/></td>
        </tr>
        <tr>
            <td>Out time</td>
            <td><input type='time' name='Out_time' class='form-control' placeholder="Out Time" required/></td>
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
          
    </div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>
