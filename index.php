<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<!--main START-->
<div id="main" class="grid">
    <div id="content" class="g-u" role="主内容">
        <?php get_template_part( 'loop', 'index' ); ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<!--main END-->

<?php get_footer(); ?>
