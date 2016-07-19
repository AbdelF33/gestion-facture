<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ajouter un client</title>
        
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <script src="../js/jquery-1.9.1.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script>
              $(function() {
                $( "#datepicker" ).datepicker({
                  changeMonth: true,
                  changeYear: true
                });
              });
            jQuery(function($){
                $.datepicker.regional['fr-CH'] = {
                    closeText: 'Fermer',
                    prevText: 'Mois précédent',
                    nextText: 'Mois suivant',
                    currentText: 'Courant',
                    monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
                    'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
                    monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
                    'Jul','Aoû','Sep','Oct','Nov','Déc'],
                    dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
                    dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
                    dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
                    weekHeader: 'Sm',
                    dateFormat: 'yy-mm-dd',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''};
                $.datepicker.setDefaults($.datepicker.regional['fr-CH']);
            });
                
                //définir l'année minimum et l'année maximum a selectionner
                var d = new Date();
                var y = d.getFullYear();
                //alert (y);
                $.datepicker.setDefaults({
                yearRange: (y-130)+':'+y,
                defaultDate: -365*20  });

//            $(function() {
//                    $( "#date_naissance" ).datepicker({
//                        changeYear: true  // afficher un selecteur d'année
//                    });
//                });        
        </script>
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


            if($_POST){    
//                debug($_POST);
                   if(!$data->add_client($_POST["nom_client"], 
                                            $_POST["prenom_client"],
                                             $_POST["sexe"],
                                              $_POST["date_naissance"],
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
            $code = formulaire("", "post", "Ajouter un client", "1");
            
            $code.= libelle_2("Civilité :");
            $code.= radio("sexe","masculin","Mr");
            $code.= radio("sexe","f&eacute;minin","Mme");
            
            $code.= libelle("Nom :");
            $code.= champ_saisie("text", "nom_client","","1");
            
            $code.= libelle("Pr&eacute;nom :");
            $code.= champ_saisie("text", "prenom_client","","1");
            
            $code.= libelle("Date de naissance :");
            $code.= champ_saisie_id("text", "datepicker", "date_naissance","","1");
            
            $code.= libelle("Email :");
            $code.= champ_saisie("mail", "mail_client","","");
            
            $code.= libelle("T&eacute;l&eacute;phone 1:");
            $code.= champ_saisie("tel", "tel_1","","1");
            
            $code.= libelle("T&eacute;l&eacute;phone 2:");
            $code.= champ_saisie("tel", "tel_2","","");
            
            $code.= libelle("Adresse :");
            $code.= textarea("adresse_client","","6", "20");
            
            $code.= libelle("Code postal :");
            $code.= champ_saisie("text", "cp_client","","");
            
            $code.= libelle("Ville :");
            $code.= champ_saisie("text", "ville_client","","");
            
            $code.= libelle("D&eacute;partement :");
            $code.= champ_saisie("text", "dept_client","","");
                        
            $code.= libelle("Pays :");
            $code.= champ_saisie("text", "pays_client","","");
            
            $code.= libelle("Identifiant :");
            $code.= champ_saisie("text", "identifiant","","1");
            
            $code.= libelle("Mot de passe :");
            $code.= champ_saisie("password", "mdp","","1");
            
            $code.= libelle("");
            $code.= submit("submit", "Ajouter","action");

            
            $code.= submit("hidden", "ajouter","action");
			
            $code.= finform();
            echo $code;
            
        ?>
    </body>
</html>
