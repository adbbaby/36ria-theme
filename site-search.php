<?php
/*
Template Name: site-search
*/


get_header(); ?>
<!--main START-->
<div id="main" class="grid">
    <div id="content" class="g-u single-post page-post" role="主内容">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article data-id="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('block'); ?>>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div id="cse" style="padding:10px;line-height:24px;"></div>
                    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
                    <script type="text/javascript">
                      google.load('search', '1', {language : 'zh-CN'});
                      google.setOnLoadCallback(function(){
                        var customSearchControl = new google.search.CustomSearchControl('015918306757214125490:q3jdq9kuhmm');
                        customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
                        var options = new google.search.DrawOptions();
                        options.setSearchFormRoot('cse-search-form');
                        customSearchControl.draw('cse', options);
                        var match = location.search.match(/q=([^&]*)(&|$)/);
                        if(match && match[1]){
                            var search = decodeURIComponent(match[1]);

                            customSearchControl.execute(search);
                        }
                      }, true);
                </script>
            </article>
		<?php endwhile; endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<!--main END-->
<?php get_footer(); ?>