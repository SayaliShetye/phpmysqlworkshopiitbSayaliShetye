<?php
require("connect.php");

$rec = "SELECT * FROM class1 WHERE studentname='Rohan'";
$res = $conn-> query($rec);

if ($res->num_rows > 0) {
  
  while($row = $res->fetch_assoc()) {
    $marks = $row['totalobtained'];
    $olds5 = $row['subject5'];
    $s5 = 99;
    $per = $row['percentage'];

    $marks = $marks- $olds5 + $s5;
    $per = (float)(($marks/500)*100);

    $update = "UPDATE class1 SET subject5=$s5, totalobtained=$marks, percentage='$per' WHERE studentname='Rohan'";
    if ($conn->query($update) === TRUE) {
            echo "Rohan's record updated <br><br>";
    } else {
            echo "Error updating record: " . $conn->error;
    }
    
    echo "Rohan, Subject 5: $s5/100<br>Total Marks Obtained: $marks<br>Percentage: $per % <br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>