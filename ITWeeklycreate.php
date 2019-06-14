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
            <h1>Add Entry IT Counsellor-Weekly</h1>
              <a href='ITWeeklyindex.php' class='btn btn-danger'>Back</a>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO IT_Counseller_Weekly SET Name=:Name, INQUIRY_FORM_Count=:INQUIRY_FORM_Count,
         FEEDBACK_FORM_COUNT=:FEEDBACK_FORM_COUNT,CISEH_BROTURE=:CISEH_BROTURE,CPTE_BROTURE=:CPTE_BROTURE,
         CAAD_BROTURE=:CAAD_BROTURE,FEES_PENDING=:FEES_PENDING,Internal_Discussion=:Internal_Discussion,
         Any_ideas=:Any_ideas,Exam_Schedule=:Exam_Schedule,Certificate_status=:Certificate_status,
         Feedback_from_Students=:Feedback_from_Students, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
        $INQUIRY_FORM_Count=htmlspecialchars(strip_tags($_POST['INQUIRY_FORM_Count']));
        $FEEDBACK_FORM_COUNT=htmlspecialchars(strip_tags($_POST['FEEDBACK_FORM_COUNT']));
        $CISEH_BROTURE=htmlspecialchars(strip_tags($_POST['CISEH_BROTURE']));
        $CPTE_BROTURE=htmlspecialchars(strip_tags($_POST['CPTE_BROTURE']));
        $CAAD_BROTURE=htmlspecialchars(strip_tags($_POST['CAAD_BROTURE']));
        $FEES_PENDING=htmlspecialchars(strip_tags($_POST['FEES_PENDING']));
        $Internal_Discussion=htmlspecialchars(strip_tags($_POST['Internal_Discussion']));
        $Any_ideas=htmlspecialchars(strip_tags($_POST['Any_ideas']));
        $Exam_Schedule=htmlspecialchars(strip_tags($_POST['Exam_Schedule']));
        $Certificate_status=htmlspecialchars(strip_tags($_POST['Certificate_status']));
        $Feedback_from_Students=htmlspecialchars(strip_tags($_POST['Feedback_from_Students']));
     
 
        // bind the parameters
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':INQUIRY_FORM_Count', $INQUIRY_FORM_Count);
        $stmt->bindParam(':FEEDBACK_FORM_COUNT', $FEEDBACK_FORM_COUNT);
        $stmt->bindParam(':CISEH_BROTURE', $CISEH_BROTURE);
        $stmt->bindParam(':CPTE_BROTURE', $CPTE_BROTURE);
        $stmt->bindParam(':CAAD_BROTURE', $CAAD_BROTURE);
        $stmt->bindParam(':FEES_PENDING', $FEES_PENDING);
        $stmt->bindParam(':Internal_Discussion', $Internal_Discussion);
        $stmt->bindParam(':Any_ideas', $Any_ideas);
        $stmt->bindParam(':Exam_Schedule', $Exam_Schedule);
        $stmt->bindParam(':Certificate_status', $Certificate_status);
        $stmt->bindParam(':Feedback_from_Students', $Feedback_from_Students);
     

         
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
            <td><input type='text' name='Name' class='form-control' placeholder="Enter your Name" required/></td>
        </tr>
        <tr>
            <td>INQUIRY FORM Count</td>
            <td><input type='text' name='INQUIRY_FORM_Count' class='form-control' placeholder="INQUIRY FORM Count" required /></td>
        </tr>
        <tr>
            <td>FEEDBACK FORM COUNT</td>
            <td><input type='text' name='FEEDBACK_FORM_COUNT' class='form-control' placeholder="FEEDBACK FORM COUNT" required/></td>
        </tr>
        <tr>
            <td>CISEH BROTURE</td>
            <td><input type='text' name='CISEH_BROTURE' class='form-control' placeholder="CISEH BROTURE" required/></td>
        </tr>
        <tr>
            <td>CPTE BROTURE</td>
            <td><input type='text' name='CPTE_BROTURE' class='form-control' placeholder="CPTE BROTURE" required /></td>
        </tr>
        <tr>
            <td>CAAD BROTURE</td>
            <td><input type='text' name='CAAD_BROTURE' class='form-control' placeholder="CAAD BROTURE" required /></td>
        </tr>
        <tr>
            <td>FEES PENDING</td>
            <td><input type='text' name='FEES_PENDING' class='form-control' placeholder="FEES PENDING" required /></td>
        </tr>
        <tr>
            <td>Internal Discussion</td>
            <td><input type='text' name='Internal_Discussion' class='form-control'  placeholder="Internal Discussion" required/></td>
        </tr>
        <tr>
            <td>Any ideas</td>
            <td><input type='text' name='Any_ideas' class='form-control' placeholder="Any ideas" required /></td>
        </tr>
        <tr>
            <td>Exam Schedule</td>
            <td><input type='text' name='Exam_Schedule' class='form-control' placeholder="Exam Schedule" required /></td>
        </tr>
        <tr>
            <td>Certificate status</td>
            <td><input type='text' name='Certificate_status' class='form-control' placeholder="Certificate status" required /></td>
        </tr>
        <tr>
            <td>Feedback from Students</td>
            <td><input type='text' name='Feedback_from_Students' class='form-control' placeholder="Feedback from Students" required /></td>
        </tr>
    
        
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='ITWeeklyindex.php' class='btn btn-danger'>Back</a>
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
