<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
* {
			margin: 0;
			padding: 0;
		}
nav {
    width: 100%;
    height: 100px;
    background-color: rgb(208, 183, 192);
}

ul li{
    list-style: none;
    display: inline-block;
    float: left;
    line-height: 100px;
}

ul li a{
    text-decoration: none;
    font-size: 14px;
    font-family: arial;
    padding: 0 20px;
    color:black
}

ul li a:hover {
    color: red;
}
label {
  display: block;
  text-align: center;
}
        form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

form * {
  padding: 5px 5px;
}
    p#error { color: red; }
</style>
<head>
    <Title> UrbanFabric - Sign Up </Title>
</head>
<body>
    <nav>
        <ul>
          <li><a href="homepage.html">Home</a></li>
          <li><a href="listings.php">Products</a></li>
          
        </ul>
    </nav>
    <div class="bg-info text-black p-1 text-center">
        <h1>Sign Up</h1>
        <p>Sign up and create your very own UrbanFabric account!</p> 
    </div>
    <form action = "SignUp.php" onsubmit="return validateForm();" method="post">
    
    <p><label for="fName" >First Name</label><input type="text" name="fName" id="fName"/></p>
    <p><label for="lName" >Last Name</label><input type="text" name="lName" id="lName"/></p>
    <p><label for="email" >Email</label><input type="text" name="email" id="email"/></p>
    <p><label for="pWord" >Password</label><input type="password" name="pWord" id="pWord"/></p>    
    <input type="submit" name="Submit" class="btn btn-success" value="Submit" onclick='window.location.href = "homepage_signedin.html";'>
    
    </form>
<?php 

if(isset($_POST['Submit'])) 
{
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $pWord = $_POST['pWord'];
    $err = false;
      if ($fName=='') 
      {
        echo '<script>alert("First Name is empty");</script>';
        $err = true;
      }
    
      if ($lName=='')
       {
        echo '<script>alert("Last Name is empty");</script>';
        $err = true;
      }

      if ($email=='') 
      {
        echo '<script>alert("Email is empty");</script>';
        $err = true;
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        echo '<script>alert("Invalid Email Format");</script>';
        $err = true;
      }

      if ($pWord=='')
      {
        echo '<script>alert("Password is empty");</script>';
        $err = true;
      }
      elseif (strlen($pWord) < 8) 
      {
        echo '<script>alert("Password must be at least 8 characters long");</script>';
        $err = true;
      }

      if ($err == false){
      header("Location: homepage_signedin.html");
      exit;
      }
    
}
?> 
</body>
</html> 