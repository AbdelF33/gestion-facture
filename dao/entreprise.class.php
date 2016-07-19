<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of entreprise
 *
 * @author Abdel
 */
class entreprise extends database{
    //put your code here
    
    //Afficher toute les entreprises de la table partenaire
    function read_entreprise(){
        $entreprise = array();
        
        $sql = "SELECT * FROM partenaire ORDER BY id_entreprise ASC";
        
        $res = $this->pdo->query($sql);

        if(!$res){
            $this->message = "impossible d'afficher les entreprises";
            return false;
        }
        while($resultats = $res->fetch(PDO::FETCH_OBJ)){
        	$entreprise[$resultats->id_entreprise] = $resultats;
		}
        return $entreprise;
    }
    
    //Ajouter une entreprise dans la table partenaire
    function add_entreprise($nom, $type, $adresse, $cp, $ville, $tel, $email, $siteweb){
        
        $sql = "INSERT INTO partenaire(nom_entreprise, type_entreprise, adresse, cp, ville ,tel, email, site_internet)
                VALUES("
                .$this->eq($nom).", "
                .$this->eq($type).", "
                .$this->eq($adresse).", "
                .$this->eq($cp).", "
                .$this->eq($ville).", "
                .$this->eq($tel).", "
                .$this->eq($email).", "
                .$this->eq($siteweb).")";
        
        $res = $this->pdo->query($sql);
        if(!$res){
            $this->message = "impossible d'ajouter l'entreprise";
            return false;
        }
        return true;
    }
    
    //Modifier une entreprise dans la table partenaire
    function update_entreprise($id, $nom, $type, $adresse, $cp, $ville, $tel, $email, $siteweb){
        
        $sql = "UPDATE partenaire 
                SET
                    nom_entreprise=".$this->eq($nom).",
                    type_entreprise=".$this->eq($type).",
                    adresse=".$this->eq($adresse).",
                    cp=".$this->eq($cp).",
                    ville=".$this->eq($ville).",
                    tel=".$this->eq($tel).",
                    email=".$this->eq($email).",
                    site_internet=".$this->eq($siteweb)."
                WHERE
                    id_entreprise = ".$id."";
        
        $res = $this->pdo->query($sql);
        if(!$res){
            $this->message = "impossible de modifier l'entreprise";
            return false;
        }
        return true;
    }
    
    //Supprimer une entreprise dans la table partenaire
    function delete_entreprise($id_entreprise){
        
        $sql = "DELETE FROM partenaire WHERE id_entreprise = ".$id_entreprise."";
        
        $res = $this->pdo->query($sql);
        if(!$res){
            $this->message = "impossible de supprimer l'entreprise";
            return false;
        }
        return true;
    }
    
    //Afficher une entreprise a partir de son id:
    function entreprise_id($id_entreprise){
        
        $entreprise = array();
        
        $sql = "SELECT * FROM partenaire WHERE id_entreprise = ".$id_entreprise."";
        
        $res = $this->pdo->query($sql);
		
        if(!$res){
            $this->message = "impossible d'afficher les entreprises";
            return false;
        }
        if($resultats = $res->fetch(PDO::FETCH_OBJ)){
            $entreprise = $resultats;
        }
        return $entreprise;
    }
}

?>
