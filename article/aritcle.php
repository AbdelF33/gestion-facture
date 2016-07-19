<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Les articles</title>
    </head>
    <body>
        <?php


        /*require ("conexion_db.php");
        
       	$sql="SELECT article . * , categorie.nom_categorie FROM article,categorie WHERE article.id_categorie = categorie.id_categorie;";
        
        $req=$pdo->prepare($sql);
        $req->execute();
  		*/
  		require("database.class.php");
  		
        $data = new database("localhost", "gestion_facture", "abdel", "1236987456321");
        if(!$data->connect()){
            echo $data->message();
            exit;
        }

		if(($articles = $data->read_article()) === false){
			echo $data->message();
			exit;
		}


        ?>
        
        <table border="1px">
            <tr>
                <th>Choix</th>
                <th>Id</th>
                <th>Nom</th>
                <th>Information</th>
                <th>Cat&eacute;gorie</th>
                <th>Prix unitaire (€)</th>
                <th>Poids unitaire (g)</th>
                <th>Quantité en stock</th>
                <th>Photo</th>
<!--                <th>Fournisseur</th>-->
                <th>Etat</th>
            </tr>
            
		  <?php foreach($articles as $id_article => $resultats){ ?>
            
            <tr>
                <td></td>
                <td><?php echo $resultats->id_article;?></td>
                <td><?php echo $resultats->nom_article; ?></td>
                <td><?php echo $resultats->info_article; ?></td>
                <td><?php echo $resultats->nom_categorie; ?></td>
                <td><?php echo $resultats->prix_article; ?></td>
                <td><?php echo $resultats->poids_unitaire; ?></td>
                <td><?php echo $resultats->qte_stock; ?></td>
                <td><a href ="http://localhost/gestion_facture/<?php echo $resultats->photo_article; ?>">photo</a></td>
                <td><?php echo $resultats->etat_article; ?></td>
            </tr>
            
            <?php } ?>
        </table>
    </body>
</html>
