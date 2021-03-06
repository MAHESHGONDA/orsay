<?php
/**
 * The template for displaying search forms in orsay
 *
 * @package Orsay
 */
?>

<form role="search" method="get" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <div class="input-group">

  	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'orsay' ); ?></label>
    <input type="text" class="form-control search-query" placeholder="<?php echo esc_attr_x( 'Search & Help', 'placeholder', 'orsay' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'orsay' ); ?>" />
    <span class="input-group-btn">
      <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'orsay' ); ?>"><i class="fa fa-search"></i></button>
    </span>

  </div>

</form>