<?php
include_once "db.php";
include_once "functions.php";
$error=[];
//Adding new item
if(isset($_POST['add'])){
  if(empty($_POST['item'])){
    $error['item']="Item is required";
  }
else{
  $item=clear_input($_POST['item']);
  $querystring= 'INSERT INTO List (item) VALUES(:item)';
  $stmt=$pdo->prepare($querystring);
  $stmt->bindParam(':item',$item);
  $stmt->execute();
  header('Location:List.php');
}
}


?>
<?php include "header.php";?>

<div id="content">
<ul>
  <h1>TO-DO LIST</h1>
  <li>
    <?php foreach($pdo->query('SELECT * FROM List')as$row){?>

    <span class="item"><?php echo $row['item'];}?></span>

  </li>
</ul>
<form action="list.php"method="POST">
  <input type="text" name="item" value="">
  <input type="submit"name="add"value="Add">
</form>
</div>


<?php include "footer.php";?>
