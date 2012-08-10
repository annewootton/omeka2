class Omeka_Output_Xml_PopupItemContainer extends Omeka_Output_Xml_ItemContainer
{

    protected function _buildNode()
    {
        
       $itemContainerElement = $this->_createElement('itemContainer');
        
        $this->_setContainerPagination($itemContainerElement);
        
        foreach ($this->_record as $item) {
            $itemOmekaXml = new Omeka_Output_Xml_PopupItem($item, $this->_context);
            $itemElement = $this->_doc->importNode($itemOmekaXml->_node, true);
            $itemContainerElement->appendChild($itemElement);
        }
        $this->_node = $itemContainerElement;
    }

}