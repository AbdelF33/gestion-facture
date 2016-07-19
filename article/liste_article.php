<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Listing des articles</title>
    </head>
    <body>
        <?php
//echo 'bonjour';
//require "../function/functions.php";


        /*require ("conexion_db.php");
        
       	$sql="SELECT article . * , categorie.nom_categorie FROM article,categorie WHERE article.id_categorie = categorie.id_categorie;";
        
        $req=$pdo->prepare($sql);
        $req->execute();
  		*/
  		//require("database.class.php");
                //require ("article.class.php");
            function chargerclasses($class){
                require("../dao/".$class.".class.php");
            }
            spl_autoload_register('chargerclasses');

            $data = new article("localhost", "gestion_facture", "abdel", "1236987456321");
            if(!$data->connect()){
                echo $data->message();
                exit;
            }
                
            if(($articles = $data->read_article()) === false){
                    echo $data->message();
                    exit;
            }
                


//echo 'bonjour a vous';
        ?>
        
        <a href="ajouter_article.php">Ajouter un article</a><br>
        
        <table border="1px">
            <tr>
                <th>Choix</th>
                <th>Id</th>
                <th>Nom</th>
                <th>Information</th>
                <th>Cat&eacute;gorie</th>
                <th>Prix unitaire (€)</th>
                <th>Poids unitaire (g)</th>
                <th>Quantit&eacute; en stock</th>
                <th>Photo</th>               
                <th>Etat</th>
                <th>Fournisseur</th>
            </tr>
            
            <?php foreach($articles as $id_article => $resultats){ ?>
            
            <tr>
                <td>
                    <a href="../article/afficher_article.php?id_article=<?php echo $resultats->id_article; ?>">Afficher</a>
                    ||
                    <a href="../article/modifier_article.php?id_article=<?php echo $resultats->id_article; ?>">Modifier</a>
                    ||
                    <a href="../article/supprimer_article.php?id_article=<?php echo $resultats->id_article; ?>">Supprimer</a>
                </td>
                <td><?php echo $resultats->id_article;?></td>
                <td><?php echo $resultats->nom_article; ?></td>
                <td><?php echo $resultats->info_article; ?></td>
                <td><?php echo $resultats->nom_categorie; ?></td>
                <td><?php echo $resultats->prix_article; ?></td>
                <td><?php echo $resultats->poids_unitaire; ?></td>
                <td><?php echo $resultats->qte_stock; ?></td>
                <td><a href ="../img/<?php echo $resultats->photo_article; ?>">photo</a></td>
                <td>
                    <?php 
                        if (!$resultats->qte_stock == 0){
                            echo "en stock";
                        }else{
                            echo "&eacute;puis&eacute;";
                        } 
                    ?>
                </td>
                <td><?php echo $resultats->nom_entreprise; ?></td>
            </tr>
            
            <?php } ?>
        </table>
        
        <a href="ajouter_article.php">Ajouter un article</a><br>
    </body>
</html>
