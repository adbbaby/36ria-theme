<?php if ( ! have_posts() ) : ?>

<?php endif; ?>
<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("post-digest"); ?>>
        <h1><a class="title entry-title" role="title" href="<?php the_permalink(); ?>" title="点此前往<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a> </h1>
        <div class="bd grid entry-content">
            <p class="image g-u">
                <a href="<?php the_permalink() ?>" title="点此前往<?php the_title(); ?>">
                    <?php
                    if(has_post_thumbnail()) {
                        the_post_thumbnail();
                    } else {
                        echo '<img src="'.get_bloginfo("template_url").'/images/no-has-thumbnail.png" alt="'.the_title_attribute('echo=0').'" />';
                    }
                    ?>
                </a>
            </p>
            <div class="digest g-u"><?php the_excerpt();?></div>
        </div>
    </article>
<?php endwhile; ?>
<div class="paginator grid">
    <div class="g-u">
        <?php if(function_exists('wp_pagenavi')) {wp_pagenavi();} ?>
    </div>
</div>