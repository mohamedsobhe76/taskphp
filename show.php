<table border="2">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        </thead>
<?php
$id = $_GET["id"];
require_once("dp.php");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$res = $conn->query("select * from student where id = '$id' ") ;
$resa =$res->fetch_all(MYSQLI_ASSOC);
foreach($resa as $value){
  
  echo "<tr>";
  foreach($value as $key=>$op){
    echo "<td>".$op."</td>" ;
  }
  echo "<td><a href='view.php'>return</a></td>";
}
$conn->close();
?>
</table>
