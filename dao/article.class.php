<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author Abdel
 */
class article extends database{
    
    //Ajouter un article dans la table article
    function add_article($nom, $info, $desc, $prix, $qte, $photo, $etat, $remise, $poids, $id_cat, $id_entreprise){
        $sql =
         "INSERT INTO article(nom_article, info_article, desc_article, prix_article, qte_stock, photo_article, etat_article, remise, poids_unitaire, id_categorie, id_entreprise)
        VALUES("
        .$this->eq($nom)
        .", ".$this->eq($info)
        .", ".$this->eq($desc)
        .", ".$this->eq($prix)
        .", ".$this->eq($qte)
        .", ".$this->eq($photo)
        .", ".$this->eq($etat)
        .", ".$this->eq($remise)
        .", ".$this->eq($poids)
        .", ".$this->eq($id_cat)
        .", ".$this->eq($id_entreprise)
        .")";
        $res = $this->pdo->query($sql);
        if(!$res){
            $this->message = "impossible d'ajouter l'article";
            return false;
        }
        return true;
        //print_r($res);
    }
	
    //Afficher les articles en associant les catégories et l'entreprise
    function read_article(){
        $articles = array();	
        $sql = "SELECT article . * , categorie.nom_categorie, partenaire.nom_entreprise 
            FROM article,categorie,partenaire 
            WHERE article.id_categorie = categorie.id_categorie
            AND article.id_entreprise = partenaire.id_entreprise
            ORDER BY id_article ASC";

        $res = $this->pdo->query($sql);

        if(!$res){
            $this->message = "impossible d'afficher les articles";
            return false;
        }
        while($resultats = $res->fetch(PDO::FETCH_OBJ)){
        	$articles[$resultats->id_article] = $resultats;
		}
        return $articles;
    }
    
    //Modifier un article par id_article
    function update_article($id_art, $nom, $info, $desc, $prix, $qte, $photo, $etat, $remise, $poids, $id_cat){
        $sql = "UPDATE article
                SET 
                    nom_article=".$this->eq($nom).",
                    info_article=".$this->eq($info).",
                    desc_article=".$this->eq($desc).",
                    prix_article=".$this->eq($prix).",
                    qte_stock=".$this->eq($qte).",
                    photo_article=".$this->eq($photo).",
                    etat_article=".$this->eq($etat).",
                    remise=".$this->eq($remise).",
                    poids_unitaire=".$this->eq($poids).",
                    id_categorie=".$this->eq($id_cat)."
                WHERE
                    id_article=".$this->eq($id_art)."";
        $res = $this->pdo->query($sql);
		
        if(!$res){
            $this->message = "impossible de modifier l'article";
            return false;
        }
        return true;
    }

        //Supprimer un article par id_article
	function delete_article($id_article){
            $sql = "DELETE FROM article WHERE id_article = ".$id_article."";
		 
            $res = $this->pdo->query($sql);
            if(!$res){
                $this->message = "impossible de supprimer l'article";
                return false;
            }
            return true;
	}
        
        //Afficher les articles par id_article
        function select_id($id_article){
            $resultat = array();
            
            $sql = "SELECT * FROM article WHERE id_article = ".$id_article."";
            
            $res = $this->pdo->query($sql);

            if(!$res){
                $this->message = "impossible d'afficher les articles";
                return false;
            }
            if($resultat = $res->fetch(PDO::FETCH_OBJ)){
                $article = $resultat;
            }
            return $article;
        }
        
        //Afficher les catégories par id-categorie
        function select_cat($id_categorie){
            $resultat = array();
            
            $sql = "SELECT * FROM categorie WHERE id_categorie = ".$id_categorie."";
            
            $res = $this->pdo->query($sql);
            
            if(!$res){
                $this->message = "impossible d'afficher les articles";
                return false;
            }
            while($resultat = $res->fetch(PDO::FETCH_OBJ)){
        	$articles[$resultat->id_categorie] = $resultat;
		}
        return $articles;
        }
        
        //Afficher les catégories par id-categorie
        function select_entreprise($id_entreprise){
            $resultat = array();
            
            $sql = "SELECT * FROM partenaire WHERE id_entreprise = ".$id_entreprise." ORDER BY nom_entreprise ASC";
            
            $res = $this->pdo->query($sql);
            
            if(!$res){
                $this->message = "impossible d'afficher les entreprises";
                return false;
            }
            while($resultat = $res->fetch(PDO::FETCH_OBJ)){
        	$entreprise[$resultat->id_entreprise] = $resultat;
		}
        return $entreprise;
        }

}

?>
