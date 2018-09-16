
<!DOCTYPE html>
<!-- saved from url=(0034)http://localhost/mysite/Home.html# -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Monotype Corosiva;
    padding: 20px;
    background: #F5B7B1  ;
}

/* Header/Blog Title */
.header {
    padding: 40px;
    font-size: 60px;
    text-align: right;
    background: #008080 url("https://i2.wp.com/hbgmedicalassistance.com/wp-content/uploads/2015/07/fortis-hospital-logo.jpg?w=700") no-repeat local top left;
   
}

/* Style the top navigation bar */
.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: red;
	font-family: Arial, Helvetica, sans-serif;
}

/* Style the topnav links */
.topnav a {
   display: block;
    color: white;
    text-align: center;
    padding: 20px 16px;
    text-decoration: none;
	float: left;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #111;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
    float: left;
    width: 75%;
}

/* Right column */
.rightcolumn {
    float: left;
    width: 25%;
    background-color: #f1f1f1;
    padding-left: 20px;
}

/* Fake image */
.fakeimg {
    
    width: 100%;
    
}

/* Add a card effect for articles */
.card {
     background-color: #D1F2EB;
     padding: 20px;
     margin-top: 20px;
     }

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
    margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 800px) {
    .leftcolumn, .rightcolumn {   
        width: 100%;
        padding: 0;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media (max-width: 400px) {
    .topnav a {
        float: none;
        width:100%;
    }
}
</style>

<body>

<div class="header">
  <h2>APOLLO FORTIS</h2>
</div>

<div class="topnav">
    <a href="http://localhost/mysite/patientHome.html">Home</a>
  <a href="http://localhost/mysite/pHistory.html">History</a>
  <a href="http://localhost/mysite/Application.php">Appointment</a>
  <a href="http://localhost/mysite/pAchievements.html">Achievements</a>
   <a href="http://localhost/mysite/logout.php" style="float:right">Logout</a>
  </div>


<?php

session_start();

$connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysqli_select_db($connection,"testdb"); // Selecting Database from Server

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$name=htmlspecialchars($_SESSION['username']);
$depno = $_POST['depname'];
$docno = $_POST['docname'];
$date =$_POST['date'];
$time=htmlspecialchars($_POST['time']);
$reason = htmlspecialchars($_POST['reason']);

$mydepname=mysqli_query($connection,"SELECT deptname FROM department WHERE deptid=$depno");
$id3=mysqli_fetch_row($mydepname);
$depname=$id3[0];

$mydocname=mysqli_query($connection,"SELECT docname FROM department WHERE deptid=$depno AND deptname='$depname'" );
$id4=mysqli_fetch_row($mydocname);
$docname=$id4[0];

$result = mysqli_query($connection,"SELECT * FROM department WHERE deptid=$depno AND docid=$docno AND '".$time."' BETWEEN startTime AND endTime");
$id2 = mysqli_fetch_row($result);
$addup = '00:30'; 
//var_dump($id2);
if(empty($id2)){
  echo("Slot is not available.Please select other slot. " );
  echo ('<a href="http://localhost/mysite/Application.php">Click here</a>');
  
}
else{
  $secs = strtotime($addup)-strtotime("00:00");
  $result = date("H:i",strtotime($time)+$secs);
  

if($date !=''&&$reason !=''&&$time !=''){
//Insert Query of SQL
$query = mysqli_query($connection,"insert into bookappointment values ('$depname', '$docname', '$date', '$reason','$time','$name')");
echo "<br/><br/><span>Appointment process successful...!!</span>";
echo("Your appointment slot has been booked from time  " .$time." to ".$result);
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
			

			
			$startTime = mysqli_query($connection,"SELECT startTime FROM department WHERE docname='$docname'");
			$id = mysqli_fetch_row($startTime);
			$stime=$id[0];
			
			$endTime = mysqli_query($connection,"SELECT endTime FROM department WHERE docname='$docname'");
			$id1 = mysqli_fetch_row($endTime);
			$etime=$id1[0];
			
			echo("<br/><br/>Doctors consultation time is from " .$stime." to ".$etime);
}
mysqli_close($connection); // Closing Connection with Server
?>
</body>
</html>