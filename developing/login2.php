<?php 
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="chatapp";
	$conn = mysqli_connect($servername, $username, $password, $dbname);		
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}



.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login Form</h2>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
  

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

<?php 
             if(isset($_POST['login'])){

				$sql = "SELECT email, password2 FROM `user` WHERE email ='$_POST[uname]' and password2 ='$_POST[psw]' ";
				$result = mysqli_query($conn,$sql) or die("Query Failed");

				if(mysqli_num_rows($result) >0){

                   while($row = mysqli_fetch_assoc($result)>0){
					   session_start();
					   $_SESSION["Email"] = $row['uname'];
					   $_SESSION["Password"] = $row['psw'];
					   echo "Everything is going fine";

					   header("Location: dashboard.php");
				   }  
				}else{
                    echo "Password and Username did not match in the database";
				}
			 }
			 echo "flkdjalk jf";
		?>

</body>
</html>