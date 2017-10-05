<?php
 error_reporting(E_ALL); ini_set('display_errors', 'On');
include_once "db.php";
include_once "functions.php";

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $querystring = "SELECT * FROM Users WHERE username=:username";
  $stmt = $pdo->prepare($querystring);
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $result = $stmt->fetchObject();

  if ($result) {
    if (password_verify($password, $result->password)){
      $_SESSION['user_id'] = $result->id;
      header('Location: list.php');
      }
  }
  else{
    echo"Wrong password, please try again";
  }
}
 ?>
<?php include "header.php";?>
<div id="wrapper">
<div id="content" class="dolist">



<form action="index.php" method="post" class="output">
  <input type="text"id="username" name="username" placeholder="Username">
  <input type="password"id="password"name="password"placeholder="Password">
  <input class="button" type="submit"id="login"name="login" value="Login"/>
        <a class="link-style" href="signup.php">register</a>
</div>
</div>
</form>
<?php include "footer.php";?>
