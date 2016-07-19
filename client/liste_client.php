<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Listing des clients</title>
    </head>
    <body>
        <?php
            function chargerclasses($class){
                    require("../dao/".$class.".class.php");
                }
                spl_autoload_register('chargerclasses');
            
            $data = new client("localhost", "gestion_facture", "abdel", "1236987456321");
            if(!$data->connect()){
                echo $data->message();
                exit;
            }
                
            if(($client = $data->read_client()) === false){
                    echo $data->message();
                    exit;
            }
        ?>
        
        <a href="ajouter_client.php">Ajouter un client</a><br>
        
        <table border="1px">
            <tr>
                <th>Choix</th>
                <th>Id</th>
                <th>Nom</th>
                <th>Pr&eacute;nom</th>
                <th>Sexe</th>
                <th>Date de naissance</th>
                <th>Email</th>
                <th>T&eacute;l&eacute;phone 1</th>
                <th>T&eacute;l&eacute;phone 2</th>               
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code postal</th>
                <th>département</th>
                <th>Pays</th>
            </tr>
            
            <?php foreach($client as $id_client => $resultats){ ?>
            
            <tr>
                <td>
                    <a href="../client/afficher_client.php?id_client=<?php echo $resultats->id_client; ?>">Afficher</a>
                    ||
                    <a href="../client/modifier_client.php?id_client=<?php echo $resultats->id_client; ?>">Modifier</a>
                    ||
                    <a href="../client/supprimer_client.php?id_client=<?php echo $resultats->id_client; ?>">Supprimer</a>
                </td>
                <td><?php echo $resultats->id_client;?></td>
                <td><?php echo $resultats->nom_client; ?></td>
                <td><?php echo $resultats->prenom_client; ?></td>
                <td><?php echo $resultats->sexe; ?></td>
                <td><?php echo date("d/m/Y",strtotime($resultats->date_naissance)); ?></td>
                <td><?php echo $resultats->mail_client; ?></td>
                <td><?php echo $resultats->tel_1; ?></td>
                <td><?php echo $resultats->tel_2; ?></td>
                <td><?php echo $resultats->adresse_client; ?></td>
                <td><?php echo $resultats->ville_client; ?></td>
                <td><?php echo $resultats->cp_client; ?></td>
                <td><?php echo $resultats->dept_client; ?></td>
                <td><?php echo $resultats->pays_client; ?></td>
            </tr>
            
            <?php } ?>
        </table>
        
        <a href="ajouter_client.php">Ajouter un client</a><br>
    </body>
</html>
