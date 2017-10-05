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
  header('Location:list.php');
}
}

if(isset($_POST['delete'])){
  $querystring='DELETE  FROM List WHERE id=:id';
  $stmt=$pdo->prepare($querystring);
  $stmt->bindParam(':id',$_POST['id']);
  $stmt->execute();
  header('Location: list.php');
}
?>
<?php include "header.php";?>
<div id="wrapper">
  <div id="content" class="dolist">
    <?php
    if(isset($_SESSION['user_id'])){
      echo"<h1> Hej"."</h1>";
    }
    ?>
    <ul>
      <h1>TO-DO LIST</h1>
      <li>
        <table class="tablestyle" border="1px">

              <?php foreach($pdo->query('SELECT * FROM List')as $row) {?>
          <tr>
            <td>
              <span class="item"><?php echo $row['item'];?></span>
            </td>
            <td rowspan="2">
              <form class="fix" action="list.php" method="post">
                  <input type="hidden" name="id" value='<?php echo $row['id'];?>'/>
                  <input type="submit" class="tablebutton" id="delete" name="delete" value="Delete">
              </form>
            </td>
          </tr>
          <?php }?>
        </table>
      </li>
    </ul>

  <form action="list.php"method="POST" class="items">
    <input type="text" name="item">
    <input type="submit" class="button"name="add"value="Add">
      <a class="link-style" href="logout.php">Logout</a>
  </form>
  </div>
</div>


<?php include "footer.php";?>
