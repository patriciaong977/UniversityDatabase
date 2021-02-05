<html>
<body>
<div id="area4">
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

$stud_course = "'".$_GET["studcourse"]."'";
// Selects every section where the course number equals the user input's value
$query = "SELECT * FROM SECTION WHERE sec_courseNo=".$stud_course;
  
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)<=0) {
    die("Course Not Found. Please go back and try again.");
  }
  echo "<p>Class ".$_GET["studcourse"]."
<br/>---------------------------------------------<br/>
  ---------------------------------------------<br/>";
while($row=mysqli_fetch_array($result)) {
  echo"
  <p>Section: {$row['sec_secNum']}</p>
  
  <p>Classroom: {$row['sec_Classroom']}</p>";
  $sec_courseNum = "'".$row['sec_courseNo']."'";
  // From those sections found, select the meeting days that correspond with the section and course number
  $meeting_query = "SELECT * FROM MEETINGDAYS WHERE MD_secNum=".$row['sec_secNum']." AND MD_courseNum=".$sec_courseNum;
  $meeting_result = mysqli_query($con,$meeting_query);
  echo "Meeting Days: ";
  while($meeting_row=mysqli_fetch_array($meeting_result)) {
    echo"
    {$meeting_row['MD_meetingDays']} ";
  }
  
  echo "<p>Class Time: {$row['sec_beginTime']} - {$row['sec_endTime']}</p>";
  // Counts all the grades in enrollment records where the section and course number equal the user input's value
  $enroll_query = "SELECT COUNT(ER_Grade)
  FROM ENROLLMENTRECORD WHERE ER_secNum=".$row['sec_secNum']." AND ER_courseNum=".$stud_course;
    $enroll_result = mysqli_query($con,$enroll_query);
    echo "Number of Students in Class: ";
    while($enroll_row=mysqli_fetch_array($enroll_result)) {
        echo $enroll_row[0];
    }
    echo "<br/>---------------------------------------------<br/>";
    
}


mysqli_close($con);
?>
</div>
</body>
</html>
