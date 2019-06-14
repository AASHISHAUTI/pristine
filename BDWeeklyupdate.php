<?php
   session_start();
include("checklogin.php");
check_login();
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Business Developement-Weekly</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update Business Developement-Weekly</h1>
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
    $query = "SELECT id, Name,Schedule_Weekly_Meeting,
        Take_Feedback_from_students_Orally,Introduction_to_New_Students,
        FEES_PENDING_Task_checking_with_Counsellors,Internal_Discussion FROM Business_Development_Weekly WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    // values to fill up our form
    $Name = $row['Name'];
    $Schedule_Weekly_Meeting = $row['Schedule_Weekly_Meeting'];
    $Take_Feedback_from_students_Orally = $row['Take_Feedback_from_students_Orally'];
    $Introduction_to_New_Students = $row['Introduction_to_New_Students'];
    $FEES_PENDING_Task_checking_with_Counsellors=$row['FEES_PENDING_Task_checking_with_Counsellors'];
    $Internal_Discussion=$row['Internal_Discussion'];
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
            <td>Schedule Weekly Meeting</td>
            <td><input type='text' name='Schedule_Weekly_Meeting' value="<?php echo htmlspecialchars($Schedule_Weekly_Meeting, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Take Feedback from students Orally</td>
            <td><input type='text' name='Take_Feedback_from_students_Orally' value="<?php echo htmlspecialchars($Take_Feedback_from_students_Orally, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Introduction to New Students</td>
            <td><input type='text' name='Introduction_to_New_Students' value="<?php echo htmlspecialchars($Introduction_to_New_Students, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>FEES PENDING Task checking with Counsellors</td>
            <td><input type='text' name='FEES_PENDING_Task_checking_with_Counsellors' value="<?php echo htmlspecialchars($FEES_PENDING_Task_checking_with_Counsellors, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Internal Discussion</td>
            <td><input type='text' name='Internal_Discussion' value="<?php echo htmlspecialchars($Internal_Discussion, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='BDWeeklyindex.php' class='btn btn-danger'>Back</a>
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
        $query = "UPDATE Business_Development_Weekly
                    SET Name=:Name,Schedule_Weekly_Meeting=:Schedule_Weekly_Meeting,
        Take_Feedback_from_students_Orally=:Take_Feedback_from_students_Orally,Introduction_to_New_Students=:Introduction_to_New_Students,
        FEES_PENDING_Task_checking_with_Counsellors=:FEES_PENDING_Task_checking_with_Counsellors,Internal_Discussion=:Internal_Discussion 
                    WHERE id = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
        $Schedule_Weekly_Meeting=htmlspecialchars(strip_tags($_POST['Schedule_Weekly_Meeting']));
        $Take_Feedback_from_students_Orally=htmlspecialchars(strip_tags($_POST['Take_Feedback_from_students_Orally']));
         $Introduction_to_New_Students=htmlspecialchars(strip_tags($_POST['Introduction_to_New_Students']));
          $FEES_PENDING_Task_checking_with_Counsellors=htmlspecialchars(strip_tags($_POST['FEES_PENDING_Task_checking_with_Counsellors']));
           $Internal_Discussion=htmlspecialchars(strip_tags($_POST['Internal_Discussion']));
 
        // bind the parameters
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Schedule_Weekly_Meeting', $Schedule_Weekly_Meeting);
        $stmt->bindParam(':Take_Feedback_from_students_Orally', $Take_Feedback_from_students_Orally);
        $stmt->bindParam(':Introduction_to_New_Students', $Introduction_to_New_Students);
        $stmt->bindParam(':FEES_PENDING_Task_checking_with_Counsellors', $FEES_PENDING_Task_checking_with_Counsellors);
        $stmt->bindParam(':Internal_Discussion', $Internal_Discussion);
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