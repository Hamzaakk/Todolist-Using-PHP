<?php include_once './includes/database.php';?>
<?php    
                     $content= '';
                     $id=$_GET['id'];
                     $requte = " select * from task where id = ?";
                     $sqlsate = $pdo->prepare("$requte");
                     $valide=$sqlsate->execute([$id]); 
                     $data = $sqlsate->fetch(PDO::FETCH_OBJ);
                     if(!empty($data))
                     {  
                        $content = $data->task;
                     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->

</head>
<body>
    
           
<?php include_once './includes/nav.php';?>
<div class="container w-70" style="height:650px">
<div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
  <strong>Update</strong> task : <?php echo $content;?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="mb-3 my-5">
    <form action="" method="post">
        <?php 
        
        
         if(isset($_POST['update']))
         {
          $newtask= htmlspecialchars($_POST['task']);
          $query=  $pdo->prepare('update task set task = ? where id =?');
          $query->execute([$newtask,$id]);
          header('location: ./index.php');
          exit();
         }
        
        
        
        
        
        ?>
  <h5 for="exampleFormControlInput1" class="form-label">New Title </h5>
  <input type="text" class="form-control" id="exampleFormControlInput1" value = "<?php echo $content; ?>" placeholder="task ... " name="task">
  <input type="submit" class="btn btn-primary btn-sm my-1" value="update" name="update">
</form>
</div>
</div>
<?php  include_once './includes/footer.php';?>

</body>
</html>