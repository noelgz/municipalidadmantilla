<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" accept-charset="utf-8">
	<input type="search" name="s" value="<?php echo get_search_query(); ?>" class="form-control" placeholder="<?php echo esc_attr_x( 'Enter another keywords', 'placeholder' , 'newszine' ) ?>" title="<?php echo esc_attr_x( 'Search for:', 'label', 'newszine'  ) ?>" />
</form>