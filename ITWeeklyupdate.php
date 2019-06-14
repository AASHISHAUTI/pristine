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
            <h1>Update IT Counsellor-Weekly</h1>
               <a href='ITWeeklyindex.php' class='btn btn-danger'>Back</a>  
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
    $query = "SELECT id,Name, INQUIRY_FORM_Count,
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
            <td>INQUIRY FORM Count</td>
            <td><input type='text' name='INQUIRY_FORM_Count' value="<?php echo htmlspecialchars($INQUIRY_FORM_Count, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>FEEDBACK FORM COUNT</td>
            <td><input type='text' name='FEEDBACK_FORM_COUNT' value="<?php echo htmlspecialchars($FEEDBACK_FORM_COUNT, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>CISEH BROTURE</td>
            <td><input type='text' name='CISEH_BROTURE' value="<?php echo htmlspecialchars($CISEH_BROTURE, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>CPTE BROTURE</td>
            <td><input type='text' name='CPTE_BROTURE' value="<?php echo htmlspecialchars($CPTE_BROTURE, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>CAAD BROTURE</td>
            <td><input type='text' name='CAAD_BROTURE' value="<?php echo htmlspecialchars($CAAD_BROTURE, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>FEES PENDING</td>
            <td><input type='text' name='FEES_PENDING' value="<?php echo htmlspecialchars($FEES_PENDING, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Internal Discussion</td>
            <td><input type='text' name='Internal_Discussion' value="<?php echo htmlspecialchars($Internal_Discussion, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Any ideas</td>
            <td><input type='text' name='Any_ideas' value="<?php echo htmlspecialchars($Any_ideas, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Exam Schedule</td>
            <td><input type='text' name='Exam_Schedule' value="<?php echo htmlspecialchars($Exam_Schedule, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Certificate status</td>
            <td><input type='text' name='Certificate_status' value="<?php echo htmlspecialchars($Certificate_status, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Feedback from Students</td>
            <td><input type='text' name='Feedback_from_Students' value="<?php echo htmlspecialchars($Feedback_from_Students, ENT_QUOTES);  ?>" class='form-control' /></td>
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

<?php
 
// check if form was submitted
if($_POST){
     
    try{
     
        // write update query
        // in this case, it seemed like we have so many fields to pass and 
        // it is better to label them and not use question marks
        $query = "UPDATE IT_Counseller_Weekly
                    SET Name=:Name, INQUIRY_FORM_Count=:INQUIRY_FORM_Count,
         FEEDBACK_FORM_COUNT=:FEEDBACK_FORM_COUNT,CISEH_BROTURE=:CISEH_BROTURE,CPTE_BROTURE=:CPTE_BROTURE,
         CAAD_BROTURE=:CAAD_BROTURE,FEES_PENDING=:FEES_PENDING,Internal_Discussion=:Internal_Discussion,
         Any_ideas=:Any_ideas,Exam_Schedule=:Exam_Schedule,Certificate_status=:Certificate_status,
         Feedback_from_Students=:Feedback_from_Students
                    WHERE id = :id";
 
        // prepare query for excecution
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