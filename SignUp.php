<!DOCTYPE html>
<html>
<style>
* {
			margin: 0;
			padding: 0;
		}
    form *{
      padding: 5px 5px;
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
    label { margin-left:16px; }
    label.left { float:left; margin-left: 0; margin-right:16px; }
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
    <h2> Sign Up </h2>
    <form action = "SignUp.php" onsubmit="return validateForm();" method="post">
    
    <p><input type="text" name="fName" id="fName"/><label for="fName" class="left">First Name:</label></p>
    <p><input type="text" name="lName" id="lName"/><label for="lName" class="left">Last Name:</label></p>
    <p><input type="text" name="email" id="email"/><label for="email" class="left">Email:</label></p>
    <p><input type="text" name="pWord" id="pWord"/><label for="pWord" class="left">Password:</label></p>    
    <input type="submit" name="Submit" value="Submit" onclick='window.location.href = "homepage_signedin.html";'>
    
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