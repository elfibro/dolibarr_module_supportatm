<?php
/* <one line to give the program's name and a brief idea of what it does.>
 * Copyright (C) 2015 ATM Consulting <support@atm-consulting.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * \file    class/actions_supportatm.class.php
 * \ingroup supportatm
 * \brief   This file is an example hook overload class file
 *          Put some comments here
 */

/**
 * Class Actionssupportatm
 */
class Actionssupportatm
{
	/**
	 * @var array Hook results. Propagated to $hookmanager->resArray for later reuse
	 */
	public $results = array();

	/**
	 * @var string String displayed by executeHook() immediately after return
	 */
	public $resprints;

	/**
	 * @var array Errors
	 */
	public $errors = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
	}

	/**
	 * Overloading the doActions function : replacing the parent's function with the one below
	 *
	 * @param   array()         $parameters     Hook metadatas (context, etc...)
	 * @param   CommonObject    &$object        The object to process (an invoice if you are in invoice module, a propale in propale's module, etc...)
	 * @param   string          &$action        Current action (if set). Generally create or edit or null
	 * @param   HookManager     $hookmanager    Hook manager propagated to allow calling another hook
	 * @return  int                             < 0 on error, 0 on success, 1 to replace standard code
	 */
	function doActions($parameters, &$object, &$action, $hookmanager)
	{
		$error = 0; // Error counter
		$myvalue = 'test'; // A result value

		print_r($parameters);
		echo "action: " . $action;
		print_r($object);

		if (in_array('somecontext', explode(':', $parameters['context'])))
		{
		  // do something only for the context 'somecontext'
		}

		if (! $error)
		{
			$this->results = array('myreturn' => $myvalue);
			$this->resprints = 'A text to show';
			return 0; // or return 1 to replace standard code
		}
		else
		{
			$this->errors[] = 'Error message';
			return -1;
		}
	}


	function printLeftBlock($parameters, &$object, &$action, $hookmanager){
		
		define('INC_FROM_DOLIBARR', true);
		dol_include_once('supportatm/config.php');
		
		
		
		    $url = $_SERVER['HTTP_REFERER'];
		    $info = "URL : ".$url;
		    $info.="\nUtilisateur : ".$user->login;
		
		    $url_support ="http://support.atm-consulting.fr/bug_report_page.php?summary=".urlencode("Saisissez une résumé simple de votre problème")."&description=".urlencode("Donnez nous autant d'informations que possible.")
		        ."&additional_info=".urlencode($info)."&project_id=".$conf->global->SUPPORTATM_PROJECTID;
			
			?>
			<div id="support_atm_popup" style="">
			<div class="header">ATM Support</div>
			<div class="content">
			Accès web :
			<strong>
			<a target="_blank" href="http://support.atm-consulting.fr/bug_report_page.php?summary=Saisissez+une+r%C3%A9sum%C3%A9+simple+de+votre+probl%C3%A8me&description=Donnez+nous+autant+d%27informations+que+possible.&additional_info=URL+%3A+http%3A%2F%2Flocalhost%2Fhtml%2Fclient%2Fceribois%2Fdolibarr%2Fhtdocs%2Findex.php%3Fmainmenu%3Dhome%0AUtilisateur+%3A+admin&project_id=">Support</a>
			</strong>
			</br>
			Téléphone :
			<strong>09 77 19 50 69</strong>
			<br>
			<small>(du lundi au vendredi, hors jours fériés, de 9h 12h et de 14h à 17h)</small>
			<br>
			</div>
			</div>
			
			<script>
			

			</script>
		<?php
		
		

	}
}