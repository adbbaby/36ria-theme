<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
<!--main START-->
<div id="main" class="grid">
    <div id="content" class="g-u" role="������">
        <?php get_template_part( 'loop', 'archive' ); ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<!--main END-->
<?php get_footer(); ?>
