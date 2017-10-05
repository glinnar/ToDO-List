<?php
include_once "db.php";
include_once "functions.php";

$erros =[];
if(isset($_POST['submit'])){

  if(empty($_POST['username'])){
    $errors['username'] = "Username is required";
  }
  if(empty($_POST['password'])){
    $errors['password'] = "Password is required";
  }
  if($_POST['password']!= $_POST['password2']){
    $errors['password'] = " Passwords does not match";
  }

if(empty($errors)){
  $username = clear_input($_POST['username']);
  $password = clear_input($_POST['password']);
  $password = password_hash($password,PASSWORD_DEFAULT);
  $querystring = 'INSERT INTO Users (username,password)
  VALUES(:username,:password)';

  $stmt = $pdo->prepare($querystring);
  $stmt->bindParam(':username',$username);
  $stmt->bindParam(':password',$password);
  $stmt->execute();
 header('Location:index.php');
}
}
 ?>
 <?php include "header.php";?>
<div id="wrapper">
  <div id="content" class="dolist">
      <form  class="form" action="signup.php" method="post">
        <input type="text"id="username" name="username" placeholder="Username"/>
        <input type="password" id="password" name="password" placeholder="Password"/>
        <input type="password"id="password2" name="password2" placeholder="Re entry password"/>
        <input type="submit" name="submit" value="Signup"/>
      </form>


  </div>
</div>


 <?php include "footer.php";?>
