<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <article data-id="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('block J_SinglePost'); ?>>
        <header>
            <h1 class="entry-title J_SinglePostTitle"><?php the_title(); ?></h1>
            <p class="info">发布于<time datetime="<?php the_time(); ?>"><b><?php the_time('Y') ?>年<?php the_time('m') ?>月<?php the_time('j') ?>日</b></time>，归属于<b><?php the_category(' ,'); ?></b>。
                <?php comments_popup_link(__('沙发还空着，抢！', 'kubrick'), __('只剩下板凳啦！', 'kubrick'), __('前<b>%</b>个座位已被强势霸占！', 'kubrick'), '', __('关闭评论', 'kubrick') ); ?>
                <?php if(function_exists('the_views')) { the_views(); } ?>&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
        </header>
        <div class="bd entry-content">
            <?php the_content(); ?>
        </div>
        <footer class="grid">
            <div class="author J_Author g-u" data-email="<?php echo get_the_author_meta('user_email'); ?>">
                <figure>
                    <?php echo get_avatar( get_the_author_meta('user_email'), '70' ); ?>
                    <figcaption><b><?php the_author_posts_link();?></b></figcaption>
                </figure>
            </div>
            <div class="hi g-u">
                <p><?php echo get_the_author_meta('description'); ?></p>
                <p class="sub-title">辛勤码教程中...求订阅...O(∩_∩)O</p>
                <ul class="gird">
                    <li class="g-u">
                        <a href="http://fusion.google.com/add?feedurl=http://feed.feedsky.com/36ria">
                            <img src="http://img.feedsky.com/images/icon_subshot01_google.gif" alt="google reader" />
                        </a>
                    </li>
                    <li class="g-u">
                        <a href="http://mail.qq.com/cgi-bin/feed?u=http://feed.feedsky.com/36ria">
                            <img src="http://img.feedsky.com/images/icon_subshot01_qq.gif" alt="QQ&#37038;&#31665;" />
                        </a>
                    </li>
                    <li class="g-u">
                        <a href="http://www.zhuaxia.com/add_channel.php?url=http://feed.feedsky.com/36ria">
                            <img src="http://img.feedsky.com/images/icon_subshot01_zhuaxia.gif" alt="&#25235;&#34430;" />
                        </a>
                    </li>
                    <li class="g-u">
                        <a href="http://www.xianguo.com/subscribe.php?url=http://feed.feedsky.com/36ria">
                            <img src="http://img.feedsky.com/images/icon_subshot01_xianguo.gif" alt="&#40092;&#26524;" />
                        </a>
                    </li>
                    <li class="g-u">
                        <a href="http://reader.youdao.com/b.do?keyfrom=feedsky&url=http://feed.feedsky.com/36ria">
                            <img src="http://img.feedsky.com/images/icon_subshot01_youdao.gif" alt="&#26377;&#36947;"  />
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
    </article>
    <div class="share block">
        <div class="share-list-container"><?php if(function_exists('wp_share_list')) wp_share_list();?></div>
        <s class="tag tag-share">分享</s>
    </div>
    <div class="similar block grid">
        <div class="ad g-u">
            <a href="http://www.vancl.com/?source=riahome" target="_blank"><img alt="" src="http://union.vancl.com/adpic.aspx?w=250&h=250" border="0" /></a>
        </div>
        <ul class="similar-list g-u">
            <?php
               global $post;
               $category = get_the_category();
               $args = array(
                    'numberposts' => 5,
                    'category' => $category[0]->cat_ID
                    );
               $relate_posts = get_posts($args);
                foreach( $relate_posts as $post ) :
                    setup_postdata($post);
            ?>
            <li>
                <h1><a class="title entry-title" role="title" href="<?php the_permalink(); ?>" title="点此前往<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a> </h1>
                <div class="image">
                            <a href="<?php the_permalink() ?>" title="点此前往<?php the_title(); ?>">
                                <?php
                                if(has_post_thumbnail()) {
                                    the_post_thumbnail(array(96,44));
                                }
                                ?>
                            </a>
                        </div>
                        <footer class="info"><a href="#"><?php comments_popup_link(__('沙发还空着，抢！', 'kubrick'), __('只剩下板凳啦！', 'kubrick'), __('前<b>%</b>个座位已被强势霸占！', 'kubrick'), '', __('关闭评论', 'kubrick') ); ?>
                        <?php if(function_exists('the_views')) { the_views(); } ?>
                        </footer>
            </li>
            <?php endforeach;wp_reset_query();?>
        </ul>
        <s class="tag tag-similar">同类</s>
    </div>
    <?php comments_template( '', true ); ?>
<?php endwhile;?>