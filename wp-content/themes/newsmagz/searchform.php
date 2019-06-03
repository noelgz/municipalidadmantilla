<?php
/**
 * Template for displaying search forms in newsmagz
 *
 * @package WordPress
 * @subpackage newsmagz
 */
?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="navbar-form"  action="<?php echo esc_url(home_url( '/' )); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'newsmagz' ) ?>
		</span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>"  name="s" class="form-control" placeholder="<?php echo esc_attr_x( 'Search in here &hellip;', 'placeholder', 'newsmagz' ) ?>" title="<?php echo esc_attr_x( 'Search for:', 'label', 'newsmagz' ) ?>">
	<button type="submit" title="Search"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'newsmagz' ); ?></span></button>
</form>
