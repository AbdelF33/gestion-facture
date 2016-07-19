
        <?php
        // put your code here

			//require "../function/functions.php";
			 //require("database.class.php");
                function chargerclasses($class){
                    require("../dao/".$class.".class.php");
                }
                spl_autoload_register('chargerclasses');
			 
                $data = new article("localhost", "gestion_facture", "abdel", "1236987456321");
	        if(!$data->connect()){
	            echo $data->message();
	            exit;
	        }
			
                if($_GET){                   // debug($_GET);
                    if(!$data->delete_article($_GET["id_article"])){
                            echo $data->message();
                            exit;
                    }

                    echo "
                              <script>
                              alert(\"L'article a \351t\351 supprim\351 avec succ\350s !\");
                              window.location=\"liste_article.php\";
                              </script>
                             ";
                    } 
                    else { 
                        echo "<script>window.location=\"liste_article.php\";</script>";

                }	
	 
        ?>
