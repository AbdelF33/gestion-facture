<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Description de l'article</title>
        
        <style>
            html{
                width: 900px;
                margin:auto;
            }
            h{
                margin:auto;
            }
            #image{
                width: 100px;
                height: 80px;
                float: left;
            }
            #desc{
                float: right;
            }
        </style>
    </head>
    <body>
        <?php
            function chargerclasses($class){
                    require("../dao/".$class.".class.php");
                }
                spl_autoload_register('chargerclasses');

                $data = new article("localhost", "gestion_facture", "abdel", "1236987456321");
                if(!$data->connect()){
                    echo $data->message();
                    exit;
                }

            if(($article = $data->select_id($_GET["id_article"])) === false){
                echo $data->message();
                exit;
            }
        ?>
        
        <a href="liste_article.php">Retour listing</a>
        
        <h1><?php echo $article->nom_article; ?></h1>
        <h2><?php echo $article->info_article; ?></h2>
        <div id="image"><img src="../img/<?php echo $article->photo_article; ?>"></div>
        <div id="desc"><p><?php echo $article->desc_article; ?></p></div>
    </body>
</html>
