<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ajouter une entreprise</title>
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


            if($_POST){    
//                debug($_POST);
                   if(!$data->add_entreprise($_POST["nom_entreprise"], 
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
            $code = formulaire("", "post", "Ajouter une entreprise", "1");
            
            $code.= libelle("Nom :");
            $code.= champ_saisie("text", "nom_entreprise","","1");
            
            $code.= libelle("Type d'entreprise :");
            $code.= champ_saisie("text", "type_entreprise","","1");
            
            $code.= libelle("Site internet :");
            $code.= champ_saisie("text", "site_internet","","");
            
            $code.= libelle("Email :");
            $code.= champ_saisie("mail", "email","","1");
            
            $code.= libelle("T&eacute;l&eacute;phone :");
            $code.= champ_saisie("tel", "tel","","1");
            
            $code.= libelle("Adresse :");
            $code.= textarea("adresse","","5", "17");
            
            $code.= libelle("Code postal :");
            $code.= champ_saisie("text", "cp","","1");
            
            $code.= libelle("Ville :");
            $code.= champ_saisie("text", "ville","","1");
                       
            $code.= libelle("");
            $code.= submit("submit", "Ajouter","action");

            
            $code.= submit("hidden", "ajouter","action");
			
            $code.= finform();
            echo $code;
            
        ?>
    </body>
</html>
