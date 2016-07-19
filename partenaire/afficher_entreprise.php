<?php
        // require "../function/ma_fonction_formulaire.php";
            //require "../function/functions.php";
            
            // function chargerclasses($class){
                    // require("../dao/".$class.".class.php");
                // }
                // spl_autoload_register('chargerclasses');

            //connection a la base
            // $data = new entreprise("localhost", "gestion_facture", "abdel", "1236987456321");
            // if(!$data->connect()){
                // echo $data->message();
                // exit;
            // }

            
            // if(($entreprise = $data->entreprise_id($_GET["id_entreprise"])) === false){
                // echo $data->message();
                // exit;
            // }
?>

<?php
    //(1) On inclut la classe de Google Maps pour générer ensuite la carte.
    require('../dao/GoogleMapAPI.class.php');

    //(2) On crée une nouvelle carte; Ici, notre carte sera $map.
    $map = new GoogleMapAPI('map');

    //(3) On ajoute la clef de Google Maps.
    $map->setAPIKey('AIzaSyAibd22OB_KtL8d886N3TvWnb7V1yzc-8U');

    //(4) On ajoute les caractéristiques que l'on désire à notre carte.
    $map->setWidth("800px");
    $map->setHeight("500px");
    $map->setCenterCoords ('2', '48');
    $map->setZoomLevel (5);
    
	//Zoom autoamtique en fonction des pointeurs
	$map->enableZoomEncompass();
	
    //Ajuster un pointeur avec l'adresse postale:
    $map->addMarkerByAddress( "avenue du loup, 64000 Pau, France", "bienvenue chez moi", "<em>mon adresse</em> de l'infobulle", "Chez Abdel");

    //(5) On applique la base XHTML avec les fonctions à appliquer ainsi 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Détail de l'entreprise</title>
        <?php $map->printHeaderJS(); ?>
        <?php $map->printMapJS(); ?>
    </head>
    <body onload="onLoad();">
	
		<a href="liste_entreprise.php">Retour au listing</a><br>
	
        <div>
            <?php $map->printMap();?>
        </div>
    </body>
</html>
