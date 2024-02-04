<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Information Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    .form-group input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <?php
    $errors =[];
    if(isset($_GET['errors'])){
        $errors = json_decode($_GET['errors'],true);
    }
    ?>
<div class="container">
    <h2>User Information Form</h2>
    <form action="index.php" method="post"  enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" >
            <?php if(isset($errors['fname'])){
                echo $errors['fname'] ;
            }
            ?>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" >
            <?php if(isset($errors['lname'])){
                echo $errors['lname'] ;
            }
            ?>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" >
            <?php if(isset($errors['email'])){
                echo $errors['email'] ;
            }
            ?>
        </div>
        <div class="form-group">
            <label for="id">password:</label>
            <input type="password" id="id" name="id" >
        </div>
         <div class="form-group">
            <label for="id">file:</label>
            <input type="file" id="id" name="file" >
        </div>
        <div class="form-group">
            <input type="submit" value="Submit" >
        </div>
    </form>
</div>
</body>
</html>
