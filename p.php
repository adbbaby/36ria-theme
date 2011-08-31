<?php 
/*

Template Name: P

*/
?>
<?php get_header(); ?>
<!--main START-->
<div id="main" class="grid">
    <div id="content" class="g-u single-post page-post" role="主内容">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article data-id="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('block'); ?>>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="bd entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
		<?php endwhile; endif; ?>
        <div class="share block">
            <div class="share-list-container"><?php if(function_exists('wp_share_list')) wp_share_list();?></div>
            <s class="tag tag-share">分享</s>
        </div>
        <?php comments_template(); ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<!--main END-->
<?php get_footer(); ?>
