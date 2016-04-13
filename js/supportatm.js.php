<?php

    require('../config.php');

	if($user->rights->supportatm->read) {
	    $url = $_SERVER['HTTP_REFERER'];
	    $info = "URL : ".$url;
	    $info.="\nUtilisateur : ".$user->login;
	
	    $url_support ="http://support.atm-consulting.fr/bug_report_page.php?summary=".urlencode("Saisissez une résumé simple de votre problème")."&description=".urlencode("Donnez nous autant d'informations que possible.")
	        ."&additional_info=".urlencode($info)."&project_id=".$conf->global->SUPPORTATM_PROJECTID;
			
		?>
		<!--$(document).ready(function() {
		   
		  
		   $('#support_atm_popup').mouseover(function() {
		       $("#support_atm_popup").css("left","-5px" );
		   
		   });
		    
		   $('#support_atm_popup').insertAfter('#blockvmenuhelpapp');
		   $('#support_atm_popup').mouseout(function() {
		       $("#support_atm_popup").css("left","" );
		   });
		    
		});-->
		
		<?php    		
	}

