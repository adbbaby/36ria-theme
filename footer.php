<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<footer id="footer">
<i class="hd"></i>
<div class="bd">
<section class="content grid">
<aside class="authors g-u">
    <header>
        <span class="en">authors</span><span class="zh">作者们</span>
    </header>
    <article>
        <ul>
            <li class="grid">
                <a href="<?php bloginfo('url');?>/author/minghe" target="_blank">
                    <div class="avatar-parent g-u">
                        <?php echo get_avatar( 'minghe36@126.com', '50' ); ?>
                    </div>
                    <div class="info g-u">
                        <h4 class="name">
                            明河
                        </h4>
                        <p class="desc">
                            淘宝网 UED 前端工程师
                        </p>
                        <p class="desc">
                            宅男 爱足球 爱数码
                        </p>
                    </div>
                </a>
            </li>
            <li class="grid">
                <a href="<?php bloginfo('url');?>/author/spikelinyu" target="_blank">
                    <div class="avatar-parent g-u">
                        <?php echo get_avatar( 'spikelinyu@163.com', '50' ); ?>
                    </div>
                    <div class="info g-u">
                        <h4 class="name">
                            苏河
                        </h4>
                        <p class="desc">
                            淘宝网 UED 前端工程师
                        </p>
                        <p class="desc">
                            帅哥 爱狗 爱DOTA
                        </p>
                    </div>
                </a>
            </li>
            <li class="grid">
                <a href="<?php bloginfo('url');?>/author/xthsky" target="_blank">
                    <div class="avatar-parent g-u">
                        <?php echo get_avatar( 'xthsky@gmail.com', '50' ); ?>
                    </div>
                    <div class="info g-u">
                        <h4 class="name">
                            天河
                        </h4>

                        <p class="desc">
                            淘宝网 UED 前端工程师
                        </p>

                        <p class="desc">
                            小王子 爱加班 爱风声
                        </p>
                    </div>
                </a>
            </li>
            <li class="grid">
                <a href="<?php bloginfo('url');?>/author/greenerieshu" target="_blank">
                    <div class="avatar-parent g-u">
                        <?php echo get_avatar( 'greenerieshu@gmail.com', '50' ); ?>
                    </div>
                    <div class="info g-u">
                        <h4 class="name">
                            飞绿
                        </h4>

                        <p class="desc">
                            淘宝网 UED 前端工程师
                        </p>

                        <p class="desc">
                            宅女 美女 爱吃辣
                        </p>
                    </div>
                </a>
            </li>
            <li class="grid">
                <a href="<?php bloginfo('url');?>/author/zhou2ting" target="_blank">
                    <div class="avatar-parent g-u">
                        <?php echo get_avatar( 'zhou2ting@gmail.com', '50' ); ?>
                    </div>
                    <div class="info g-u">
                        <h4 class="name">
                            妙净
                        </h4>

                        <p class="desc">
                            淘宝网 UED 前端工程师
                        </p>

                        <p class="desc">
                            不知该写些什么...
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </article>

</aside>
<article class="articles g-u">
    <header>
        <span class="en">articles</span><span class="zh">随机推荐文章</span>
    </header>
    <ul class="grid">
        <?php
            global $post;
            $rand_posts = get_posts('numberposts=6&orderby=rand');
            foreach( $rand_posts as $post ) :
                 setup_postdata($post);
        ?>
        <li class="article g-u">
            <a href="<?php the_permalink() ?>" title="<?php printf(__('进入浏览 %s', 'kubrick'), the_title_attribute('echo=0')); ?>" target="_blank">
                <?php
                if(has_post_thumbnail()) {
                    the_post_thumbnail(array(170,80));
                } else {
                    echo '<img src="'.get_bloginfo("template_url").'/images/no-has-thumbnail.png" alt="'.the_title_attribute('echo=0').'" />';
                }
                ?>
                <span class="title"> <?php the_title(); ?> </span>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
</article>
<aside class="histories g-u">
    <header>
        <span class="en">histories</span><span class="zh">你曾浏览过的文章</span>
    </header>
    <ul class="J_Histories">
        
    </ul>
</aside>
</section>
</div>
<div class="ft">
    <div class="copyright">
        WordPress3.0 驱动 |
 <script src="http://s9.cnzz.com/stat.php?id=2180581&web_id=2180581&show=pic" language="JavaScript"></script>
 | <a href="<?php bloginfo('url'); ?>/sitemap.xml">网站地图</a> | 模板制作：明河/苏河/天河/飞绿</a>
    </div>
</div>

</footer>
<?php wp_footer(); ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/json2.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/36ria.js"></script>
</body>
</html>
