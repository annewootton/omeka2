<?php head(array('title' => item('BeatlesLive', 'Title'))); ?>

<div id="primary-items">

	<div class="indent">

		<?php if (item_has_thumbnail()): ?>
			<div class="item-img-solo">
				<?php echo link_to_item(item_square_thumbnail()); ?>						
			</div>
		<?php endif; ?>

		<!--  The following function prints all the the metadata associated with an item: Beatles Live, extra element sets, etc. See http://omeka.org/codex or the examples on items/browse for information on how to print only select metadata fields. -->
		<?php echo show_item_metadata(array('show_element_sets' => array('BeatlesLive'))); ?>	
		
	    <!-- The following returns all of the files associated with an item. -->
		<div id="itemfiles" class="element">
		    <h3>Files</h3>
			<div class="element-text"><?php echo display_files_for_item(); ?></div>
		</div>
		
		<!-- If the item belongs to a collection, the following creates a link to that collection. -->
		<?php if ( item_belongs_to_collection() ): ?>
		<div id="collection" class="element">
		    <h3>Collection</h3>
		    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
		</div>
	    <?php endif; ?>
	
	    <!-- The following prints a list of all tags associated with the item -->
		<?php if (item_has_tags()): ?>
		<div class="tags" class="element">
			<h3>Tags:</h3>
		    <div class="element-text"><?php echo item_tags_as_string(); ?></div>	
		</div>
		<?php endif;?>
		
		<!-- The following prints a citation for this item. -->
		<div id="citation" class="element">
		<h3>Citation</h3>
		<div id="citation-text" class="element-text"><?php echo item_citation(); ?></div>
		</div>
		
		<ul class="item-pagination navigation">
		<li id="previous-item" class="previous">
			<?php echo link_to_previous_item('< Previous Item'); ?>
		</li>
		<li id="next-item" class="next">
			<?php echo link_to_next_item('Next Item >'); ?>
		</li>
		</ul>
		
		<?php echo plugin_append_to_items_show(); ?>

	</div>
	<div style="clear:both"></div>
</div><!-- end primary-items -->

<?php foot(); ?>