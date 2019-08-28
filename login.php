<?php 

session_start();

if(isset($_POST["btn"]))

{
    
  $uname=$_POST["uid"];
  
  $pwd=$_POST["pwd"];
 
  $epwd=sha1($pwd);
  
  $con=mysqli_connect("localhost","root","","database1");
 
   $com=mysqli_query($con,"select * from registration where Emailid='$uname' and password='$epwd'") or die("Failed to query database".mysql_error());
 
   $row=mysqli_fetch_array($com);

   if($row['Emailid']==$uname && $row['password']==$epwd)
  
   {
      
    $_SESSION["uid"]=$uname;
    
    header("location:dashboard.php");
 
   }
 
   else {
    
         $note="Invalid User name or Password or User name already exist";  

        }
  
  mysqli_close($con);

}

?>

<html>
 <head>
  <title>Login Page</title>
  <style type="text/css">
  header
   {
    background:black;
   }
  header a
   {
    font-family:arial;
    text-decoration:none;
    color:white;
    letter-spacing:1px;
    padding-left:10px;
    line-height:40px;
   }
  header a:hover
   {
    display:block;
    background:black;
    font-size:30px;
   }
  form
   {
    text-align:center;
    background-color:rgba(0, 0, 0,0.5); 
    color:blue;
    display:block;
    box-shadow:0px 2px 15px 5px black;
    letter-spacing:1px;
    width: 300px;
    padding:50px;
    border: 2px solid black;
    border-radius:10px;
    margin-left:500px;
    margin-top:130px;
   }
  label
   {
    font-family:impact;
    font-size:20px;
    letter-spacing:1px;
   }
  input[type=text]:focus
   {
    background-color: lightblue;
    border: 3px solid #555;
   }
  input[type=password]:focus 
   {
    background-color: lightblue;
    border: 3px solid #555;
   }
  a
   {
    font-size:20px;
    letter-spacing:1px;
    color:blue;
   }
  footer
   {
    background:black;
    color:white;
    font-size:18px;
    text-align:center;
    height:40px;
    line-height:0px;
    font-family:arial;
    padding-top:5px;
   }
  footer p
   {
    color:yellow;
   }
  </style>
 </head>
 <body>
  <header><a>Home</a></header></br>
   <form method="POST">
   <label style="padding-left:20px;">Login Id:</label><a style="padding-left:10px;"><input type="text" placeholder="Enter your Loginid" style="border-radius:5px;padding-left:10px;line-height:30px;" name="uid"/></a></br></br>
   <label>Password:</label><a style="padding-left:10px;"><input type="password" placeholder="Enter your password" style="border-radius:5px;padding-left:10px;line-height:30px;" name="pwd"/></a></br></br>
   <input type="submit" style="border-radius:5px;padding-left:5px;background-color:black;color:white;line-height:30px;width:60px;" name="btn" value="Login"></br></br></br>
   <a href="signup.php" style="text-decoration:none;">Signup..</a></br></br>
   <a style="color:red;"><?php global $note;echo $note;?></a></br>
   </form></br></br></br></br></br>
  <footer>
   <p>Login Page</p>
  </footer>
 </body>
</html>