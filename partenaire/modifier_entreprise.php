<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Modifier une entreprise</title>
    </head>
    <body>
        <?php
        // put your code here
            require "../function/ma_fonction_formulaire.php";
            //require "../function/functions.php";
            
            function chargerclasses($class){
                    require("../dao/".$class.".class.php");
                }
                spl_autoload_register('chargerclasses');

            //connection a la base
            $data = new entreprise("localhost", "gestion_facture", "abdel", "1236987456321");
            if(!$data->connect()){
                echo $data->message();
                exit;
            }

            
            if(($entreprise = $data->entreprise_id($_GET["id_entreprise"])) === false){
                echo $data->message();
                exit;
            }

            if($_POST){    
//                debug($_POST);
                   if(!$data->update_entreprise($_POST["id_entreprise"],
                                                $_POST["nom_entreprise"], 
                                                $_POST["type_entreprise"],
                                                $_POST["adresse"],
                                                $_POST["cp"],
                                                $_POST["ville"],
                                                $_POST["tel"],
                                                $_POST["email"],
                                                $_POST["site_internet"])){
                       echo $data->message();
                   }
            }
        ?>
        
        <a href="liste_entreprise.php">Retour au listing</a><br>
        
        <?php
            $code = formulaire("", "post", "Modifier une entreprise", "1");
            
            $code.= libelle("Nom :");
            $code.= champ_saisie("text", "nom_entreprise",$entreprise->nom_entreprise,"1");
            
            $code.= libelle("Type d'entreprise :");
            $code.= champ_saisie("text", "type_entreprise",$entreprise->type_entreprise,"1");
            
            $code.= libelle("Site internet :");
            $code.= champ_saisie("text", "site_internet",$entreprise->site_internet,"");
            
            $code.= libelle("Email :");
            $code.= champ_saisie("mail", "email",$entreprise->email,"1");
            
            $code.= libelle("T&eacute;l&eacute;phone :");
            $code.= champ_saisie("tel", "tel",$entreprise->tel,"1");
            
            $code.= libelle("Adresse :");
            $code.= textarea("adresse",$entreprise->adresse,"5", "17");
            
            $code.= libelle("Code postal :");
            $code.= champ_saisie("text", "cp",$entreprise->cp,"1");
            
            $code.= libelle("Ville :");
            $code.= champ_saisie("text", "ville",$entreprise->ville,"1");
                       
            $code.= libelle("");
            $code.= submit("submit", "Modifier","action");

            
            $code.= submit("hidden", $entreprise->id_entreprise,"id_entreprise");
			
            $code.= finform();
            echo $code;
            
        ?>
    </body>
</html>
