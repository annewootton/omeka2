<?php
add_plugin_hook('install', 'install');
//add_filter('define_response_contexts', 'pbcoreOutputReponseContext');
//add_filter('define_action_contexts', 'pbcoreOutputActionContext');
//add_plugin_hook('public_theme_header', 'pbcoreThemeHeader');

function install() {
	$elementSetMetadata = array(
	    'name'        => "BeatlesLive", 
	    'description' => "This element set was created in 2012 for use with crowdsourced content contributed through the Beatles Live project."
	);
	$elements = array(

	//Beatles Live! Title
		array(
			'label' => 'Title', 
			'name'  => 'Title',
			'data_type'   => 'Tiny Text',
		),

	//Beatles Live! Subject (controlled vocab)
		array(
			'label' => 'Subject', 
			'name'  => 'Subject',
			'data_type'   => 'Tiny Text',
		),

	//Beatles Live! Description
	    array(
			'label' => 'Description', 
			'name'  => 'Description',
	    ),

	//Beatles Live! Related City (controlled vocab)
	    array(
			'label' => 'Related City', 
	        'name'  => 'Related City',
	        'data_type'   => 'Tiny Text',
	    ),

	//Beatles Live! Related Concert Date (controlled vocab)    
	    array(
			'label' => 'Related Concert Date', 
			'name'  => 'Related Concert Date',
			'data_type'   => 'Tiny Text',
	     ),

	//Beatles Live! URL for hosted video submissions
		array(
			'label' => 'URL', 
			'name'  => 'URL',
			'data_type'   => 'Tiny Text',
		),
		
	//Beatles Live! Original Format
		array(
			'label' => 'Original Format', 
			'name'  => 'Original Format',
			'data_type'   => 'Tiny Text',
		),
	);
	insert_element_set($elementSetMetadata, $elements);
}

add_filter('admin_items_form_tabs', 'pbcore_items_form_tabs');

function pbcore_items_form_tabs($tabs, $item)
{
	unset($tabs['Dublin Core']);
	return $tabs;
}

function pbcoreOutputReponseContext($context)
{
    $context['pbcore'] = array('suffix'  => 'pbcore', 
                            'headers' => array('Content-Type' => 'text/xml'));

    return $context;
}

function pbcoreOutputActionContext($context, $controller)
{
    if ($controller instanceof ItemsController) {
        $context['show'][] = 'pbcore';
    }

    return $context;
}

function pbcoreThemeHeader()
{
	echo pbcoreOutput();
}
   
function pbcoreOutput()
{
    $request = Zend_Controller_Front::getInstance()->getRequest();

	if ($request->getControllerName() == 'items' && $request->getActionName() == 'show') {
	    return '<link rel="alternate" type="application/rss+xml" href="'.item_uri().'?output=pbcore" id="pbcore"/>' . "\n";
	}
}