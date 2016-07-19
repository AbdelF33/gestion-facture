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

    if($_GET){                   // debug($_GET);
        if(!$data->delete_client($_GET["id_client"])){
                echo $data->message();
                exit;
        }

        echo "
                  <script>
                  alert(\"Le client a \351t\351 supprim\351 avec succ\350s !\");
                  window.location=\"liste_client.php\";
                  </script>
                 ";
        } 
        else { 
            echo "<script>window.location=\"liste_client.php\";</script>";

    }	
?>
