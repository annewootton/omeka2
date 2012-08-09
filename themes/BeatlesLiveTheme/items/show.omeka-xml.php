<?php
    include('../Omeka_Output_Xml_PopupItem.php');
?>

<?php
$omekaXml = new Omeka_Output_Xml_Item($item, 'item');
echo $omekaXml->getDoc()->saveXML();
