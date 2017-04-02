<?php
/**
* @description This template display search form
* @package Deck Pro
* @version 1.0
*/
?>

<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search">
	<input class="search-input" value="<?php echo get_search_query(); ?>" type="search" name="s" placeholder="<?php esc_attr_e( 'To search, type and hit enter.', 'deck' ); ?>">
	<button class="search-submit btn" type="submit" role="button"><i class="fa fa-search"></i></button>
</form>