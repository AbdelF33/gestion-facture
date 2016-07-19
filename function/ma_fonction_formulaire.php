<!--By Abdel Ratnane-->

<?php
	//Définition de la fonction pour formulaire 
	function formulaire($action,$method,$legend,$enctype)
	{
		if($enctype != ""){$enctype = 'enctype="multipart/from-data"';}
		$code ='<form action="'.$action.'" method="'.$method.'" '.$enctype.' name="form" id="form">';
		$code .='<legend><b>'.$legend.'</b></legend><br>';
		$code .='<table>';
		return $code;
	}
	
	//Définition de la fonction pour le libellé
	function libelle($libelle)
	{
		$code='<tr><td><label><b>'.$libelle.'</b></label></td>';
		return $code;
	}
        
        function libelle_2($libelle)
	{
		$code='<label><b>'.$libelle.'</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		return $code;
	}
	
	//Définition de la fonction pour champ de saisie
	function champ_saisie($type, $name, $value,$require)
	{
		if($require != ""){$require = 'required';}
		$code='<td><input type="'.$type.'" id = "'.$name.'" name="'.$name.'" value="'.$value.'" '.$require.'/></td></tr>';
		return $code;
	}
        
        function champ_saisie_id($type, $id ,$name, $value,$require)
	{
		if($require != ""){$require = 'required';}
		$code='<td><input type="'.$type.'" id = "'.$id.'" name="'.$name.'" value="'.$value.'" '.$require.'/></td></tr>';
		return $code;
	}
        
        //Définition de la fonction pour champ de saisie que l'on peut pas modifier
        function champ_saisie_disabled($type, $name, $value,$require)
	{
		if($require != ""){$require = 'required';}
		$code='<td><input disabled="disabled" type="'.$type.'" id = "'.$name.'" name="'.$name.'" value="'.$value.'" '.$require.'/></td></tr>';
		return $code;
	}
	
	//Définition de la fonction pour textarea
	function textarea($namearea, $value,$rows, $cols)
	{
		$code='<td><textarea name="'.$namearea.'" id="'.$namearea.'"  rows="'.$rows.'" cols="'.$cols.'">'.$value.'</textarea></td></tr>';
		return $code;
	}
	
	//Définition de la fonction pour une liste déroulante
	function debut_liste($namelist)
	{
		$code = '<td><select name='.$namelist.' id='.$namelist.'>';
		return $code;
	}
	function option_liste($valuelist,$namelist)
	{	
		$code = '<option value="'.$valuelist.'">'.$namelist.'</option>';
		return $code;
	}
	function fin_liste()
	{
		$code = '</select></td></tr>';
		return $code;
	}
	
	//Définition de la fonction pour un bouton radio
	function radio($nameradio, $valradio, $champradio)
	{
		$code = '<input type="radio" name="'.$nameradio.'" id="'.$nameradio.'" value="'.$valradio.'"/>'.$champradio.'&nbsp;&nbsp;';
		return $code;
	}
	
	//Définition de la fonction pour une checkbox 
		function checkbox($namebox,$valuebox,$champbox)
		{ 
			$code =	'<input type="checkbox" name="'.$namebox.'" value="'.$valuebox.'"/>'.$champbox.'<br>';
			return $code;
		}		
		
	//Définition de la fonction des boutton submit ou reset
	function submit($type, $value, $name)
	{
		$code ='<td><input type='.$type.' value='.$value.' name='.$name.' id="button"/></td></tr>';
		return $code;
	}
	
	//Définition de la fonction pour la fin du formulaire
	function finform()
	{
		$code ='</table>';	
		$code .='</form>';
		return $code;
	}
?>