<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of client
 *
 * @author Abdel
 */
class client extends database{
    //put your code here
    
    //Afficher les clients de la table client
    function read_client(){
        $client = array();
        
        $sql = "SELECT * FROM client ORDER BY id_client ASC";
        
        $res = $this->pdo->query($sql);

        if(!$res){
            $this->message = "impossible d'afficher les clients";
            return false;
        }
        while($resultats = $res->fetch(PDO::FETCH_OBJ)){
        	$client[$resultats->id_client] = $resultats;
		}
        return $client;
    }
    
    //Ajouter un client dans la table client
    function add_client($nom, $prenom, $sexe, $date_naissance, $adresse, $tel_1, $tel_2, $ville, $dept, $cp, $mail, $pays, $id, $mdp ){
        
        $sql = "INSERT INTO client (nom_client, prenom_client, sexe, date_naissance, adresse_client, tel_1, tel_2, ville_client, dept_client, cp_client, mail_client, pays_client, identifiant, mdp)
                VALUES("
                .$this->eq($nom).","
                .$this->eq($prenom).","
                .$this->eq($sexe).","
                .$this->eq($date_naissance).","
                .$this->eq($adresse).","
                .$this->eq($tel_1).","
                .$this->eq($tel_2).","
                .$this->eq($ville).","
                .$this->eq($dept).","
                .$this->eq($cp).","
                .$this->eq($mail).","
                .$this->eq($pays).","
                .$this->eq($id).","
                .$this->eq($mdp).")";
        
        $res = $this->pdo->query($sql);
        if(!$res){
            $this->message = "impossible d'ajouter le client";
            return false;
        }
        return true;
                
    }
    
    //Modifier un client dans la table client
    function update_client($id_client, $adresse, $tel_1, $tel_2, $ville, $dept, $cp, $mail, $pays, $id, $mdp ){
        
        $sql = "UPDATE client 
                SET
                    adresse_client=".$this->eq($adresse).",
                    tel_1=".$this->eq($tel_1).",
                    tel_2=".$this->eq($tel_2).",
                    ville_client=".$this->eq($ville).",
                    dept_client=".$this->eq($dept).",
                    cp_client=".$this->eq($cp).",
                    mail_client=".$this->eq($mail).",
                    pays_client=".$this->eq($pays).",
                    identifiant=".$this->eq($id).",
                    mdp=".$this->eq($mdp)."
                WHERE
                    id_client = ".$this->eq($id_client)."";
        
        $res = $this->pdo->query($sql);
		
        if(!$res){
            $this->message = "impossible de modifier le client";
            return false;
        }
        return true;
    }
    
    //Afficher un client par l'id
    function client_id($id_client){
        $client = array();
        $sql = "SELECT * FROM client WHERE id_client = ".$id_client."";
        
        $res = $this->pdo->query($sql);
		
        if(!$res){
            $this->message = "impossible de modifier le client";
            return false;
        }
        if($resultats = $res->fetch(PDO::FETCH_OBJ)){
            $client = $resultats;
        }
        return $client;
    }
    
    //Supprimer un client par l'id
    function delete_client($id_client){
        
        $sql = "DELETE FROM client WHERE id_client = ".$id_client."";
        
        $res = $this->pdo->query($sql);
        if(!$res){
            $this->message = "impossible de supprimer le client";
            return false;
        }
        return true;
    }
}

?>
