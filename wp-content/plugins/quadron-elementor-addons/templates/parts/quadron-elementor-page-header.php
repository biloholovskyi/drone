<?php

	/*
	* Quadron Page Header
	*/
	// Get the current post id
	$post_id = get_the_ID();
	// Get the page settings manager
	$quadron_page_settings_manager  =  \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );
	$quadron_page_settings_model    =  $quadron_page_settings_manager->get_model( $post_id );
	$quadron_hide_page_header_type  =  $quadron_page_settings_model->get_settings( 'quadron_hide_page_header_type' );

