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
            <h1>Update Cyber Security Expert-Weekly</h1>
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
    $Interns_new_task= $row['Interns_new_task'];
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
            <td>Student_task</td>
            <td><input type='text' name='Student_task' value="<?php echo htmlspecialchars($Student_task, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Performance_Interns</td>
            <td><input type='text' name='Performance_Interns' value="<?php echo htmlspecialchars($Performance_Interns, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Interns_new_task</td>
            <td><input type='text' name='Interns_new_task' value="<?php echo htmlspecialchars($Interns_new_task, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
       
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                 <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='CSWeeklyindex.php' class='btn btn-danger'>Back</a>
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
        $query = "UPDATE Cyber_Security_Weekly 
                    SET Name=:Name, Student_task=:Student_task, Performance_Interns=:Performance_Interns, Interns_new_task=:Interns_new_task
                    WHERE id = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
        $Student_task=htmlspecialchars(strip_tags($_POST['Student_task']));
        $Performance_Interns=htmlspecialchars(strip_tags($_POST['Performance_Interns']));
        $Interns_new_task=htmlspecialchars(strip_tags($_POST['Interns_new_task']));
        // bind the parameters
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Student_task', $Student_task);
        $stmt->bindParam(':Performance_Interns', $Performance_Interns);
        $stmt->bindParam(':Interns_new_task', $Interns_new_task); 
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