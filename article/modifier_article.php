<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
            require "../function/ma_fonction_formulaire.php";
            require"../function/functions.php";
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

            if(($categorie = $data->select_cat("id_categorie")) === false){
                            echo $data->message();
                            exit;
                    }
                    
            if($_POST){  //debug($_POST);     
                   if(!$data->update_article(	$_POST["id_article"], 
                                                $_POST["nom_article"], 
                                                $_POST["info_article"],
                                                $_POST["desc_article"],
                                                $_POST["prix_article"],
                                                $_POST["qte_stock"],
                                                $_POST["photo_article"],
                                                $_POST["etat_article"],
                                                $_POST["remise"],
                                                $_POST["poids_unitaire"],
                                                $_POST["id_categorie"])){
                       echo $data->message();
                   }
            }
            
            if(($article = $data->select_id($_GET["id_article"])) === false){
                    echo $data->message();
                    exit;
            }
        ?>
        
        <a href="liste_article.php">Retour listing</a>
        
        <?php
   
            $code = formulaire("", "post", "Modifier un article", "1");
			
            $code.= libelle("Nom de l'article :");
            $code.= champ_saisie("text", "nom_article", $article->nom_article,"");
            
            $code.= libelle("Informations :");
            $code.= champ_saisie("text", "info_article",$article->info_article,"");
            
            $code.= libelle("Catégories :");
            $code.= debut_liste("id_categorie");	
                foreach($categorie as $id_categorie => $resultat){
                    $code.= option_liste($resultat->id_categorie, $resultat->nom_categorie);    
                }  
            $code.= fin_liste();
            
            $code.= libelle("Prix de l'article :");
            $code.= champ_saisie("text", "prix_article",$article->prix_article,"");
            
            $code.= libelle("Quantité en stock :");
            $code.= champ_saisie("text", "qte_stock",$article->qte_stock,"");
            
            $code.= libelle("Image de l'article :");
            $code.= champ_saisie("file", "photo_article",$article->photo_article,"");
            
            $code.= libelle("Poids en (g) :");
            $code.= champ_saisie("text", "poids_unitaire",$article->poids_unitaire,"");
                        
            $code.= libelle("Votre remise est de :");
            $code.= champ_saisie("text", "remise",$article->remise,"");
            
            $code.= libelle("Description détaillé :");
            $code.= textarea("desc_article",$article->desc_article,"10", "50");
            
            $code.= libelle("");
            $code.= submit("submit", "Modifier","action");

            $code.= submit("hidden", $article->id_article,"id_article");
           // $code.= submit("hidden", "ajouter","action");
			
            $code.= finform();
            echo $code;
            
        ?>
    </body>
</html>
