<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!doctype html>
<!--[if lt IE 8 ]> <html class="no-js ie6-7"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
</head>
<body  <?php body_class(); ?>>
    <!--header START-->
    <header id="header">
        <div class="top">
            <section class="logo">
                <hgroup>
                    <h1>
                        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                    </h1>
                    <h2>
                        <?php bloginfo( 'description' ); ?>
                    </h2>
                </hgroup>

                <a class="logo-link" href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/LOGO-min.png" width="311" height="99" alt="'"> </a>
            </section>
            <section class="search">
                <form method="get" action="http://www.36ria.com/site-search">
                    <div class="area"><input type="text" value="" name="q" id="q" /></div>
                    <input type="hidden" value="UTF-8" name="ie"/>
                    <button class="search-btn"><span>搜索</span></button>
                </form>
            </section>
        </div>
        <nav class="menu-nav">
            <ul class="grid">
                <li class="g-u item cat javascript">
                    <a href="<?php bloginfo('url');?>/category/js">
                        <i class="img g-u"></i>
                        <figure class="g-u cat-desc">
                            <span class="cat g-u">JAVASCRIPT</span>
                            <span class="sub-cat">jquery | kissy</span>
                        </figure>
                    </a>
                </li>
                <li class="g-u item cat html5">
                    <a href="<?php bloginfo('url');?>/category/html5">
                        <i class="img g-u"></i>
                        <figure class="g-u cat-desc">
                            <span class="cat g-u">HTML5</span>
                            <span class="sub-cat">教程 | 演示 | css3</span>
                        </figure>
                    </a>
                </li>
                <li class="g-u item cat f2e">
                    <a href="<?php bloginfo('url');?>/category/f2e">
                        <i class="img g-u"></i>
                        <figure class="g-u cat-desc">
                            <span class="cat g-u">前端</span>
                            <span class="sub-cat">工具 | 浏览器 | 推荐</span>
                        </figure>
                    </a>
                </li>
                <li class="g-u item cat actionscript">
                    <a href="<?php bloginfo('url');?>/category/actionscript3">
                        <i class="img g-u"></i>
                        <figure class="g-u cat-desc">
                            <span class="cat g-u">ACTIONSCRIPT</span>
                            <span class="sub-cat">flash | flex | air</span>
                        </figure>
                    </a>
                </li>
                <li class="g-u item cat choice">
                    <a href="<?php bloginfo('url');?>/36ria-choice">
                        <i class="img g-u"></i>
                        <figure class="g-u cat-desc">
                            <span class="cat g-u">精华</span>
                            <span class="sub-cat">精华教程和资源集合</span>
                        </figure>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <!--header END-->
