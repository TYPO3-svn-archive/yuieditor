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

require_once(PATH_t3lib.'class.t3lib_svbase.php');


/**
 * Service "YUI Service" for the "yuieditor" extension.
 *
 * @author	Sebastian Gebhard <sg@webagentur-gebhard>
 * @package	TYPO3
 * @subpackage	tx_yuieditor
 */
class tx_yuieditor_sv1 extends t3lib_svbase {
				var $prefixId = 'tx_yuieditor_sv1';		// Same as class name
				var $scriptRelPath = 'sv1/class.tx_yuieditor_sv1.php';	// Path to this script relative to the extension dir.
				var $extKey = 'yuieditor';	// The extension key.
	
                function addHeaderFiles(){
				    $GLOBALS['TSFE']->pSetup['bodyTagAdd'] = 'class="yui-skin-sam"';
				    $GLOBALS['TSFE']->additionalHeaderData[$this->prefixId] .= '<!-- Skin CSS file -->
					<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.2/build/assets/skins/sam/skin.css">
					<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.2/build/editor/assets/skins/sam/editor.css">
					<!-- Utility Dependencies -->
					<script type="text/javascript" src="http://yui.yahooapis.com/2.5.2/build/yahoo-dom-event/yahoo-dom-event.js"></script>
					<script type="text/javascript" src="http://yui.yahooapis.com/2.5.2/build/element/element-beta-min.js"></script>
					<!-- Needed for Menus, Buttons and Overlays used in the Toolbar -->
					<script src="http://yui.yahooapis.com/2.5.2/build/container/container_core-min.js"></script>
					<script src="http://yui.yahooapis.com/2.5.2/build/menu/menu-min.js"></script>
					<script src="http://yui.yahooapis.com/2.5.2/build/button/button-min.js"></script>
					<!-- Source file for Rich Text Editor-->
					<script src="http://yui.yahooapis.com/2.5.2/build/editor/editor-beta-min.js"></script>
					<link href="typo3conf/ext/yuieditor/pi1/ext_style.css" type="text/css" rel="stylesheet" />';
				}
				
				function renderEditor($id, $width = 500, $height = 300){
				    $GLOBALS['TSFE']->JSeventFuncCalls['onload'][$this->extKey] =  '
					var myEditor = new YAHOO.widget.Editor(\''.$id.'\', {
				    	height: \''.$height.'px\',
				    	width: \''.$width.'px\',
				    	dompath: false, //Turns on the bar at the bottom
				    	animate: false //Animates the opening, closing and moving of Editor windows
					});
					myEditor.render();
					myEditor.on("editorContentLoaded", "editorContentLoaded");';
				}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/yuieditor/sv1/class.tx_yuieditor_sv1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/yuieditor/sv1/class.tx_yuieditor_sv1.php']);
}

?>