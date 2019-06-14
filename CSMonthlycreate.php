<?php
   session_start();
include("checklogin.php");
check_login();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Cyber Security Expert-Monthly</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Add Entry Cyber Security Expert-Monthly</h1>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO Cyber_Security_Monthly SET Name=:Name, Target=:Target, Meeting_Topics=:Meeting_Topics,Conclusion=:Conclusion, Result=:Result, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
        $Target=htmlspecialchars(strip_tags($_POST['Target']));

        $Meeting_Topics=htmlspecialchars(strip_tags($_POST['Meeting_Topics']));
        $Conclusion=htmlspecialchars(strip_tags($_POST['Conclusion']));
        $Result=htmlspecialchars(strip_tags($_POST['Result']));
        

 
        // bind the parameters
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Target', $Target);
        $stmt->bindParam(':Meeting_Topics', $Meeting_Topics);
        $stmt->bindParam(':Conclusion', $Conclusion);
        $stmt->bindParam(':Result', $Result);
         
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
            <td>Target</td>
            <td><input type='text' name='Target' class='form-control' placeholder="Target" required /></td>
        </tr>
        <tr>
            <td>Meeting Topics</td>
            <td><input type='text' name='Meeting_Topics' class='form-control' placeholder="Meeting Topics" required/></td>
        </tr>
        <tr>
            <td>Conclusion</td>
            <td><input type='text' name='Conclusion' class='form-control' placeholder="Conclusion" required  /></td>
        </tr>
        <tr>
            <td>Result</td>
            <td><input type='text' name='Result' class='form-control' placeholder="Result" required  /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='CSMonthlyindex.php' class='btn btn-danger'>Back</a>
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
