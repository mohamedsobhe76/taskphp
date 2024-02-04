
<?php
$id = $_GET["id"];
require_once("dp.php");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 $conn->query("delete from student where id = '$id' ") ;
$conn->close();
header('location:view.php');
?>
</table>
