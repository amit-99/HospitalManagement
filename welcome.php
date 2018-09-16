<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center;background: #F5B7B1  ; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</h1>
    </div>
	<p><a href="http://localhost/mysite/Application.php" class="btn btn-danger">Book an appointment</a></p>
	<p><a href="#" class="btn btn-danger">Home</a></p>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
	
	<?php
	header("location: patienthome.html");
	?>
</body>
</html>