<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php upload</title>
</head>
<body>
<?php 
 if(isset($_FILES['userfile'])){
     pre_r($_FILES);
    //  echo $name=$_FILES['userfile']['name'];
    //  echo $type=$_FILES['userfile']['type'];
   $ext_error=false;
   $extention=array('jpg','jpeg','gif','png');
   $file_ext=explode('.',$_FILES['userfile']['name']);
   $file_ext=end($file_ext);
   if(!in_array($file_ext,$extention)){
       $ext_error=true;
   }

echo '<br>';
     move_uploaded_file($_FILES['userfile']['tmp_name'],'images/'.
     $_FILES['userfile']['name']);
     echo "Success! Images has been uploaded";
 }
 function pre_r($array){
     echo '<pre>';
     print_r($array);
     echo '</pre>';
 }
?>

    <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="userfile" id="">
    <input type="submit" value="Upload" id="">
    </form>
</body>
</html>