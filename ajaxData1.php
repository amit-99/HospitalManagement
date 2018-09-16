<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
//Include the database configuration file
$link=mysqli_connect('localhost','root','');
mysqli_select_db($link,'testdb');
echo("<script>console.log('ajax1: ".$_POST['country_id']."');</script>");
echo("<script>console.log('ajax1: ".$_POST['state_id']."');</script>");

$query = $link->query("SELECT * FROM department WHERE docid = ".$_POST['state_id']." AND deptid = ".$_POST['country_id']." ");

    $rowCount = $query->num_rows;
	if($rowCount > 0){
        
        while($row = $query->fetch_assoc()){ 
		echo("Doctor's Consultation time is:");
             echo '<br>'.$row['startTime']." to ".$row['endTime'].'<br>';
        }
    }

?>
