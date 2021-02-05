<html>
<body>
<div id="area5">
<?php
$username = "cs332f28";
$pass = "Iesah4az";
$con = mysqli_connect('mariadb',$username,$pass,$username);
if(!con){
  die("Connection failed: ".mysqli_connect_error());
} else {
  echo 'Connected To Database Successfully<br/>
  ---------------------------------------------<br/>
  ---------------------------------------------<br/><br/>';
}
// Selects every enrollment record where the student's CWID matches the user input to ensure a valid response
$query = "SELECT * FROM ENROLLMENTRECORD WHERE ER_studCWID=".$_GET["cwid"];
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)<=0) {
    die("CWID Not Found. Please go back and try again.");
  }
echo "Welcome CWID ".$_GET["cwid"]."<br/>
---------------------------------------------<br/>
---------------------------------------------<br/><br/>";
// Selects every enrollment record where the student's CWID matches the user input
$query = "SELECT * FROM ENROLLMENTRECORD WHERE ER_studCWID=".$_GET["cwid"];
$result = mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)) {
    echo"
    Course: {$row['ER_courseNum']}<br/>";
    echo "Grade: {$row['ER_Grade']}<br/>
        ---------------------------------------------<br/>";
    }
  
mysqli_close($con);
?>
</div>
</body>
</html>
