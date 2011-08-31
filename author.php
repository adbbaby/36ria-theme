<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
<?php
	if ( have_posts() ) the_post();
    $author = get_the_author();
    $weibo = '';
?>
<!--main START-->
<div id="main" class="grid">
    <div id="content" class="g-u" role="主内容">
        <div class="author-page block">
            <section class="profile">
                <h1 class="author-page-h1">
                     <?php  echo $author; ?>的档案
                </h1>
                <?php if($author == '明河共影' || $author == '明河'): ?>
                    <dl>
                        <dt>真名</dt>
                        <dd>谢文浩<i>（五行缺水...）</i></dd>
                        <dt>淘宝花名</dt>
                        <dd>剑平<i>（出自《甘十二妹》，全名段剑平，段誉后代...木有六脉神剑）</i></dd>
                        <dt>邮箱</dt>
                        <dd>minghe36@126.com<i>（非诚勿扰...）</i></dd>
                        <dt>蜗居</dt>
                        <dd>杭州<i>（西湖真的不见得多咋的）</i></dd>
                        <dt>职业</dt>
                        <dd>前端工程师<i>（工龄2年，混江湖中，求包养...）</i></dd>
                        <dt>就职公司</dt>
                        <dd>淘宝网<i>（不是你想象中的那么好，也不是你想象中的那么糟）</i></dd>
                        <dt>毕业学院</dt>
                        <dd>福建农林大学<i>（有山、有水、有人家...）</i></dd>
                        <dt>爱好</dt>
                        <dd>动漫 | 看书 | 数码 | 足球 | 乒乓球 | 羽毛球<i>（其实就是个宅男...）</i></dd>
                    </dl>
                    <?php $weibo = 'uid=1653905027&verifier=bc8818e2'; ?>
                <?php elseif($author == '苏河'): ?>
                    <dl>
                        <dt>真名</dt>
                        <dd>林昱<i>（很多人不会念名…）</i></dd>
                        <dt>淘宝花名</dt>
                        <dd>苏河<i>（天龙八部“苏星河”，伪哑巴，无崖子徒弟，打酱油典型）</i></dd>
                        <dt>邮箱</dt>
                        <dd>spikelinyu@163.com<i>（非诚勿扰...）</i></dd>
                        <dt>蜗居</dt>
                        <dd>杭州<i>（伪有房人士，有狗人士求，有狗人士骚扰）</i></dd>
                        <dt>职业</dt>
                        <dd>前端攻城湿<i>（现在流行攻城湿思密达…ps:明河是个土鳖）</i></dd>
                        <dt>就职公司</dt>
                        <dd>淘宝网<i>（取经中…无任何不适…正在学会如何打太极）</i></dd>
                        <dt>毕业学院</dt>
                        <dd>浙江工商<i>（传说中5L就能看到钱塘江的地方）</i></dd>
                        <dt>爱好</dt>
                        <dd>爱狗人士|三国杀fans|篮球狂热者|伪科蜜|火影迷|DOTA酱油|伪苹果控（最近和明河solo FIFA11中，跪拜求被指点！）</i></dd>
                    </dl>
                    <?php $weibo = 'uid=1867624004&verifier=0b6bb11b'; ?>
                <?php elseif($author == '天河' || $author == 'xthsky'): ?>
                    <dl>
                        <dt>真名</dt>
                        <dd>徐天河</dd>
                        <dt>淘宝花名</dt>
                        <dd>基德<i>（是柯南里的怪盗基德，不是篮球明星哈）</i></dd>
                        <dt>邮箱</dt>
                        <dd>xthsky(at)gmail.com</dd>
                        <dt>现状</dt>
                        <dd>前端工程师 @杭州</dd>
                        <dt>毕业学院</dt>
                        <dd>东北大学</dd>
                        <dt>爱好</dt>
                        <dd>读书 | 羽毛球 | 五子棋 | 游戏 | 游山玩水 <i>（宅男一枚...）</i></dd>
                    </dl>
                    <?php $weibo = 'uid=1038409867&verifier=bd483efb'; ?>
                <?php elseif($author == '飞绿'): ?>
                    <dl>
                        <dt>真名</dt>
                        <dd>胡宇<i>（朋友冠以绰号‘胡言乱语’、‘胡说八道’...）</i></dd>
                        <dt>淘宝花名</dt>
                        <dd>飞绿<i>（出自网络某穿越小说，一侠女哟~）</i></dd>
                        <dt>邮箱</dt>
                        <dd>greenerieshu@gmail.com<i>（非诚勿扰...）</i></dd>
                        <dt>蜗居</dt>
                        <dd>杭州<i>（真的是个环境很好的地方，不过仍然想念成都）</i></dd>
                        <dt>职业</dt>
                        <dd>前端工程师<i>（摸爬滚打一年多了...）</i></dd>
                        <dt>就职公司</dt>
                        <dd>淘宝网<i>（在这儿学会了三国杀，风声）</i></dd>
                        <dt>毕业学院</dt>
                        <dd>成都信息工程学院<i>（简称成信院，据我朋友的说法成信院的人一点也不诚信……）</i></dd>
                        <dt>爱好</dt>
                        <dd>动漫 | 看书  | 运动<i>（打羽毛球，不喜欢讲规则，用尽力气就好^_^）</i></dd>
                    </dl>
                    <?php $weibo = 'uid=1649427365&verifier=cc8c1592'; ?>
                <?php endif; ?>
            </section>
            <h1 class="author-page-h1"><?php  echo $author; ?>的微博 </h1>
            <div class="wei-bo">
                <iframe width="100%" height="400" class="share_self"  frameborder="0" scrolling="no" src="http://service.t.sina.com.cn/widget/WeiboShow.php?width=0&height=400&fansRow=2&ptype=1&speed=0&noborder=0&isWeibo=1&isFans=1&<?php echo $weibo ?>"></iframe>
            </div>
            <h1 class="author-page-h1">
                 <?php  echo $author; ?>发表过的文章
            </h1>
            <section class="author-articles">
                <?php get_template_part( 'loop', 'author' );?>
            </section>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
<!--main END-->
<?php get_footer(); ?>
