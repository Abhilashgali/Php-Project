<?php
if(isset($_POST["btn"]))
{
  $fn=$_POST["fn"];
  $mn=$_POST["mn"];
  $ln=$_POST["ln"];
  $cn=$_POST["cn"];
  $eid=$_POST["eid"];
  $pwd=$_POST["pwd"];
  $cpwd=$_POST["cpwd"];
  if($fn!="" && $ln!="" && $eid!="" && $pwd!="" && $cpwd!="")
    {
    if(preg_match('/[A-z]/',$fn))
        {
        if(preg_match('/[A-z]/',$ln))
            {
             if(filter_var($eid,FILTER_VALIDATE_EMAIL))
                {
                   $len=strlen($pwd);
                  if($pwd==$cpwd && $pwd!="" && $len>=6)
                    {
                      $epwd=sha1($pwd);
                      $con=mysqli_connect("localhost","root","","database1");
                      $cop=mysqli_query($con,"insert into registration(fname,lname,Emailid,password,contactno,mname) values('$fn','$ln','$eid','$epwd','$cn','$mn')");
                        if(isset($cop))
                           {
                              header("location:login.php");
                           }
                      else {
                              $note6="Not Registered";
                           }
                              mysqli_close($con);
                    }                        
                 else
                    {
                    $note5="Password dosent match";
                    }
                }
           else {
                $note4="Enter a Valid Email Id";
                }
            }
       else {
            $note3="Enter only character's in Last Name";    
            }
        }
   else {
        $note2="Enter only character's in First Name";    
        }
    }
else{
    $note1="Fillup all Details";    
    }     
}
?>
<html>
<head>
<title>User Registration</title>
<style type="text/css">
header
{
background-color:black;
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
background:rgb(0, 0, 40);
font-size:30px;
}
form
{
text-align:left;
background-color:rgba(0,0,0,0.8);
color:white;
display:block;
box-shadow:0px 2px 15px 5px black;
letter-spacing:1px;
width: 350px;
padding:50px;
border: 2px solid black;
border-radius:10px;
margin-left:450px;
margin-top:80px;
}
label
{
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
input[type=number]:focus 
{
    background-color: lightblue;
    border: 3px solid #555;
}
a
{
font-size:20px;
letter-spacing:1px;
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
#btn
{
display:block;
margin-left:250px;
}
</style>
</head>
<body>
<header><a>Registration Form</a></header></br>
<form method="POST">
<fieldset><legend><a>FILL ALL INFO</a></legend></br>
<a style="color:red;"><?php global $note1;echo $note1;?></a></br>
<label>First Name:</label></br><a style="padding-left:10px;"><input type="text"  style="border-radius:5px;width:300px" name="fn"/></a></br>
<a style="color:red;"><?php global $note2;echo $note2;?></a></br>
<label>Middle Name:</label></br><a style="padding-left:10px;"><input type="text"  style="border-radius:5px;width:300px" name="mn"/></a></br></br>
<label>Last Name:</label></br><a style="padding-left:10px;"><input type="text"  style="border-radius:5px;width:300px;" name="ln"/></a></br>
<a style="color:red;"><?php global $note3;echo $note3;?></a></br>
<label>Contact No:</label></br><a style="padding-left:10px;"><input type="phonenumber" maxlength="10" style="border-radius:5px;width:300px" name="cn"/></a></br></br>
<label>Email id:</label></br><a style="padding-left:10px;"><input type="text box" style="border-radius:5px;width:300px" name="eid"/></a></br>
<a style="color:red;"><?php global $note4;echo $note4;?></a></br>
<label>Password:</label></br><a style="padding-left:10px;"><input type="password" style="border-radius:5px;width:300px" name="pwd"/></a></br>
<p>(Enter a Valid more then 6 variable Password)</p>
<label>Conform Password:</label></br><a style="padding-left:10px;"><input type="password" style="border-radius:5px;width:300px" name="cpwd"/></a></br>
<p>(Enter a Valid more then 6 variable Password)</p></br>
<a style="color:red;"><?php global $note5;echo $note5;?></a></br>
<input id="btn" type="submit" style="border-radius:5px;padding-left:5px;background-color:black;color:white;line-height:30px;width:80px;" name="btn" value="Register">
<a style="color:red;"><?php global $note6;echo $note6;?></a></br>
</form></br></br></br></fieldset>
<footer>
<p>SignUp Page</p>
</footer>
</body>
</html>