<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ajouter un article</title>
    </head>
    <body>
        <?php
            // put your code here
            require "../function/ma_fonction_formulaire.php";
            //require "../function/functions.php";
            //require "database.class.php";
            function chargerclasses($class){
                    require("../dao/".$class.".class.php");
                }
                spl_autoload_register('chargerclasses');

            $data = new article("localhost", "gestion_facture", "abdel", "1236987456321");
            if(!$data->connect()){
                echo $data->message();
                exit;
            }

            if(($articles = $data->select_cat("id_categorie")) === false){
                            echo $data->message();
                            exit;
            }
                            
            if(($entreprise = $data->select_entreprise("id_entreprise")) === false){
                            echo $data->message();
                            exit;      
            }
            if($_POST){    
//                debug($_POST);
                   if(!$data->add_article($_POST["nom_article"], 
                                            $_POST["info_article"],
                                             $_POST["desc_article"],
                                              $_POST["prix_article"],
                                               $_POST["qte_stock"],
                                                $_POST["photo_article"],
                                                 $_POST["etat_article"],
                                                  $_POST["remise"],
                                                   $_POST["poids_unitaire"],
                                                    $_POST["id_categorie"],
                                                    $_POST["id_entreprise"])){
                       echo $data->message();
                   }
            }
        ?>
        
        <a href="liste_article.php">Retour listing</a>
        
        <?php
            $code = formulaire("", "post", "Ajouter un article", "1");
            
            $code.= libelle("Partenaire :");
            $code.= debut_liste("id_entreprise");	
                foreach($entreprise as $id_article => $resultat){
                    $code.= option_liste($resultat->id_entreprise, $resultat->nom_entreprise);    
                }  
            $code.= fin_liste();
            
            $code.= libelle("Nom de l'article :");
            $code.= champ_saisie("text", "nom_article","","1");
            
            $code.= libelle("Informations :");
            $code.= champ_saisie("text", "info_article","","1");
            
            $code.= libelle("Catégories :");
            $code.= debut_liste("id_categorie");	
                foreach($articles as $id_article => $resultats){
                    $code.= option_liste($resultats->id_categorie, $resultats->nom_categorie);    
                }  
            $code.= fin_liste();
            
            $code.= libelle("Prix de l'article :");
            $code.= champ_saisie("text", "prix_article","","");
            
            $code.= libelle("Quantité en stock :");
            $code.= champ_saisie("text", "qte_stock","","");
            
            $code.= libelle("Image de l'article :");
            $code.= champ_saisie("file", "photo_article","","");
            
            $code.= libelle("Poids en (g) :");
            $code.= champ_saisie("text", "poids_unitaire","","");
                        
            $code.= libelle("Votre remise est de :");
            $code.= champ_saisie("text", "remise","","");
            
            $code.= libelle("Description détaillé :");
            $code.= textarea("desc_article","","10", "50");
            
            $code.= libelle("");
            $code.= submit("submit", "Ajouter","action");

            
            $code.= submit("hidden", "ajouter","action");
			
            $code.= finform();
            echo $code;
            
        ?>
        
    </body>
</html>
