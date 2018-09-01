<?php 

function Clockworks( $theme_args = null ) {
	return Clockworks_Theme::get_instance( $theme_args );
}

function clockworks_return_blank() {
	return '';
}
