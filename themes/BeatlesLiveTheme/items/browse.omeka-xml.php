<?php    
include(THEME_DIR . '/BeatlesLiveTheme/outputs/Omeka_Output_Xml_PopupItemContainer.php');   
$omekaXml = new Omeka_Output_Xml_PopupItemContainer($items, 'itemContainer');
echo $omekaXml->getDoc()->saveXML();