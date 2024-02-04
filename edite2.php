<table border="1">
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
$fname = $_POST['first_name'];
$lname = $_POST["last_name"];
$email = $_POST["email"];
require_once("dp.php");


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("update student set fname = '$fname', lname='$lname',email='$email' where id='$id'");
$res = $conn->query("select * from student ") ;
$resa =$res->fetch_all(MYSQLI_ASSOC);
foreach($resa as $value){
  
  echo "<tr>";
  foreach($value as $key=>$op){
    echo "<td>".$op."</td>" ;
  }
  echo "<td><a href='show.php?id={$value['id']}'>view</a></td>";
  echo "<td><a href='edite.php?id={$value['id']}'>edite</a></td>";
  echo "<td><a href='delet.php?id={$value['id']}'>delet</a></td>";
  echo "</tr>";
}
$conn->close();
header("location:view.php")
?>
</table>