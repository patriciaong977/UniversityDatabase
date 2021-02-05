<html>
<body>
<div id="area2">
<?php
$username = "cs332f28";
$pass = "Iesah4az";
$con = mysqli_connect('mariadb',$username,$pass,$username);
if(!con){
  die("Connection failed: ".mysqli_connect_error());
} else {
  echo 'Connected To Database Successfully<br/>
  ---------------------------------------------<br/>
  ---------------------------------------------<br/>';
}
  
// Selects all the professors (only one in this case) that satisfy the SSN that the user inputted in the HTML page
$query = "SELECT * FROM PROFESSORS WHERE prof_SSN=".$_GET["ssn"];
  
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result)<=0) {
  die("SSN Not Found. Please go back and try again.");
}
while($row=mysqli_fetch_array($result)) {

  echo"
  <p>Welcome {$row['prof_Name']}</p>
  <p>Title: {$row['prof_Title']}</p>
  \n";
}

  
// Selects all the sections that satisfy the professor's SSN that the user inputted in the HTML page
$query = "SELECT * FROM SECTION WHERE sec_profSSN=".$_GET["ssn"];
  
$result = mysqli_query($con,$query);
$counter = 1;

while($row=mysqli_fetch_array($result)) {
  echo"---------------------------------------------<br/>
  <p>Classroom {$counter}: {$row['sec_Classroom']}</p>
  \n"; 
  $sec_courseNum = "'".$row['sec_courseNo']."'";
// Out of those sections, selects all the meeting days that corresponds with the section number and course number
  $meeting_query = "SELECT * FROM MEETINGDAYS WHERE MD_secNum=".$row['sec_secNum']." AND MD_courseNum=".$sec_courseNum;
  $meeting_result = mysqli_query($con,$meeting_query);
  echo "Meeting Days: ";
  while($meeting_row=mysqli_fetch_array($meeting_result)) {
    echo"
    {$meeting_row['MD_meetingDays']} ";
  }
  echo "<br/>
  Class Times: {$row['sec_beginTime']} - {$row['sec_endTime']}";
  
  echo "<br/>---------------------------------------------<br/><br/>";
  $counter++;
}





mysqli_close($con);
?>
</div>
</body>
</html>

