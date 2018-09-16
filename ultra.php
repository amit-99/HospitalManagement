<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = "";
$username_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = htmlspecialchars(trim($_POST["username"]));
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT data_name FROM data WHERE data_name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username);
                    
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } 
        }
		
		 header("location:font.php");
		/*if(mysqli_stmt_execute($stmt)){
		 header("location:font.php");}
		 else{
		 echo "something went wrong";}
		 
        // Close statement
       mysqli_stmt_close($stmt);*/
    }
	
     
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 20px sans serif; background-color: #F5B7B1; text-align: center;}
        .wrapper{ width: 350px; padding: 10px; }
    </style>
	
</head>

<body >
    <div class="wrapper">
        <h2>Login</h2>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>PATIENT NAME</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
          </div>
		  
         </form>
    </div>    
</body>
</html>