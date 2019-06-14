<?php
   session_start();
include("checklogin.php");
check_login();
?>





<!DOCTYPE HTML>
<html>
<head>
    <title>IT Counsellor-Daily</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update IT Counsellor-Daily</h1>
                 <a href='ITDailyindex.php' class='btn btn-danger'>Back</a>
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
    $query = "SELECT id,Name,In_time,Work_Start_Time,
        Follow_UP_Taken,Shiksha,Sulekha,Direct_Walking,
       Direct_Call,Mail,Rizwan_Sir_Reference_FB,
Leads_Forwarded_to_Other_Branch,ENQUIRY,Total,EXTRA_WORK,
        Lecture_attend,Entertainment_time_taken,
        Total_Breaks,Out_time FROM IT_Counseller_Daily WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
     
    // this is the first question mark
    $stmt->bindParam(1, $id);
     
    // execute our query
    $stmt->execute();
     
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $Name = $row['Name'];
    $In_time = $row['In_time'];
    $Work_Start_Time = $row['Work_Start_Time'];
    $Follow_UP_Taken = $row['Follow_UP_Taken'];
    $Shiksha = $row['Shiksha'];
    $Sulekha = $row['Sulekha'];
    $Direct_Walking = $row['Direct_Walking'];
    $Direct_Call = $row['Direct_Call'];
    $Mail = $row['Mail'];
    $Rizwan_Sir_Reference_FB = $row['Rizwan_Sir_Reference_FB'];
    $Leads_Forwarded_to_Other_Branch = $row['Leads_Forwarded_to_Other_Branch'];
    $ENQUIRY = $row['ENQUIRY'];
    $Total = $row['Total'];
    $EXTRA_WORK = $row['EXTRA_WORK'];
    $Lecture_attend = $row['Lecture_attend'];
    $Entertainment_time_taken = $row['Entertainment_time_taken'];
    $Total_Breaks = $row['Total_Breaks'];
    $Out_time = $row['Out_time'];

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
            <td>In time</td>
            <td><input type='time' name='In_time' value="<?php echo htmlspecialchars($In_time, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
        <tr>
            <td>Work Start Time</td>
            <td><input type='time' name='Work_Start_Time' value="<?php echo htmlspecialchars($Work_Start_Time, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Follow UP Taken</td>
            <td><input type='text' name='Follow_UP_Taken' value="<?php echo htmlspecialchars($Follow_UP_Taken, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Shiksha</td>
            <td><input type='text' name='Shiksha' value="<?php echo htmlspecialchars($Shiksha, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Sulekha</td>
            <td><input type='text' name='Sulekha' value="<?php echo htmlspecialchars($Sulekha, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Direct Walking</td>
            <td><input type='text' name='Direct_Walking' value="<?php echo htmlspecialchars($Direct_Walking, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Direct Call</td>
            <td><input type='text' name='Direct_Call' value="<?php echo htmlspecialchars($Direct_Call, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Mail</td>
            <td><input type='text' name='Mail' value="<?php echo htmlspecialchars($Mail, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Rizwan Sir Reference FB</td>
            <td><input type='text' name='Rizwan_Sir_Reference_FB' value="<?php echo htmlspecialchars($Rizwan_Sir_Reference_FB, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Leads Forwarded to Other Branch</td>
            <td><input type='text' name='Leads_Forwarded_to_Other_Branch' value="<?php echo htmlspecialchars($Leads_Forwarded_to_Other_Branch, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>ENQUIRY</td>
            <td><input type='text' name='ENQUIRY' value="<?php echo htmlspecialchars($ENQUIRY, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><input type='text' name='Total' value="<?php echo htmlspecialchars($Total, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>EXTRA WORK</td>
            <td><input type='text' name='EXTRA_WORK' value="<?php echo htmlspecialchars($EXTRA_WORK, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Lecture attend</td>
            <td><input type='text' name='Lecture_attend' value="<?php echo htmlspecialchars($Lecture_attend, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Entertainment time taken</td>
            <td><input type='text' name='Entertainment_time_taken' value="<?php echo htmlspecialchars($Entertainment_time_taken, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Total Breaks</td>
            <td><input type='text' name='Total_Breaks' value="<?php echo htmlspecialchars($Total_Breaks, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        <tr>
            <td>Out time</td>
            <td><input type='time' name='Out_time' value="<?php echo htmlspecialchars($Out_time, ENT_QUOTES);  ?>" class='form-control' /></td>
        </tr>
        
        
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='ITDailyindex.php' class='btn btn-danger'>Back</a>
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
        $query = "UPDATE IT_Counseller_Daily 
                    SET Name=:Name,In_time=:In_time,Work_Start_Time=:Work_Start_Time,
        Follow_UP_Taken=:Follow_UP_Taken,
        Shiksha=:Shiksha,Sulekha=:Sulekha,
       Direct_Walking=:Direct_Walking,
        Direct_Call=:Direct_Call,Mail=:Mail,
Rizwan_Sir_Reference_FB=:Rizwan_Sir_Reference_FB,
Leads_Forwarded_to_Other_Branch=:Leads_Forwarded_to_Other_Branch,
ENQUIRY=:ENQUIRY,Total=:Total,EXTRA_WORK=:EXTRA_WORK,
        Lecture_attend=:Lecture_attend,Entertainment_time_taken=:Entertainment_time_taken,
        Total_Breaks=:Total_Breaks,Out_time=:Out_time WHERE id = :id";
 
        // prepare query for excecution
        $stmt = $con->prepare($query);
 
        // posted values
        $Name=htmlspecialchars(strip_tags($_POST['Name']));
        $In_time=htmlspecialchars(strip_tags($_POST['In_time']));
        $Work_Start_Time=htmlspecialchars(strip_tags($_POST['Work_Start_Time']));
        $Follow_UP_Taken=htmlspecialchars(strip_tags($_POST['Follow_UP_Taken']));
        $Shiksha=htmlspecialchars(strip_tags($_POST['Shiksha']));
        $Sulekha=htmlspecialchars(strip_tags($_POST['Sulekha']));
        $Direct_Walking=htmlspecialchars(strip_tags($_POST['Direct_Walking']));
        $Direct_Call=htmlspecialchars(strip_tags($_POST['Direct_Call']));
        $Mail=htmlspecialchars(strip_tags($_POST['Mail']));
        $Rizwan_Sir_Reference_FB=htmlspecialchars(strip_tags($_POST['Rizwan_Sir_Reference_FB']));
        $Leads_Forwarded_to_Other_Branch=htmlspecialchars(strip_tags($_POST['Leads_Forwarded_to_Other_Branch']));
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
        $stmt->bindParam(':Follow_UP_Taken', $Follow_UP_Taken);
        $stmt->bindParam(':Shiksha', $Shiksha);
        $stmt->bindParam(':Sulekha', $Sulekha);
        $stmt->bindParam(':Direct_Walking', $Direct_Walking);
        $stmt->bindParam(':Direct_Call', $Direct_Call);
        $stmt->bindParam(':Mail', $Mail);
        $stmt->bindParam(':Rizwan_Sir_Reference_FB', $Rizwan_Sir_Reference_FB);
        $stmt->bindParam(':Leads_Forwarded_to_Other_Branch', $Leads_Forwarded_to_Other_Branch);
        $stmt->bindParam(':ENQUIRY', $ENQUIRY);
        $stmt->bindParam(':Total', $Total);
        $stmt->bindParam(':EXTRA_WORK', $EXTRA_WORK);
        $stmt->bindParam(':Lecture_attend', $Lecture_attend);
        $stmt->bindParam(':Entertainment_time_taken', $Entertainment_time_taken);
        $stmt->bindParam(':Total_Breaks', $Total_Breaks);
        $stmt->bindParam(':Out_time', $Out_time);
 
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