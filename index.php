<?php
  
  $server = "localhost";
  $user = "root";
  $password ="";
  $database_name = "project1";
  
  $connection = mysqli_connect($server, $user, $password, $database_name);
  // if($connection) {
  // 	echo "connected";
  // }

  if(isset($_POST['submit'])) {
     $name = $_POST['fullname'];
     $email = $_POST['email'];
     $password = $_POST['password'];
      
     $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
     $row = mysqli_query($connection,$sql);
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	
	<div class="container-fluid">
		<div class="jumbotron bg-success">
            <center><h1>Bootstrap form</h1></center>    	
        </div>	
	</div>
    
    <div class="container">
    	<form method="post" action="#">
		    <label> Name : </label>  
		    <input type="text" name="fullname" class="form-control" placeholder="Enter your Name">
		    <br>  
    		<label> Email : </label>
    		<input type="email" name="email" class="form-control" placeholder="Enter your Email">
    		<br> 
    		<label> Password : </label>
    		<input type="password" name="password" class="form-control" placeholder="Enter your Password">
    		<br>
    		<input type="submit" class="btn btn-primary" value="Submit" name="submit">
     	</form>
    </div>
    <br>
    <div class="container">
    	<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Password</th>
		    </tr>
		  </thead>
		  <tbody>
			   <?php
			      $sql1 = "SELECT * FROM `users`";
                  $row = mysqli_query($connection,$sql1);
                  if(mysqli_affected_rows($connection) > 0) {
                       while ($result = mysqli_fetch_array($row)) {
                       	  ?>
                                <tr>
							      <td scope="col"> <?php echo $result['name'];  ?> </td>
							      <td scope="col"> <?php echo $result['email'];  ?> </td>
							      <td scope="col"> <?php echo $result['password'];  ?> </td>
							    </tr>
                       	  <?php
                       }
                  }
			   ?>
		  </tbody>
		</table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>