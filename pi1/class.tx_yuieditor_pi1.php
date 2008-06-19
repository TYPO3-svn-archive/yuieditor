<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2008 Sebastian Gebhard <sg@webagentur-gebhard>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'YUI Editor' for the 'yuieditor' extension.
 *
 * @author	Sebastian Gebhard <sg@webagentur-gebhard>
 * @package	TYPO3
 * @subpackage	tx_yuieditor
 */
class tx_yuieditor_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_yuieditor_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_yuieditor_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'yuieditor';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content,$conf)	{
		$this->conf=$conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_initPIflexForm(); // Einmal am Anfang der Klasse
        $this->gp = $_GET[$this->extKey];
        // Service einbinden
        require_once(t3lib_extMgm::siteRelPath('yuieditor').'sv1/class.tx_yuieditor_sv1.php');
        $this->yui =  t3lib_div::makeInstance('tx_yuieditor_sv1');
        // Flexform values
        $this->code = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'bereich', 'sDEF');
        
        // Processing...
	    $this->yui->addHeaderFiles();
	    $this->yui->renderEditor('test');
	    $content = '<textarea id="test">test</textarea>';
		return $this->pi_wrapInBaseClass($content);
	}

}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/yuieditor/pi1/class.tx_yuieditor_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/yuieditor/pi1/class.tx_yuieditor_pi1.php']);
}

?>