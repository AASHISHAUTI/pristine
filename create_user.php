<?php
   session_start();
include("checklogin.php");
check_login();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Add User</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script>

    </script>          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Add User</h1>
        </div>
      
    <!-- html form to create product will be here -->
    <!-- PHP insert code will be here -->
    <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO tbl_users SET user_role_id=:user_role_id, first_name=:first_name, last_name=:last_name, email=:email, password=:password";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $user_role_id=htmlspecialchars(strip_tags($_POST['user_role_id']));
        $first_name=htmlspecialchars(strip_tags($_POST['first_name']));
        $last_name=htmlspecialchars(strip_tags($_POST['last_name']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
        $password=htmlspecialchars(strip_tags($_POST['password']));
        // bind the parameters
          $stmt->bindParam(':user_role_id', $user_role_id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
         
        // specify when this record was inserted to the database
        //$created=date('Y-m-d H:i:s');
        //$stmt->bindParam(':created', $created);
         
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
            <td>User Role</td>
            <td>
            <select name="user_role_id"  class='form-control' placeholder="Enter your User Role Name" required>
                <option value="1">Admin</option>
                <option value="2">Business Devlopment</option>
                <option value="3">Cyber Security</option>
                <option value="4">IT Counsellor</option>
            </select>
        </tr>

        <tr>
            <td>First Name</td>
            <td><input type="text" name="first_name" class='form-control' placeholder="Enter your First Name" required></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="last_name" class='form-control' placeholder="Enter your Last Name" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" class='form-control' placeholder="Enter your Email" required></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" name="password" class='form-control' placeholder="Enter your password" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <input type='reset' value='Reset' class='btn btn-primary' />
                <a href='create_index.php' class='btn btn-danger'>Back</a>
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
