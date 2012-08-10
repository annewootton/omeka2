class Omeka_Output_Xml_PopupItem extends Omeka_Output_Xml_Item
{

    protected function _buildNode()
    {
        //This includes all the Omeka_Output_Xml_Item code, plus calls the _buildContributorForItem function.

        // item
        $itemElement = $this->_createElement('item', null, $this->_record->id);
        
        $itemElement->setAttribute('public', $this->_record->public);
        $itemElement->setAttribute('featured', $this->_record->featured);
        
        if (!in_array($this->_context, array('file'))) {
            // fileContainer
            $this->_buildFileContainerForItem($this->_record, $itemElement);
        }
        
        if (!in_array($this->_context, array('collection'))) {
            // collection
            $this->_buildCollectionForItem($this->_record, $itemElement);
        }
        
        // itemType
        $this->_buildItemTypeForItem($this->_record, $itemElement);
        
        // elementSetContainer
        $this->_buildElementSetContainerForRecord($this->_record, $itemElement);
        
        // tagContainer
        $this->_buildTagContainerForItem($this->_record, $itemElement);
                
        //here is where I added the call to the contributor function.
        //contributorContainer
        $this->_buildContributorForItem($this->_record, $itemElement);
        
        $this->_node = $itemElement;
    }

     // Build a contributor element in an item context.
   protected function _buildContributorForItem(Item $item, DOMElement $parentElement)
    {
        // Return if the item has no contributor.
        $contributor = contribution_get_item_contributor();
        if (!$contributor) {
            return null;
        }
        
        // contributor
        $contributorElement = $this->_createElement('contributor', null, $contributor->id);
        $nameElement = $this->_createElement('name', $contributor->name, null, $contributorElement);
          $emailElement = $this->_createElement('email', $contributor->email, null, $contributorElement);
        $contributorContainerElement = $this->_createElement('contributorContainer');
        $contributorElement->appendChild($contributorContainerElement);
        $parentElement->appendChild($contributorElement);
    }

}