<?php
   session_start();
include("checklogin.php");
check_login();
?>



<!DOCTYPE HTML>
<html>
<head>
    <title>IT Counsellor-Monthly</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update IT Counsellor-Monthly</h1>
                  <a href='ITMonthlyindex.php' class='btn btn-danger'>Back</a>
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
    $query = "SELECT id,Name,Target,Meetings_Topics,Conclusion, Result FROM IT_Counseller_Monthly WHERE id = ? LIMIT 0,1";
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
    $Meetings_Topics = $row['Meetings_Topics'];
     $Conclusion = $row['Conclusion'];
      $Result= $row['Result'];
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
            <td>Target</td>
            <td><input type='text' name='Target' value="<?php echo htmlspecialchars($Target, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Meetings Topics</td>
            <td><input type='text' name='Meetings_Topics' value="<?php echo htmlspecialchars($Meetings_Topics, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Conclusion</td>
            <td><input type='text' name='Conclusion' value="<?php echo htmlspecialchars($Conclusion, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Result</td>
            <td><input type='text' name='Result' value="<?php echo htmlspecialchars($Result, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='ITMonthlyindex.php' class='btn btn-danger'>Back</a>
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
        $query = "UPDATE IT_Counseller_Monthly
                    SET Name=:Name, Target=:Target,Meetings_Topics=:Meetings_Topics,Conclusion=:Conclusion, Result=:Result
                    WHERE id = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
         $Target=htmlspecialchars(strip_tags($_POST['Target']));
          $Meetings_Topics=htmlspecialchars(strip_tags($_POST['Meetings_Topics']));
           $Conclusion=htmlspecialchars(strip_tags($_POST['Conclusion']));
        $Result=htmlspecialchars(strip_tags($_POST['Result']));
 
        // bind the parameters
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Target', $Target);
        $stmt->bindParam(':Meetings_Topics', $Meetings_Topics);
        $stmt->bindParam(':Conclusion', $Conclusion);
        $stmt->bindParam(':Result', $Result);
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