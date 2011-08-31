<?php /*
List template
This template returns the related posts as a comma-separated list.
Author: mitcho (Michael Yoshitaka Erlewine)
*/ 
?>
<?php if ($related_query->have_posts()):
	$postsArray = array();
	while ($related_query->have_posts()) : $related_query->the_post();
		$postsArray[] = '<li><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a><!-- ('.get_the_score().')--></li>';
	endwhile;
	
echo implode(''."\n",$postsArray);
else:?>

<?php endif; ?>
