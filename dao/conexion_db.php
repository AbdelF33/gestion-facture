<?php
    $user="abdel";
    $password="1236987456321";
    $bd="gestion_facture";
    $parametres_serveur="mysql:host=localhost;dbname=".$bd;

    try{
        $pdo=new PDO($parametres_serveur,$user,$password);
    }
    catch(PDOException $e){
        echo "Erreur de connexion au serveur :<br>".$e->getMessage()."<br>";
    }
?>
