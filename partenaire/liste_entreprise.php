
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Listing des entreprises</title>
    </head>
    <body>
        <?php
        // put your code here
//        require "../function/functions.php";
            function chargerclasses($class){
                require("../dao/".$class.".class.php");
                }
                spl_autoload_register('chargerclasses');

            $data = new entreprise("localhost", "gestion_facture", "abdel", "1236987456321");
            if(!$data->connect()){
                echo $data->message();
                exit;
            }


            if(($entreprise = $data->read_entreprise()) === false){
                    echo $data->message();
                    exit;
            }
        ?>
        
        <a href="ajouter_entreprise.php">Ajouter une entreprise</a><br>
        
        <table border="1px">
            <tr>
                <th>Choix</th>
                <th>Id</th>
                <th>Nom</th>
                <th>Type d'entreprise</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th>T&eacute;l&eacute;phone</th>               
                <th>Email</th>
                <th>Site internet</th>
            </tr>
            
            <?php foreach($entreprise as $id_entreprise => $resultats){ ?>
            
            <tr>
                <td>
                    <a href="../partenaire/afficher_entreprise.php?id_entreprise=<?php echo $resultats->id_entreprise; ?>">Afficher</a>
                    ||
                    <a href="../partenaire/modifier_entreprise.php?id_entreprise=<?php echo $resultats->id_entreprise; ?>">Modifier</a>
                    ||
                    <a href="../partenaire/supprimer_entreprise.php?id_entreprise=<?php echo $resultats->id_entreprise; ?>">Supprimer</a>
                </td>
                <td><?php echo $resultats->id_entreprise;?></td>
                <td><?php echo $resultats->nom_entreprise; ?></td>
                <td><?php echo $resultats->type_entreprise; ?></td>
                <td><?php echo $resultats->adresse; ?></td>
                <td><?php echo $resultats->cp; ?></td>
                <td><?php echo $resultats->ville; ?></td>
                <td><?php echo $resultats->tel; ?></td>
                <td><?php echo $resultats->email; ?></td>
                <td><a href="<?php echo $resultats->site_internet; ?>" target="_blank"><?php echo $resultats->site_internet; ?></a></td>
            </tr>
            
            <?php } ?>
        </table>
        
        <a href="ajouter_entreprise.php">Ajouter une entreprise</a><br>
    </body>
</html>
