<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Modifier un client</title>
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
            $data = new client("localhost", "gestion_facture", "abdel", "1236987456321");
            if(!$data->connect()){
                echo $data->message();
                exit;
            }
            
            if(($client = $data->client_id($_GET["id_client"])) === false){
                echo $data->message();
                exit;
            }

            if($_POST){       
               if(!$data->update_client(    $_POST["id_client"],
                                            $_POST["adresse_client"], 
                                            $_POST["tel_1"], 
                                            $_POST["tel_2"],
                                            $_POST["ville_client"],
                                            $_POST["dept_client"],
                                            $_POST["cp_client"],
                                            $_POST["mail_client"],
                                            $_POST["pays_client"],
                                            $_POST["identifiant"],
                                            $_POST["mdp"])){
                   echo $data->message();
               }
            }
        ?>
        
        <a href="liste_client.php">Retour au listing</a><br>
        
        <?php
            $code = formulaire("", "post", "Modifier un client", "1");
            
            $code.= libelle("Nom :");
            $code.= champ_saisie("text", "nom_client",$client->nom_client,"1");
            
            $code.= libelle("Pr&eacute;nom :");
            $code.= champ_saisie("text", "prenom_client", $client->prenom_client,"1");
            
            $code.= libelle("Date de naissance :");
            $code.= champ_saisie("date", "date_naissance",$client->date_naissance,"1");
            
            $code.= libelle("Email :");
            $code.= champ_saisie("mail", "mail_client",$client->mail_client,"");
            
            $code.= libelle("T&eacute;l&eacute;phone 1:");
            $code.= champ_saisie("tel", "tel_1",$client->tel_1,"1");
            
            $code.= libelle("T&eacute;l&eacute;phone 2:");
            $code.= champ_saisie("mail", "tel_2",$client->tel_2,"");
            
            $code.= libelle("Adresse :");
            $code.= textarea("adresse_client",$client->adresse_client,"6", "20");
            
            $code.= libelle("Code postal :");
            $code.= champ_saisie("text", "cp_client",$client->cp_client,"");
            
            $code.= libelle("Ville :");
            $code.= champ_saisie("text", "ville_client",$client->ville_client,"");
            
            $code.= libelle("D&eacute;partement :");
            $code.= champ_saisie("text", "dept_client",$client->dept_client,"");
                        
            $code.= libelle("Pays :");
            $code.= champ_saisie("text", "pays_client",$client->pays_client,"");
            
            $code.= libelle("Identifiant :");
            $code.= champ_saisie_disabled("text", "identifiant",$client->identifiant,"1");
            
            $code.= libelle("Mot de passe :");
            $code.= champ_saisie("password", "mdp",$client->mdp,"1");
            
            $code.= libelle("");
            $code.= submit("submit", "Modifier","action");

            
            $code.= submit("hidden", $client->id_client,"id_client");
			
            $code.= finform();
            echo $code;
            
        ?>
    </body>
</html>
