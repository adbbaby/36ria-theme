<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请勿直接加载此页面！');
	
	if ( post_password_required() ) { ?>
		<p class="no-comments"><?php _e('输入密码才可以评论！', 'kubrick'); ?></p>
	<?php
		return;
	}
?>
<div class="cm block">
    <h1>跟作者说两句</h1>
    <div id="respond" class="grid">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="J_Cm">
            <div class="g-u form-left">
                <p>
                    <label for="author">昵称<span>（必须）</span></label>
                    <input type="text" name="author" class="J_CmFormField comment-input" id="author" value="<?php echo esc_attr($comment_author); ?>" size="28" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                </p>
                <p>
                    <label for="email">邮箱<span>（必须，不会公开）</span></label>
                    <input type="email" name="email" id="email" class="J_CmFormField comment-input" value="<?php echo esc_attr($comment_author_email); ?>" size="28" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                </p>
                <p>
                    <label for="url">网站<span>（url）</span></label>
                    <input type="url" name="url" id="url" class="J_CmFormField comment-input" value="<?php echo  esc_attr($comment_author_url); ?>" size="28" tabindex="3" />
                </p>
                <p>
                    <input name="submit" type="submit" id="comment-form-submit" value="提 交" />
                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </p>
            </div>
            <div class="g-u form-right">
                <label for="comment">评论正文</label>
                <div class="cm-smilies">
                    <?php cs_print_smilies(); ?>
                </div>
                <textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" ></textarea>
            </div>
        </form>
    </div>
    <h1 class="cm-number"><?php comments_number(__('', 'kubrick'), __('只剩下板凳了！', 'kubrick'), __('%个座位已被强势霸占！', 'kubrick'));?>
        <?php if ( have_comments() ) : ?>
        <div class="cm-list-show-conditions">
            <input type="radio" name="condition[]" class="condition J_CmListCondition" value="all" checked="checked" />
            <label>显示全部评论</label>
            <input type="radio" name="condition[]" class="condition J_CmListCondition" value="author" />
            <label>只显示作者评论</label>
            <input type="radio" name="condition[]" class="condition J_CmListCondition" value="reader" />
            <label>只显示读者评论</label>
            <input type="radio" name="condition[]" class="condition J_CmListCondition" value="recent-20" />
            <label>只显示最近20条评论</label>
        </div>
        <?php endif; ?>
    </h1>
    <?php if ( have_comments() ) : ?>
    <ol class="comment-list">
	    <?php wp_list_comments( array( 'callback' => 'ria_comment','avatar_size' => 50,'max_depth' => '1' ) ); ?>
	</ol>
    <?php else : ?>
    <div class="no-comment"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/nocomment.png" /></div>
    <?php endif; ?>
</div>