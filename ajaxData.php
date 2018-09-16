<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
//Include the database configuration file
$link=mysqli_connect('localhost','root','');
mysqli_select_db($link,'testdb');
echo("<script>console.log('PHP: ".$_POST['country_id']."');</script>");
$query = $link->query("SELECT * FROM department WHERE deptid = ".$_POST['country_id']."");

    // //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select Doctor</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['docid'].'">'.$row['docname'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }

?>
