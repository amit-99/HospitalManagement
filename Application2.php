<?php
$link=mysqli_connect('localhost','root','');
mysqli_select_db($link,'testdb');
?>
<!DOCTYPE html>
<!-- saved from url=(0034)http://localhost/mysite/Home.html# -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
</head>

<script>
function validateForm() {
	var x = document.forms["myForm"]["date"].value;
    if (x == "") {
        alert("Enter a valid Date");
        return false;
    }
	var x = document.forms["myForm"]["time"].value;
    if (x == "") {
        alert("Enter a valid Time");
        return false;
    }
	x = document.forms["myForm"]["reason"].value;
    if (x == "") {
        alert("Reason must be mentioned");
        return false;
    }
}
</script>

<script language="JavaScript">
    function showInput() {
        document.write("Appointment process successful...!!");
    }
  </script>

<body>

<div class="header">
  <h2>APOLLO FORTIS</h2>
</div>

<div class="topnav">
  <a href="http://localhost/mysite/Home.html">Home</a>
  <a href="http://localhost/mysite/History.html">History</a>
  <a href="http://localhost/mysite/Application.php">Appointment</a>
   <a href="http://localhost/mysite/Doctor.html">Doctor's Login</a>
    <a href="http://localhost/mysite/Staff.html">Staff Login</a>
       <a href="http://localhost/mysite/Ward.html">Ward Login</a>
  <a href="http://localhost/mysite/Achievements.html">Achievements</a>
  <a href="http://localhost/mysite/About.html">About</a>
  </div>

<div class="container">
  <form name="myForm" action="book.php" onsubmit="return validateForm()" method="post">
    <div class="row">
      <h2 style="text-align: center;">Book Health Check Appointment</h2>
    </div>
	<div class="row">
      <p>Submit your details and we will call you</p>
    </div>
	
 <?php
$query = $link->query("SELECT distinct deptname,deptid FROM department");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<select id="deptname">
    <option value="">Select Deptname</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['deptid'].'">'.$row['deptname'].'</option>';
        }
    }else{
        echo '<option value="">Dept not available</option>';
    }
    ?>
</select>

<select id="doctor">
    <option value="">Select doctor first</option>
</select>

<script type="text/javascript">
$(document).ready(function(){
    $('#deptname').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#doctor').html(html);
                   }
            }); 
        }else{
            $('#doctor').html('<option value="">Select country first</option>');
              }
    });
    

});
</script>



	<div class="row">
      <div class="col-25">
        <label for="date">Appointment Date</label>
      </div>
      <div class="col-75">
        <input style="width: 10%;margin-top: 6px;float:left;border-radius: 5px;padding: 5px;border: 1px solid #ccc;" type="date" id="date" name="date" placeholder="DD-MM-YYYY">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="date">Appointment Time</label>
      </div>
      <div class="col-75">
        <input style="width: 10%;margin-top: 6px;float:left;border-radius: 5px;padding: 5px;border: 1px solid #ccc;" type="time" id="time" name="time" placeholder="HH-MM-AM/PM">
		</div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="reason">Reason</label>
      </div>
      <div class="col-75">
        <textarea id="reason" name="reason" placeholder="Enter reason for Appointment" style="height:100px;width: 50%"></textarea>
      </div>
    </div>
	
    <div class="row">
      <input class="submit" name="submit" type="submit" onClick="validateForm();" value="Confirm" >
	</div>
  </form>
</div>

</body>
</html>