<?php
   session_start();
include("checklogin.php");
check_login();
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Business Developement-Monthly</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Add Business Developement-Monthly</h1>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO Business_Development_Monthly SET Name=:Name,Target=:Target, Meetings_in_Colleges=:Meetings_in_Colleges, Meeting_in_Companies=:Meeting_in_Companies, Meeting_with_others=:Meeting_with_others,Ready_for_seminar=:Ready_for_seminar,Ready_for_workshop=:Ready_for_workshop,Ready_for_Short_term_course=:Ready_for_Short_term_course,created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
        $Target=htmlspecialchars(strip_tags($_POST['Target']));
        $Meetings_in_Colleges=htmlspecialchars(strip_tags($_POST['Meetings_in_Colleges']));
        $Meeting_in_Companies=htmlspecialchars(strip_tags($_POST['Meeting_in_Companies']));
        $Meeting_with_others=htmlspecialchars(strip_tags($_POST['Meeting_with_others']));
        $Ready_for_seminar=htmlspecialchars(strip_tags($_POST['Ready_for_seminar']));
        $Ready_for_workshop=htmlspecialchars(strip_tags($_POST['Ready_for_workshop']));
        $Ready_for_Short_term_course=htmlspecialchars(strip_tags($_POST['Ready_for_Short_term_course']));
        // bind the parameters
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Target', $Target);
        $stmt->bindParam(':Meetings_in_Colleges', $Meetings_in_Colleges);
        $stmt->bindParam(':Meeting_in_Companies', $Meeting_in_Companies);
        $stmt->bindParam(':Meeting_with_others', $Meeting_with_others);
        $stmt->bindParam(':Ready_for_seminar', $Ready_for_seminar);
        $stmt->bindParam(':Ready_for_workshop', $Ready_for_workshop);
        $stmt->bindParam(':Ready_for_Short_term_course', $Ready_for_Short_term_course);
         
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
            <td>Target</td>
            <td><input type='text' name='Target' class='form-control' placeholder="Enter Target" required /></td>
        </tr>
        
        <tr>
            <td>Meetings in Colleges</td>
            <td><input type='text' name='Meetings_in_Colleges' class='form-control' placeholder="Meetings in College" required /></td>
        </tr>
        
        <tr>
            <td>Meeting in Companies</td>
            <td><input type='text' name='Meeting_in_Companies' class='form-control' placeholder="Meetings in Companies" required /></td>
        </tr>
        
        <tr>
            <td>Meeting with others</td>
            <td><input type='text' name='Meeting_with_others' class='form-control' placeholder="Meetings with others" required /></td>
        </tr>
        <tr>
            <td>Ready for seminar</td>
            <td><input type='text' name='Ready_for_seminar' class='form-control' placeholder="Ready For Seminar" required/></td>
        </tr>
        <tr>
            <td>Ready for workshop</td>
            <td><input type='text' name='Ready_for_workshop' class='form-control' placeholder="Ready For Workshop" required /></td>
        </tr>
        <tr>
            <td>Ready for Short term course</td>
            <td><input type='text' name='Ready_for_Short_term_course' class='form-control' placeholder="Ready For Short term Course" required/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='BDMonthlyindex.php' class='btn btn-danger'>Back</a>
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
