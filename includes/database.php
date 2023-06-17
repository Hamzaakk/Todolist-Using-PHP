<?php
    
    try{
        $dbname = "todo";
      $pdo=new PDO("mysql:host=localhost;dbname=$dbname",'root','');

    }catch(PDOException $err){
    
        die("Erreur connexion : " .$err->getMessage());
    }



?>