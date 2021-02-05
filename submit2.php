<html>
<body>
<div id="area3">
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

$prof_course = "'".$_GET["profcourse"]."'";
$prof_section = "'".$_GET["profsection"]."'";
// From enrollment records, select the sum of each grade letter based on the course and section number given
$query = "SELECT SUM(ER_Grade='A+'),
SUM(ER_Grade='A'),
SUM(ER_Grade='A-'),
SUM(ER_Grade='B+'),
SUM(ER_Grade='B'),
SUM(ER_Grade='B-'),
SUM(ER_Grade='C+'),
SUM(ER_Grade='C'),
SUM(ER_Grade='C-'),
SUM(ER_Grade='D+'),
SUM(ER_Grade='D'),
SUM(ER_Grade='D-'),
SUM(ER_Grade='F+'),
SUM(ER_Grade='F'),
SUM(ER_Grade='F-')
FROM ENROLLMENTRECORD WHERE ER_courseNum=".$prof_course." AND ER_secNum=".$prof_section;
$result = mysqli_query($con,$query);


while($row=mysqli_fetch_array($result)) {
  if(gettype($row[0])=="NULL") {
    die("Course and Section Not Found. Please go back and try again.");
  }
  echo "<p>For the course ".$_GET["profcourse"]."-".$_GET["profsection"]."
<br/>
---------------------------------------------<br/>
---------------------------------------------<br/></p>";
  echo "Grades<br/>----------<br/>";
    echo "A+      ----->     ".$row[0];
    echo "<br/>A     ----->     ".$row[1];
    echo "<br/>A-     ----->      ".$row[2];
    echo "<br/>B+     ----->      ".$row[3];
    echo "<br/>B     ----->      ".$row[4];
    echo "<br/>B-     ----->      ".$row[5];
    echo "<br/>C+     ----->      ".$row[6];
    echo "<br/>C     ----->      ".$row[7];
    echo "<br/>C-     ----->      ".$row[8];
    echo "<br/>D+     ----->      ".$row[9];
    echo "<br/>D     ----->      ".$row[10];
    echo "<br/>D-     ----->      ".$row[11];
    echo "<br/>F+     ----->      ".$row[12];
    echo "<br/>F     ----->      ".$row[13];
    echo "<br/>F-     ----->      ".$row[14];
  }

mysqli_close($con);
?>
</div>
</body>
</html>
