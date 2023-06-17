<?php require_once './includes/database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODOLIST</title>
    <link rel="stylesheet" href="./css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php include_once './includes/nav.php'; ?>
    <div class="container" style="height:100vh">
    <?php $bool = true ; ?>
        <div class="row g-3 align-items-center border border-light-subtle my-5 p-4 mx-auto w-70">
            

            <?php 
                   $title = '';
                   $valide = true;
                    if(isset($_POST['add']))
                    {
                        $title = htmlspecialchars($_POST['task']);
                        
                       if(!empty($_POST['task']))
                       {
                       
                        $requte = "INSERT INTO task (id,task) VALUES (null,?) ";
                        $sqlsate = $pdo->prepare("$requte");
                        $valide=$sqlsate->execute([$title]);
                        
                       }else{
                        $bool = false ;
                       }
                    }
            ?>
                  <?php
                      
                      $requte = " select * from task order by id";
                      $sqlsate = $pdo->prepare("$requte");
                     $valide=$sqlsate->execute(); 
                     $data = $sqlsate->fetchAll(PDO::FETCH_OBJ);
                  ?>
             <?php  if($bool == false) :  ?>
                <div class="alert alert-danger role="alert">
              Remplir le champs title
              </div>
           <?php endif;  ?>
           <?php  if($valide == false) :  ?>
                <div class="alert alert-danger role="alert">
             insert not valide
              </div>

           <?php endif;  ?>


            <legend> Add Task  </legend>
            <form action="" method="post">
                   
                <div class="col-auto">
                    <label for="title" class="col-form-label">
                        Title <span style="color:red">*</span>
                     
                    </label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputPassword6" class="form-control" value="<?php echo $title; ?>" aria-labelledby="title" name="task">
                </div>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Title Task
                    </span>
                </div>
                <div class="cpn-auto">
                    <input type="submit" value="Add" class="btn btn-primary my-2" name="add">
                </div>
                <hr>
            </form>
       
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" class="text-warning">Task</th>
      <th scope="col" class="text-primary-emphasis">Operation </th>
    </tr>
  </thead>
  <tbody class="table-group-divider w-75">
               
             <?php $i=0;  foreach($data as $task):?>
                <tr>
               <td > <span class="  badeg rounded-pill bg-primary p-1"> <?=  $i++;?></span>  </td>
               <th>  <?= $task->task; ?></th>
               <td>
                <a href="update.php?id=<?=$task->id?>" class="click"> <img src="./img/icons8-pencil-drawing-40.png" alt="" height="30px"> </a>
                <a href="delete.php?id=<?=$task->id?>" class="m-2 " onclick="return confirm('Want to delete?')";><img src="./img/icons8-delete-48.png" height="30px" alt=""></a>
                
            </td>
               </tr>
                <?php endforeach;?>
   
   
  </tbody>
</table>
    </div>
    </div>
    <?php  include_once './includes/footer.php';?>
</body>
  
</html>