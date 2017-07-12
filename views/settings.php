<div class="wrap">
    <h2><?php echo $this->plugin->displayName; ?> &raquo; <?php _e( 'Settings', $this->plugin->name ); ?></h2>

    <?php
    if ( isset( $this->message ) ) {
        ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>
        <?php
    }
    if ( isset( $this->errorMessage ) ) {
        ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>
        <?php
    }
    ?>

    <div id="poststuff">
    	<div id="post-body" class="metabox-holder columns-2">
    		<!-- Content -->
    		<div id="post-body-content">
				<div id="normal-sortables" class="meta-box-sortables ui-sortable">
	                <form action="edit.php?post_type=<?php echo $this->plugin->posttype; ?>&page=<?php echo $this->plugin->name; ?>" method="post">
		                <div class="postbox">
		                    <h3 class="hndle"><?php _e( 'Where do you want ads to display?', $this->plugin->name ); ?></h3>

		                    <div class="inside">
		                    	<p>
									<?php
									$postTypes = get_post_types( array(
										'public' => true,
									), 'objects');
									if ( $postTypes ) {
										foreach ( $postTypes as $postType ) {
											// Skip attachments
											if ( $postType->name == 'attachment' ) {
												continue;
											}
											?>
											<label for="<?php echo $postType->name; ?>"><?php echo $postType->labels->name; ?></label>
											<input type="checkbox" name="<?php echo $this->plugin->name; ?>[<?php echo $postType->name; ?>]" value="1" id="<?php echo $postType->name; ?>" <?php echo ( isset( $this->settings[$postType->name] ) ? ' checked' : '' ); ?>/>
											<?php
										}
									}
									?>
								</p>
								<p>
									<input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e( 'Save Settings', $this->plugin->name ); ?>" />
								</p>
		                    </div>
		                </div>
		                <!-- /postbox -->

		                <div class="postbox">
		                    <h3 class="hndle"><?php _e( 'Display Styling', $this->plugin->name ); ?></h3>

		                    <div class="inside">
		                   		<p>
									<label for="css"><?php _e( 'Exclude CSS', $this->plugin->name ) ;?></label>
									<input type="checkbox" name="<?php echo $this->plugin->name; ?>[css]" value="1" id="css" <?php echo ( isset( $this->settings['css'] ) ? ' checked' : '' ); ?>/>
								</p>
								<p class="description">
									<?php _e( 'By default, Post Ads are wrapped in a container that has some CSS to aid layout. Developers may wish to use their own CSS, and should check this Exclude CSS option.', $this->plugin->name ); ?>
								</p>

								<p>
									<input name="submit" type="submit" name="Submit" class="button button-primary" value="<?php _e( 'Save Settings', $this->plugin->name ); ?>" />
								</p>
		                    </div>
		                </div>
		                <!-- /postbox -->
		                <input type="hidden" name="_nonce" value= "<?php echo wp_create_nonce( $this->plugin->name . '-nonce' ); ?>" />
	                </form>
	                <!-- /postbox -->
				</div>
				<!-- /normal-sortables -->
    		</div>
    		<!-- /post-body-content -->

    		<!-- Sidebar -->
    		<div id="postbox-container-1" class="postbox-container">
    			<?php require_once( $this->plugin->folder . '/views/sidebar.php' ); ?>
    		</div>
    		<!-- /postbox-container -->
    	</div>
	</div>
</div>