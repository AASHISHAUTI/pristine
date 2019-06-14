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
    <script>

    </script>          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Add Daily Entry-Business Development</h1>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO Business_Development_Daily SET Name=:Name,In_time=:In_time,Work_Start_Time=:Work_Start_Time,
        Follow_UP_from_Counsellor=:Follow_UP_from_Counsellor,
        Total_call_for_Meetings=:Total_call_for_Meetings,Any_Visit=:Any_Visit,Direct_Walking=:Direct_Walking,
        Direct_Call=:Direct_Call,Mail=:Mail,ENQUIRY=:ENQUIRY,Total=:Total,EXTRA_WORK=:EXTRA_WORK,
        Lecture_attend=:Lecture_attend,Entertainment_time_taken=:Entertainment_time_taken,
        Total_Breaks=:Total_Breaks,Out_time=:Out_time, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
        $In_time=htmlspecialchars(strip_tags($_POST['In_time']));
        $Work_Start_Time=htmlspecialchars(strip_tags($_POST['Work_Start_Time']));
        $Follow_UP_from_Counsellor=htmlspecialchars(strip_tags($_POST['Follow_UP_from_Counsellor']));
        $Total_call_for_Meetings=htmlspecialchars(strip_tags($_POST['Total_call_for_Meetings']));
        $Any_Visit=htmlspecialchars(strip_tags($_POST['Any_Visit']));
        $Direct_Walking=htmlspecialchars(strip_tags($_POST['Direct_Walking']));
        $Direct_Call=htmlspecialchars(strip_tags($_POST['Direct_Call']));
        $Mail=htmlspecialchars(strip_tags($_POST['Mail']));
        $ENQUIRY=htmlspecialchars(strip_tags($_POST['ENQUIRY']));
        $Total=htmlspecialchars(strip_tags($_POST['Total']));
        $EXTRA_WORK=htmlspecialchars(strip_tags($_POST['EXTRA_WORK']));
        $Lecture_attend=htmlspecialchars(strip_tags($_POST['Lecture_attend']));
        $Entertainment_time_taken=htmlspecialchars(strip_tags($_POST['Entertainment_time_taken']));
        $Total_Breaks=htmlspecialchars(strip_tags($_POST['Total_Breaks']));
         $Out_time=htmlspecialchars(strip_tags($_POST['Out_time']));

        // bind the parameters
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':In_time', $In_time);
        $stmt->bindParam(':Work_Start_Time', $Work_Start_Time);
        $stmt->bindParam(':Follow_UP_from_Counsellor', $Follow_UP_from_Counsellor);
        $stmt->bindParam(':Total_call_for_Meetings', $Total_call_for_Meetings);
        $stmt->bindParam(':Any_Visit', $Any_Visit);
        $stmt->bindParam(':Direct_Walking', $Direct_Walking);
        $stmt->bindParam(':Direct_Call', $Direct_Call);
        $stmt->bindParam(':Mail', $Mail);
        $stmt->bindParam(':ENQUIRY', $ENQUIRY);
        $stmt->bindParam(':Total', $Total);
        $stmt->bindParam(':EXTRA_WORK', $EXTRA_WORK);
        $stmt->bindParam(':Lecture_attend', $Lecture_attend);
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
            <td><input type='text' name='Name' class='form-control' placeholder="Enter your Name" required/> </td>
        </tr>
        <tr>
            <td>In Time</td>
            <td><input type='time' name='In_time' class='form-control' placeholder="Enter your In Time" required /></td>
        </tr>
        
        <tr>
            <td>Work Start Time</td>
            <td><input type='time' name='Work_Start_Time' class='form-control' placeholder="Enter your Work Start Time" required/></td>
        </tr>
        
        <tr>
            <td>Follow UP from Counsellor</td>
            <td><input type='text' name='Follow_UP_from_Counsellor' class='form-control' placeholder="Enter Follow UP from Counsellor" required /></td>
        </tr>
        
        <tr>
            <td>Total call for Meetings</td>
            <td><input type='text' name='Total_call_for_Meetings' class='form-control' placeholder="Enter Total call for Meetings" required /></td>
        </tr>
        
        <tr>
            <td>Any Visit</td>
            <td><input type='text' name='Any_Visit' class='form-control' placeholder="Enter Any Visit" required /></td>
        </tr>
        
        <tr>
            <td>Direct Walking</td>
            <td><input type='text' name='Direct_Walking' class='form-control' placeholder="Enter Direct Walking" required/></td>
        </tr>
        
        <tr>
            <td>Direct Call</td>
            <td><input type='text' name='Direct_Call' class='form-control' placeholder="Enter Direct Call" required/></td>
        </tr>
        
        <tr>
            <td>Mail</td>
            <td><input type='text' name='Mail' class='form-control' placeholder="Enter Mail " required/></td>
        </tr>
        
        <tr>
            <td>ENQUIRY</td>
            <td><input type='text' name='ENQUIRY' class='form-control' placeholder="Enter Enquiry" required/></td>
        </tr>
        
        <tr>
            <td>Total</td>
            <td><input type='text' name='Total' class='form-control' placeholder="Enter Total" required/></td>
        </tr>
        
        <tr>
            <td>EXTRA WORK</td>
            <td><input type='text' name='EXTRA_WORK' class='form-control' placeholder="Enter Extra Work" required/></td>
        </tr>
        
        <tr>
            <td>Lecture attend</td>
            <td><input type='text' name='Lecture_attend' class='form-control' placeholder="Enter total Lecture attend " required/></td>
        </tr>
        
        <tr>
            <td>Entertainment time taken</td>
            <td><input type='text' name='Entertainment_time_taken' class='form-control' placeholder="Enter Entertainment time taken" required /></td>
        </tr>
        
        <tr>
            <td>Total Breaks</td>
            <td><input type='text' name='Total_Breaks' class='form-control'  placeholder="Enter Total Breaks" required /></td>
        </tr>
        

        <tr>
            <td>Out time</td>
            <td><input type='time' name='Out_time' class='form-control' placeholder="Enter Out Time" required /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='BDDailyindex.php' class='btn btn-danger'>Back</a>
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
