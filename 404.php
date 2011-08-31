<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>


                	<div id="content-body-left" class="l mar-r-10 mar-t-10">
                           <h2 class="center"><?php _e('对不起，没找到此页面', 'kubrick'); ?></h2>
                                              	              
                    </div>
					<?php get_sidebar(); ?>                     
                </div>        
        </div>    
    </div>

</div>
<!--main START-->
<div id="main" class="grid">
    <div id="content" class="g-u" role="主内容">
		<h1 class="entry-title><?php _e('对不起，没找到此页面', 'kubrick'); ?></h1>
    </div>
    <?php get_sidebar(); ?>
</div>
<!--main END-->

<?php get_footer(); ?>
