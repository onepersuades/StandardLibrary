<div class="wrap">
	<h2><i class="dashicons dashicons-admin-generic"></i>&nbsp;<?php echo $title; ?></h2>
	<?php echo $wp_nonce_field["meta_box"]; ?>
	<?php echo $wp_nonce_field["postboxes"]; ?>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-{{ screen_cols }}"> 
			<div id="postbox-container-1" class="postbox-container">
				<?php do_meta_boxes( '', "side", NULL ); ?>
			</div>    
			<div id="postbox-container-2" class="postbox-container">
				<?php do_meta_boxes( '', "normal", NULL ); ?>
				<?php do_meta_boxes( '', "advanced", NULL ); ?>
			</div>	     					
		</div>
	</div>
</div>
<script type="text/javascript">
postboxes.add_postbox_toggles( pagenow );
</script>