<?php
 session_start();
 $uid=$_SESSION["uid"];
  if(isset($_POST["bl"]))
  {
      $studentid=$_POST["studentid"];
      $studentname=$_POST["studentname"];
      $email1=$_POST["email1"];
      $class=$_POST["class"];
      $enrollementyear=$_POST["enrollementyear"];
      $city=$_POST["city"];
      $country=$_POST["country"];
          $con=mysqli_connect("localhost","root","","database1");
          $com=mysqli_query($con,"insert into studentdata values('$uid','$studentid','$studentname','$email1','$class','$enrollementyear','$city','$country')");
       if(isset($com))
           {
          $out="values inserted";
           }
      else {
          $out="values not inserted";
           }
        mysqli_close($con);
  }
 if(isset($_POST["b3"]))
{
    $con=mysqli_connect("localhost","root","","database1");
    $com=mysqli_query($con,"delete from studentdata where username=$uid and email1=$email1");
}
?>
<html>
 <head>
  <title>Dashboard</title>
  <style type="text/css">
  form
   {
    text-align:left;
    background-color:rgba(0, 0, 0,0.2); 
    color:black;
    display:block;
    box-shadow:0px 2px 15px 5px black;
    letter-spacing:1px;
    width: 400px;
    padding:50px;
    border: 2px solid black;
    border-radius:10px;
    margin-left:450px;
    margin-top:50px;
   }
  label
   {
    font-size:20px;
    letter-spacing:1px;
   }
  </style>
 </head>
 <body>
     <form method="POST">
         <label>Student ID</label><a style="padding-left:70px;"><input type="text" placeholder="Enter student ID" style="border-radius:5px;padding-left:10px;line-height:30px;" name="studentid"/></a></br></br>
         <label>Student Name</label><a style="padding-left:40px;"><input type="text" placeholder="Enter student Name" style="border-radius:5px;padding-left:10px;line-height:30px;" name="studentname"/></a></br></br>
         <label>Email</label><a style="padding-left:113px;"><input type="text" placeholder="Enter student EmailID" style="border-radius:5px;padding-left:10px;line-height:30px;" name="email1"/></a></br></br>
         <label>Class</label><a style="padding-left:120px;"><input type="text" placeholder="Enter student Class" style="border-radius:5px;padding-left:10px;line-height:30px;" name="class"/></a></br></br>
         <label>Enrollement Year</label><a style="padding-left:10px;"><input type="text" placeholder="Enter Enrollement Year" style="border-radius:5px;padding-left:10px;line-height:30px;" name="enrollementyear"/></a></br></br>
         <label>City</label><a style="padding-left:130px;"><input type="text" placeholder="Enter City" style="border-radius:5px;padding-left:10px;line-height:30px;" name="city"/></a></br></br>
         <label>Country</label><a style="padding-left:95px;"><input type="text" placeholder="Enter Country" style="border-radius:5px;padding-left:10px;line-height:30px;" name="country"/></a></br></br>
         <input type="submit" style="border-radius:5px;padding-left:5px;background-color:black;color:white;line-height:30px;width:60px;" name="b1" value="Save">
         <input type="reset" style="border-radius:5px;padding-left:5px;background-color:black;color:white;line-height:30px;width:60px;" name="r1" value="Clear">
         <a style="color:red;"><?php global $out;echo $out;?></a></br>     
      </form></br></br>
     <table border="1">
     <tr>
     <th>Student ID</th>
     <th>Student Name</th>
     <th>Email</th>
     <th>Class</th>
     <th>Enrollement Year</th>
     <th>City</th>
     <th>Country</th>
     <th></th>
     </tr>
     <?php
     $con=mysqli_connect("localhost","root","","database1");
     $com=mysqli_query($con,"select studentid,studentname,email1,class,enrollementyear,city,country from studentdata");
     while($r=mysqli_fetch_row($com))
     {
     echo "<tr>"
     echo "<th>$r[0]</th>";
     echo "<th>$r[1]</th>";
     echo "<th>$r[2]</th>";
     echo "<th>$r[3]</th>";
     echo "<th>$r[4]</th>";
     echo "<th>$r[5]</th>";
     echo "<th>$r[6]</th>";
     echo "<th><html>
            <body>
              <form method="POST">
                <input type="submit" style="border-radius:5px;padding-left:5px;background-color:black;color:white;line-height:30px;width:60px;" name="b2" value="Edit">
                <input type="submet" style="border-radius:5px;padding-left:5px;background-color:black;color:white;line-height:30px;width:60px;" name="b3" value="Delete">
              </form>
            </body>
           </html></th>";
     echo "</tr>";
     }
 </body>
</html>