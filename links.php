<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/*
Template Name: Links
*/
?>

<?php get_header(); ?>

                	<div id="content-body-left" class="l mar-r-10 mar-t-10">
					<?php if (have_posts()) : the_post(); ?>
                        <!--post-->
                            <div>
                                    <h2 id="single_title" style="text-align:center;font-size:24px;"><?php the_title(); ?></h2>
                                    <div class="ria_box_entry single_body" >
            								<p style="color:#AE32FF;padding:10px 0px;">不再接受友情链接的申请，谢谢！</p>
                                            <ul id="links_list" class="clearfix">
                                                    <?php wp_list_bookmarks(); ?>
                                            </ul>
                                    </div>    
                                     <?php comments_template(); ?>                                                                         
                            </div>      
                        <!--/post -->
                        <?php else : ?>
                        <div class="notfound"><h1>Not Found</h1>
                        Sorry, but you are looking for something that isn't here.
                        </div>
                        <?php endif; ?>              	              
                    </div>
					<?php get_sidebar(); ?>                     
                </div>        
        </div>    
    </div>

</div>

<?php get_footer(); ?>
