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
            <h1>Update Business Devlopement-Monthly</h1>
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
    $query = "SELECT id, Name,Target, Meetings_in_Colleges, Meeting_in_Companies, Meeting_with_others,Ready_for_seminar,
Ready_for_workshop,Ready_for_Short_term_course FROM Business_Development_Monthly WHERE id = ? LIMIT 0,1";
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
    $Meetings_in_Colleges = $row['Meetings_in_Colleges'];
    $Meeting_in_Companies = $row['Meeting_in_Companies'];
    $Meeting_with_others = $row['Meeting_with_others'];
    $Ready_for_seminar = $row['Ready_for_seminar'];
    $Ready_for_workshop = $row['Ready_for_workshop'];
    $Ready_for_Short_term_course = $row['Ready_for_Short_term_course'];

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
            <td>Meetings in Colleges</td>
            <td><input type='text' name='Meetings_in_Colleges' value="<?php echo htmlspecialchars($Meetings_in_Colleges, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Meeting in Companies</td>
            <td><input type='text' name='Meeting_in_Companies' value="<?php echo htmlspecialchars($Meeting_in_Companies, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Meeting with others</td>
            <td><input type='text' name='Meeting_with_others' value="<?php echo htmlspecialchars($Meeting_with_others, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Ready for seminar</td>
            <td><input type='text' name='Ready_for_seminar' value="<?php echo htmlspecialchars($Ready_for_seminar, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Ready for workshop</td>
            <td><input type='text' name='Ready_for_workshop' value="<?php echo htmlspecialchars($Ready_for_workshop, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Ready for Short term course</td>
            <td><input type='text' name='Ready_for_Short_term_course' value="<?php echo htmlspecialchars($Ready_for_Short_term_course, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' class='btn btn-primary' />
                    <input type='reset' value='Reset' class='btn btn-primary' />
 
                   <a href='BDMonthlyindex.php' class='btn btn-danger'>Back</a>
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
        $query = "UPDATE Business_Development_Monthly 
                    SET Name=:Name,Target=:Target, Meetings_in_Colleges=:Meetings_in_Colleges, Meeting_in_Companies=:Meeting_in_Companies, Meeting_with_others=:Meeting_with_others,Ready_for_seminar=:Ready_for_seminar,
                    Ready_for_workshop=:Ready_for_workshop,Ready_for_Short_term_course=:Ready_for_Short_term_course
                    WHERE id = :id";
 
        // prepare query for excecution
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