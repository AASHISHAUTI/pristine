<?php
   session_start();
include("checklogin.php");
check_login();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Business Developement-Daily</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Business Developement-Daily</h1>
        </div>
     
        <!-- PHP code to read records will be here -->
        <?php
// include database connection
include 'config/database.php';
// PAGINATION VARIABLES
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set records or rows of data per page
$records_per_page = 10;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page; 
// delete message prompt will be here
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div class='alert alert-success'>Record was deleted.</div>";
}
 

// select data for current page
$query = "SELECT id, Name,In_time,Work_Start_Time,
        Follow_UP_from_Counsellor,
        Total_call_for_Meetings,Any_Visit,Direct_Walking,
       Direct_Call,Mail,ENQUIRY,Total,EXTRA_WORK,
        Lecture_attend,Entertainment_time_taken,
        Total_Breaks,Out_time FROM Business_Development_Daily ORDER BY id ASC
    LIMIT :from_record_num, :records_per_page";
 
$stmt = $con->prepare($query);
$stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
$stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
// link to create record form


echo "<table>";
echo "<tr>";
echo "<td>";
echo "<a href='BDDailycreate.php' class='btn btn-primary m-b-1em'>Create New Entry</a>";echo "</td>";
echo "<td>";
echo "<a href='dashboard.php' class='btn btn-primary m-b-1em'>Back to Dashboard</a>";echo "</td>";
 echo "</tr>";
echo "</table>";
 
//check if more than 0 record found
if($num>0){
 
    // data from database will be here
    echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
    //creating our table heading
    echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>In Time</th>";
        echo "<th>Work Start Time</th>";
        echo "<th>Follow UP from Counsellor</th>";
        echo "<th>Total call for Meetings</th>";
        echo "<th>Any Visit</th>";
        echo "<th>Direct Walking</th>";
        echo "<th>Direct Call</th>";
        echo "<th>Mail</th>";
        echo "<th>ENQUIRY</th>";
        echo "<th>Total</th>";
        echo "<th>EXTRA_WORK</th>";
        echo "<th>Lecture_attend</th>";
        echo "<th>Entertainment_time_taken</th>";
        echo "<th>Total_Breaks</th>";
        echo "<th>Out_time</th>";
        
        echo "<th>Action</th>";
        
    echo "</tr>";
     
    // table body will be here
    // retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
     
    // creating new table row per record
    echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$Name}</td>";
        echo "<td>{$In_time}</td>";
        echo "<td>{$Work_Start_Time}</td>";
        echo "<td>{$Follow_UP_from_Counsellor}</td>";
        echo "<td>{$Total_call_for_Meetings}</td>";
        echo "<td>{$Any_Visit}</td>";
        echo "<td>{$Direct_Walking}</td>";
        echo "<td>{$Direct_Call}</td>";
        echo "<td>{$Mail}</td>";
        echo "<td>{$ENQUIRY}</td>";
        echo "<td>{$Total}</td>";
        echo "<td>{$EXTRA_WORK}</td>";
        echo "<td>{$Lecture_attend}</td>";
        echo "<td>{$Entertainment_time_taken}</td>";
        echo "<td>{$Total_Breaks}</td>";
        echo "<td>{$Out_time}</td>";
        
        echo "<td>";
            // read one record 
            echo "<a href='BDDailyread_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
             
            // we will use this links on next part of this post
            echo "<a href='BDDailyupdate.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
// PAGINATION
// count total number of rows
$query = "SELECT COUNT(*) as total_rows FROM Business_Development_Daily";
$stmt = $con->prepare($query);
 
// execute query
$stmt->execute();
 
// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];

// paginate records
$page_url="BDDailyindex.php?";
include_once "paging.php";

}

 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}

?>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
<script type='text/javascript'>
// confirm record deletion
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'BDDailydelete.php?id=' + id;
    } 
}
</script>
 
</body>
</html>

