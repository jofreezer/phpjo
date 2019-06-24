<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <?php require_once 'jo2db.php'; ?>
<?php 
 if(isset($_SESSION['message'])):?>
<?php 
 echo $_SESSION['message'];
 unset($_SESSION['message']);
?>
<?php endif ?>


 <?php 
  $conn=new mysqli("localhost","root","","jo2")or die(mysqli_error($conn));

  $result=$conn->query("SELECT * FROM users")or die($conn->error);
//   pre_r($result);
//   pre_r($result->fetch_assoc());
//   pre_r($result->fetch_assoc());
//   pre_r($result->fetch_assoc());
?>
<div class="table"> 
<table style="border-collapse: collapse; "  >
  <thead>
  <tr >
  <th>Name</th>
  <th>Locations</th>
  <th>Action</th>
  </tr>
  </thead>

<?php 
  while($row=$result->fetch_assoc()): ?>
<tr>
 <td><?php echo $row['username']; ?> </td>
 <td><?php echo $row['locations']; ?> </td>
 <td>
  <a href="jo2.php?edit=<?php echo $row['id']; ?>" >Edit</a>
  <a href="jo2.php?delete=<?php echo $row['id']; ?>" >Delete</a>
 </td>
</tr>
<?php endwhile; ?>
</table>
</div>
<?php
  function pre_r($array){
      echo '<pre>';
      print_r($array);
      echo '</pre>';
  }
 ?>

<form action="jo2db.php"method="POST">
<!-- update part -->
<input type="hidden" name="id" value="<?php echo $id; ?>">
 <!--  -->
 <label>Name</label><input type="text" value="<?php echo $username; ?>" 
 name="username" ><br><br>
 <label>Location</label><input type="text" value="<?php echo $locations; ?>" name="locations"><br>

<?php 
if($update==true):
?>
<button type="submit" name="update">Update</button>
<?php else: ?>
<button type="submit" name="save">Save</button>
<?php endif; ?>
</form>

</body>
<?php 

?>
</html>