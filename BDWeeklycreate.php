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
            <h1>Add New Entry Business Developement-Weekly</h1>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO Business_Development_Weekly SET Name=:Name,Schedule_Weekly_Meeting=:Schedule_Weekly_Meeting,
        Take_Feedback_from_students_Orally=:Take_Feedback_from_students_Orally,Introduction_to_New_Students=:Introduction_to_New_Students,
        FEES_PENDING_Task_checking_with_Counsellors=:FEES_PENDING_Task_checking_with_Counsellors,Internal_Discussion=:Internal_Discussion, created=:created";
 
        // prepare query for execution
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
            <td>Schedule Weekly Meeting</td>
            <td><input type='text' name='Schedule_Weekly_Meeting' class='form-control' placeholder="Schedule Weekly Meeting" required/></td>
        </tr>
        <tr>
            <td>Take Feedback from students Orally</td>
            <td><input type='text' name='Take_Feedback_from_students_Orally' class='form-control' placeholder="Take Feedback from students Orally" required/></td>
        </tr>
        <tr>
            <td>Introduction to New Students</td>
            <td><input type='text' name='Introduction_to_New_Students' class='form-control' placeholder="Introduction to New Students" required/></td>
        </tr>
        <tr>
            <td>FEES Pending Task checking with Counsellors</td>
            <td><input type='text' name='FEES_PENDING_Task_checking_with_Counsellors' class='form-control' placeholder="FEES Pending Task checking with Counsellors" required /></td>
        </tr>
        <tr>
            <td>Internal Discussion</td>
            <td><input type='text' name='Internal_Discussion' class='form-control' placeholder="Internal Discussion" required/></td>
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
          
    </div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>
