<table border="2">
        <thead>
        <tr>
            <th>password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        </thead>
<?php
require_once("dp.php");
$errors=[];
$data = $_FILES['file'];

move_uploaded_file($data['tmp_name'],"imgs/".$data['name']);
if( strlen($_POST['first_name'])==0)
{$errors["fname"]="please enter fname";}
if( strlen($_POST['last_name'])==0)
{$errors["lname"]="please enter lname";}
if( strlen($_POST['email'])==0)
{$errors["email"]="please enter email";}
if(count($errors)>0){
  $errors=json_encode($errors);
  header("location:html.php?errors=".$errors);
}

$id = validation($_POST["id"]);
$pasword = password_hash($id,  PASSWORD_BCRYPT );

$fname = validation($_POST['first_name']);
$lname = validation($_POST["last_name"]);
$email = validation($_POST["email"]);
if(strlen($fname)<2){
  $errors["fname"]="please enter more than 2 char ";
}
if(strlen($lname)<2){
  $errors["lname"]="please enter more than 2 char ";
}

if(count($errors)>0){
  $errors = json_encode($errors);
  header("location:html.php?errors=".$errors);

}


// Create connection
//$conn = new mysqli($servername, $username, $password,'student');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("insert into student values('$pasword','$fname','$lname','$email')");
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
function validation($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data ;

}
?>
</table>