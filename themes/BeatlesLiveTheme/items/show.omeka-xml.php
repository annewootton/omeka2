<?php
  include(THEME_DIR . '/BeatlesLiveTheme/outputs/Omeka_Output_Xml_PopupItem.php');
$omekaXml = new Omeka_Output_Xml_PopupItem($item, 'item');
echo $omekaXml->getDoc()->saveXML();
