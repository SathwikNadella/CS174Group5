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
    background-color: #6afdbd;
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
<hr />
<?php 

if(isset($_POST['Submit'])) 
{
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $pWord = $_POST['pWord'];
    
      if ($fName=='') 
      {
        echo '<p style="color: red;">First Name is empty</p>';
      }
    
      if ($lName=='')
       {
        echo '<p style="color: red;">Last Name is empty</p>';
      }

      if ($email=='') 
      {
        echo '<p style="color: red;">Email is empty</p>';
      }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
      {
        echo '<p style="color: red;">Invalid Email Format</p>';
      }

      if ($pWord=='')
      {
        echo '<p style="color: red;">Password is empty</p>';
      }
      elseif (strlen($pWord) < 8) 
      {
        echo '<p style="color: red;">Password must be at least 8 characters long</p>';
      }
}
?> 
</body>
</html> 