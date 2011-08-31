<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<aside id="sidebar" class="g-u" role="complementary">
    <ul class="status block">
        <?php $num_posts = wp_count_posts( 'post' ); $num_pages = wp_count_posts('page' ); $num_cats = wp_count_terms('category'); $num_tags = wp_count_terms('post_tag'); $num_comm = get_comment_count();  ?>
        <li><em><?php echo $num_posts->publish; ?></em>文章</li>
        <li>
            <em><?php echo $num_comm['total_comments'];?></em>评论
        </li>
        <li><em><?php echo $num_tags;?></em>标签</li>
    </ul>
    <div class="subscribe block">
        <h1 class="sidebar-h1">快速订阅
            <a href="http://feed.feedsky.com/36ria" title="ria之家" target="_blank">
                <img src="http://www.feedsky.com/feed/36ria/sc/orange.gif" style="border:0" alt="" />
            </a>
        </h1>
        <ul class="btn-rss-list grid">
            <li class="g-u">
                <a href="http://www.zhuaxia.com/add_channel.php?url=http://feed.feedsky.com/36ria">
                    <img src="http://img.feedsky.com/images/icon_subshot01_zhuaxia.gif" alt="&#25235;&#34430;" />
                </a>
            </li>
            <li class="g-u">
                <a href="http://fusion.google.com/add?feedurl=http://feed.feedsky.com/36ria">
                    <img src="http://img.feedsky.com/images/icon_subshot01_google.gif" alt="google reader" />
                </a>
            </li>
            <li class="g-u">
                <a href="http://add.my.yahoo.com/rss?url=http://feed.feedsky.com/36ria">
                    <img src="http://img.feedsky.com/images/icon_subshot01_yahoo.gif" alt="my yahoo" />
                </a>
            </li>
            <li class="g-u">
                <a href="http://www.xianguo.com/subscribe.php?url=http://feed.feedsky.com/36ria">
                    <img src="http://img.feedsky.com/images/icon_subshot01_xianguo.gif" alt="&#40092;&#26524;" />
                </a>
            </li>
            <li class="g-u">
                <a href="http://inezha.com/add?url=http://feed.feedsky.com/36ria">
                    <img border="0" src="http://img.feedsky.com/images/icon_subshot01_nazha.gif" alt="&#21738;&#21522;" />
                </a>
            </li>
            <li class="g-u">
                <a href="http://reader.youdao.com/b.do?keyfrom=feedsky&url=http://feed.feedsky.com/36ria">
                    <img src="http://img.feedsky.com/images/icon_subshot01_youdao.gif" alt="&#26377;&#36947;"  />
                </a>
            </li class="g-u">
            <li class="g-u">
                <a href="http://mail.qq.com/cgi-bin/feed?u=http://feed.feedsky.com/36ria">
                    <img src="http://img.feedsky.com/images/icon_subshot01_qq.gif" alt="QQ&#37038;&#31665;" />
                </a>
            </li>
            <li class="g-u">
                <a href="http://9.douban.com/reader/subscribe?url=http://feed.feedsky.com/36ria">
                    <img src="http://img.feedsky.com/images/icon_subshot01_douban.gif" alt="&#20061;&#28857;" />
                </a>
            </li>
        </ul>
    </div>
    <div class="block">
        <h1 class="sidebar-h1">热门标签 </h1>
        <?php wp_tag_cloud('smallest=12&largest=12&unit=px&number=24&format=list&orderby=count&order=DESC'); ?>
    </div>
    <div class="ad-250 block">
       <a href="https://github.com/minghe/36ria-demo" target="_blank"><img alt="" src="<?php bloginfo('stylesheet_directory'); ?>/images/demo-download.png" width="248" border="0" /></a>
    </div>
    <div class="latest-comments block">
        <h1>最新评论</h1>
        <ol>
            <?php wp_recentcomments('post=false&limit=9'); ?>
        </ol>
    </div>
    <div class="links block">
        <h1>友情链接</h1>
        <?php wp_list_bookmarks('orderby=rand&limit=24'); ?>
    </div>
</aside>
